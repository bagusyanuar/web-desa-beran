<?php

namespace App\Services\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Commons\Libs\QRCode\QRCodeService;
use App\Interface\Landing\OnlineLetter\SingleStatusServiceInterface;
use App\Models\CertificateSingleStatus;
use App\Models\CertificateSingleStatusApplicant;
use App\Models\CertificateSingleStatusPerson;
use App\Schemas\Landing\OnlineLetter\SingleStatus\SingleStatusSchema;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class SingleStatusService implements SingleStatusServiceInterface
{
   public function send(SingleStatusSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataSingleStatus = [
                'date' => Carbon::now(),
                'reference_number' => 'SKBM' . date('YmdHis'),
                'status' => 'created',
                'approved_by_id' => null,
                'approved_at' => null
            ];
            $certificateSingleStatus = CertificateSingleStatus::create($dataSingleStatus);

            $dataApplicant = [
                'certificate_single_status_id' => $certificateSingleStatus->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            CertificateSingleStatusApplicant::create($dataApplicant);

            $dataPerson = [
                'certificate_single_status_id' => $certificateSingleStatus->id,
                'name' => $schema->getName(),
                'identifier_number' => $schema->getNik(),
                'birth_place' => $schema->getBirthPlace(),
                'date_of_birth' => $schema->getDateOfBirth(),
                'gender' => $schema->getGender(),
                'citizenship' => $schema->getCitizenship(),
                'religion' => $schema->getReligion(),
                'job' => $schema->getJob(),
                'address' => $schema->getAddress(),
            ];
            CertificateSingleStatusPerson::create($dataPerson);
            DB::commit();
            return ServiceResponse::statusCreated("successfully send online letter", [
                'single_status' => $certificateSingleStatus,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route('online-letter.single-status.code', [
                    'code' => $certificateSingleStatus->reference_number
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
            $data = CertificateSingleStatus::with(['applicant', 'person'])
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
            $certificate = CertificateSingleStatus::with(['applicant'])
                ->where('reference_number', '=', $referenceNumber)
                ->first();
            if (!$certificate) {
                return ServiceResponse::notFound("certificate not found");
            }

            # generate qrcode
            $url = route('online-letter.domicile.code', [
                'code' => $referenceNumber
            ]);
            $qrCode = QRCodeService::generate($url);

            # create pdf
            $options = new Options();
            $options->setIsPhpEnabled(true);
            $options->setIsRemoteEnabled(true);
            $pdf = Pdf::loadView('pdf.letter-receipt.single-status', [
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
