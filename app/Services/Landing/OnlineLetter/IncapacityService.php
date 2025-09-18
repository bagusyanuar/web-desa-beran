<?php

namespace App\Services\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Commons\Libs\QRCode\QRCodeService;
use App\Interface\Landing\OnlineLetter\IncapacityServiceInterface;
use App\Models\CertificateIncapacity;
use App\Models\CertificateIncapacityApplicant;
use App\Models\CertificateIncapacityPerson;
use App\Schemas\Landing\OnlineLetter\Incapacity\IncapacitySchema;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class IncapacityService implements IncapacityServiceInterface
{
    public function send(IncapacitySchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataIncapacity = [
                'date' => Carbon::now(),
                'reference_number' => 'SKTM-' . date('YmdHis'),
                'status' => 'created',
                'approved_by_id' => null,
                'approved_at' => null,
                'purpose' => $schema->getPurpose()
            ];
            $certificateIncapacity = CertificateIncapacity::create($dataIncapacity);

            $dataApplicant = [
                'certificate_incapacity_id' => $certificateIncapacity->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            CertificateIncapacityApplicant::create($dataApplicant);

            $dataPerson = [
                'certificate_incapacity_id' => $certificateIncapacity->id,
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
            CertificateIncapacityPerson::create($dataPerson);
            DB::commit();
            return ServiceResponse::statusCreated("successfully send online letter", [
                'incapacity' => $certificateIncapacity,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route('online-letter.incapacity.code', [
                    'code' => $certificateIncapacity->reference_number
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
            $certificate = CertificateIncapacity::with(['applicant'])
                ->where('reference_number', '=', $referenceNumber)
                ->first();
            if (!$certificate) {
                return ServiceResponse::notFound("certificate not found");
            }

            # generate qrcode
            $url = route('online-letter.incapacity.code', [
                'code' => $referenceNumber
            ]);
            $qrCode = QRCodeService::generate($url);

            # create pdf
            $options = new Options();
            $options->setIsPhpEnabled(true);
            $options->setIsRemoteEnabled(true);
            $pdf = Pdf::loadView('pdf.letter-receipt.incapacity', [
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
