<?php

namespace App\Services\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Commons\Libs\QRCode\QRCodeService;
use App\Interface\Landing\OnlineLetter\BirthServiceInterface;
use App\Models\CertificateBirth;
use App\Models\CertificateBirthApplicant;
use App\Models\CertificateBirthFather;
use App\Models\CertificateBirthInfant;
use App\Models\CertificateBirthMother;
use App\Schemas\Landing\OnlineLetter\Birth\BirthSchema;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class BirthService implements BirthServiceInterface
{
    public function send(BirthSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataBirth = [
                'date' => Carbon::now(),
                'reference_number' => 'SKL-' . date('YmdHis'),
                'status' => 'created',
                'approved_by_id' => null,
                'approved_at' => null
            ];
            $certificateBirth = CertificateBirth::create($dataBirth);

            $dataInfant = [
                'certificate_birth_id' => $certificateBirth->id,
                'name' => $schema->getInfantName(),
                'birth_place' => $schema->getInfantBirthPlace(),
                'date_of_birth' => $schema->getInfantDateOfBirth(),
                'gender' => $schema->getInfantGender(),
                'birth_type' => $schema->getInfantBirthType(),
                'birth_order' => $schema->getInfantBirthOrder(),
            ];
            CertificateBirthInfant::create($dataInfant);

            $dataMother = [
                'certificate_birth_id' => $certificateBirth->id,
                'name' => $schema->getMotherName(),
                'identifier_number' => $schema->getMotherNik(),
                'birth_place' => $schema->getMotherBirthPlace(),
                'date_of_birth' => $schema->getMotherDateOfBirth(),
                'citizenship' => $schema->getMotherCitizenShip(),
                'religion' => $schema->getMotherReligion(),
                'job' => $schema->getMotherJob(),
                'address' => $schema->getMotherAddress(),
            ];
            CertificateBirthMother::create($dataMother);

            $dataFather = [
                'certificate_birth_id' => $certificateBirth->id,
                'name' => $schema->getFatherName(),
                'identifier_number' => $schema->getFatherNik(),
                'birth_place' => $schema->getFatherBirthPlace(),
                'date_of_birth' => $schema->getFatherDateOfBirth(),
                'citizenship' => $schema->getFatherCitizenShip(),
                'religion' => $schema->getFatherReligion(),
                'job' => $schema->getFatherJob(),
                'address' => $schema->getFatherAddress(),
            ];
            CertificateBirthFather::create($dataFather);

            $dataApplicant = [
                'certificate_death_id' => $certificateBirth->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            CertificateBirthApplicant::create($dataApplicant);

            DB::commit();
            return ServiceResponse::statusCreated("successfully send online letter", [
                'birth' => $certificateBirth,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route('online-letter.birth.code', [
                    'code' => $certificateBirth->reference_number
                ])
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function createReceipt($referenceNumber): ServiceResponse
    {
        try {
            //code...
            $certificate = CertificateBirth::with(['applicant', 'infant'])
                ->where('reference_number', '=', $referenceNumber)
                ->first();
            if (!$certificate) {
                return ServiceResponse::notFound("certificate not found");
            }

            # generate qrcode
            $url = route('online-letter.birth.code', [
                'code' => $referenceNumber
            ]);
            $qrCode = QRCodeService::generate($url);

            # create pdf
            $options = new Options();
            $options->setIsPhpEnabled(true);
            $options->setIsRemoteEnabled(true);
            $pdf = Pdf::loadView('pdf.letter-receipt.birth', [
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
