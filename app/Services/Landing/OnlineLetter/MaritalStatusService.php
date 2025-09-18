<?php

namespace App\Services\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Commons\Libs\QRCode\QRCodeService;
use App\Interface\Landing\OnlineLetter\MaritalStatusServiceInterface;
use App\Models\CertificateMaritalStatus;
use App\Models\CertificateMaritalStatusApplicant;
use App\Models\CertificateMaritalStatusPerson;
use App\Schemas\Landing\OnlineLetter\MaritalStatus\MaritalStatusSchema;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class MaritalStatusService implements MaritalStatusServiceInterface
{
    public function send(MaritalStatusSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $refNum = match ($schema->getType()) {
                'widow' => 'SKJ-' . date('YmdHis'),
                'widower' => 'SKDD-' . date('YmdHis'),
                default => null
            };

            $dataMaritalStatus = [
                'date' => Carbon::now(),
                'reference_number' => $refNum,
                'status' => 'created',
                'type' => $schema->getType(),
                'approved_by_id' => null,
                'approved_at' => null,
            ];
            $certificateMaritalStatus = CertificateMaritalStatus::create($dataMaritalStatus);

            $dataApplicant = [
                'certificate_marital_status_id' => $certificateMaritalStatus->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            CertificateMaritalStatusApplicant::create($dataApplicant);

            $dataPerson = [
                'certificate_marital_status_id' => $certificateMaritalStatus->id,
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
                'spouse_name' => $schema->getSpouseName(),
            ];
            CertificateMaritalStatusPerson::create($dataPerson);
            DB::commit();
            $routeString = match ($schema->getType()) {
                'widower' => 'online-letter.widower.code',
                'widow' => 'online-letter.widow.code',
                default => ''
            };

            return ServiceResponse::statusCreated("successfully send online letter", [
                'marital_status' => $certificateMaritalStatus,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route($routeString, [
                    'code' => $certificateMaritalStatus->reference_number
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
            $certificate = CertificateMaritalStatus::with(['applicant'])
                ->where('reference_number', '=', $referenceNumber)
                ->first();
            if (!$certificate) {
                return ServiceResponse::notFound("certificate not found");
            }

            $type = $certificate->type;

            $routeString = match ($type) {
                'widower' => 'online-letter.widower.code',
                'widow' => 'online-letter.widow.code',
                default => ''
            };

            $pdfTemplate = match ($type) {
                'widower' => 'pdf.letter-receipt.widower',
                'widow' => 'pdf.letter-receipt.widow',
                default => ''
            };

            # generate qrcode
            $url = route($routeString, [
                'code' => $referenceNumber
            ]);
            $qrCode = QRCodeService::generate($url);

            # create pdf
            $options = new Options();
            $options->setIsPhpEnabled(true);
            $options->setIsRemoteEnabled(true);
            $pdf = Pdf::loadView($pdfTemplate, [
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
