<?php

namespace App\Services\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Commons\Libs\QRCode\QRCodeService;
use App\Interface\Landing\OnlineLetter\DeathServiceInterface;
use App\Models\CertificateDeath;
use App\Models\CertificateDeathApplicant;
use App\Models\CertificateDeathPerson;
use App\Models\CertificateDeathRecord;
use App\Schemas\Landing\OnlineLetter\Death\DeathSchema;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class DeathService implements DeathServiceInterface
{
    public function send(DeathSchema $schema): ServiceResponse
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
                'reference_number' => 'SKKM' . date('YmdHis'),
                'status' => 'created',
                'approved_by_id' => null,
                'approved_at' => null
            ];
            $certificateDeath = CertificateDeath::create($dataDeath);

            $dataApplicant = [
                'certificate_death_id' => $certificateDeath->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            CertificateDeathApplicant::create($dataApplicant);

            $dataPerson = [
                'certificate_death_id' => $certificateDeath->id,
                'name' => $schema->getName(),
                'family_identifier_number' => $schema->getFamilyIdentifier(),
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
            CertificateDeathPerson::create($dataPerson);

            $dataRecord = [
                'certificate_death_id' => $certificateDeath->id,
                'date' => $schema->getDateOfDeath(),
                'death_place' => $schema->getDeathPlace(),
                'district_name' => $schema->getDistrict(),
                'city_name' => $schema->getCity(),
                'province_name' => $schema->getProvince(),
                'cause_of_death' => $schema->getCauseOfDeath(),
                'decider' => $schema->getDecider(),
                'post_mortem_notes' => $schema->getPostMortemNotes(),
                'birth_order' => $schema->getBirthOrder(),
            ];
            CertificateDeathRecord::create($dataRecord);
            DB::commit();
            return ServiceResponse::statusCreated("successfully send online letter", [
                'death' => $certificateDeath,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route('online-letter.death.code', [
                    'code' => $certificateDeath->reference_number
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
            $data = CertificateDeath::with(['applicant', 'person', 'record'])
                ->where('reference_number', '=', $code)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("certificate not found");
            }
            return ServiceResponse::statusOK("successfully get certificate death", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function createReceipt($referenceNumber): ServiceResponse
    {
        try {
            //code...
            $certificate = CertificateDeath::with(['applicant', 'person', 'record'])
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
            $pdf = Pdf::loadView('pdf.letter-receipt.death', [
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
