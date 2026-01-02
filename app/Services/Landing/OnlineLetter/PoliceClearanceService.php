<?php

namespace App\Services\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Commons\Libs\QRCode\QRCodeService;
use App\Interface\Landing\OnlineLetter\PoliceClearanceServiceInterface;
use App\Models\CertificatePoliceClearance;
use App\Models\CertificatePoliceClearanceApplicant;
use App\Models\CertificatePoliceClearanceDescription;
use App\Models\CertificatePoliceClearancePerson;
use App\Schemas\Landing\OnlineLetter\PoliceClearance\PoliceClearanceSchema;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class PoliceClearanceService implements PoliceClearanceServiceInterface
{
    public function send(PoliceClearanceSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataDeath = [
                'date' => Carbon::now(),
                'reference_number' => 'SKCK' . date('YmdHis'),
                'status' => 'created',
                'purpose' => $schema->getPurpose(),
                'approved_by_id' => null,
                'approved_at' => null
            ];
            $certificatePoliceClearance = CertificatePoliceClearance::create($dataDeath);

            $dataApplicant = [
                'certificate_police_clearance_id' => $certificatePoliceClearance->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            CertificatePoliceClearanceApplicant::create($dataApplicant);

            $dataPerson = [
                'certificate_police_clearance_id' => $certificatePoliceClearance->id,
                'name' => $schema->getName(),
                'identifier_number' => $schema->getNik(),
                'birth_place' => $schema->getBirthPlace(),
                'date_of_birth' => $schema->getDateOfBirth(),
                'gender' => $schema->getGender(),
                'citizenship' => $schema->getCitizenship(),
                'religion' => $schema->getReligion(),
                'marriage' => $schema->getMarriage(),
                'job' => $schema->getJob(),
                'address' => $schema->getAddress(),
            ];
            CertificatePoliceClearancePerson::create($dataPerson);

            foreach ($schema->getDescriptions() as $description) {
                $dataDescription = [
                    'certificate_police_clearance_id' => $certificatePoliceClearance->id,
                    'description' => $description,
                ];
                CertificatePoliceClearanceDescription::create($dataDescription);
            }

            DB::commit();
            return ServiceResponse::statusCreated("successfully send online letter", [
                'police_clearance' => $certificatePoliceClearance,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route('online-letter.police-clearance.code', [
                    'code' => $certificatePoliceClearance->reference_number
                ])
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByCode($code): ServiceResponse
    {
        try {
            $data = CertificatePoliceClearance::with(['applicant', 'person', 'descriptions'])
                ->where('reference_number', '=', $code)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("certificate not found");
            }
            return ServiceResponse::statusOK("successfully get certificate domicile", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function createReceipt($referenceNumber): ServiceResponse
    {
        try {
            //code...
            $certificate = CertificatePoliceClearance::with(['applicant'])
                ->where('reference_number', '=', $referenceNumber)
                ->first();
            if (!$certificate) {
                return ServiceResponse::notFound("certificate not found");
            }

            # generate qrcode
            $url = route('online-letter.death.code', [
                'code' => $referenceNumber
            ]);
            $qrCode = QRCodeService::generate($url);

            # create pdf
            $options = new Options();
            $options->setIsPhpEnabled(true);
            $options->setIsRemoteEnabled(true);
            $options->set('chroot', public_path());
            $pdf = Pdf::loadView('pdf.letter-receipt.police-clearance', [
                'qrcode' => $qrCode,
                'certificate' => $certificate
            ])->setPaper('a5', 'landscape');
            $pdf->getDomPDF()->setOptions($options);
            $pdfBase64 = base64_encode($pdf->output());
            return ServiceResponse::statusOK("successfully create receipt", $pdfBase64);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
