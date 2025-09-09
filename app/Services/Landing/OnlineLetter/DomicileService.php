<?php

namespace App\Services\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Commons\Libs\QRCode\QRCodeService;
use App\Interface\Landing\OnlineLetter\DomicileServiceInterface;
use App\Models\CertificateDomicile;
use App\Models\CertificateDomicileApplicant;
use App\Models\CertificateDomicilePerson;
use App\Schemas\Landing\OnlineLetter\Domicile\DomicileSchema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;

class DomicileService implements DomicileServiceInterface
{
    public function send(DomicileSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataDomicile = [
                'date' => Carbon::now(),
                'reference_number' => 'SKD-' . date('YmdHis'),
                'status' => 'created',
                'approved_by_id' => null,
                'approved_at' => null
            ];
            $certificateDomicile = CertificateDomicile::create($dataDomicile);

            $dataApplicant = [
                'certificate_domicile_id' => $certificateDomicile->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            CertificateDomicileApplicant::create($dataApplicant);

            $dataPerson = [
                'certificate_domicile_id' => $certificateDomicile->id,
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
            CertificateDomicilePerson::create($dataPerson);
            DB::commit();
            return ServiceResponse::statusCreated("successfully send online letter", [
                'domicile' => $certificateDomicile,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route('online-letter.domicile.code', [
                    'code' => $certificateDomicile->reference_number
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
            $certificate = CertificateDomicile::with(['applicant'])
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
            $pdf = Pdf::loadView('pdf.letter-receipt', [
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
