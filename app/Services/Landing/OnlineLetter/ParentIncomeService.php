<?php

namespace App\Services\Landing\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Commons\Libs\QRCode\QRCodeService;
use App\Interface\Landing\OnlineLetter\ParentIncomeServiceInterface;
use App\Models\CertificateParentIncome;
use App\Models\CertificateParentIncomeApplicant;
use App\Models\CertificateParentIncomeParent;
use App\Models\CertificateParentIncomePerson;
use App\Schemas\Landing\OnlineLetter\ParentIncome\ParentIncomeSchema;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class ParentIncomeService implements ParentIncomeServiceInterface
{
    public function send(ParentIncomeSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataParentIncome = [
                'date' => Carbon::now(),
                'reference_number' => 'SKPO-' . date('YmdHis'),
                'status' => 'created',
                'approved_by_id' => null,
                'approved_at' => null,
                'father_income_per_month' => $schema->getFatherIncomePerMonth(),
                'mother_income_per_month' => $schema->getMotherIncomePerMonth(),
            ];
            $certificateParentIncome = CertificateParentIncome::create($dataParentIncome);

            $dataApplicant = [
                'certificate_parent_income_id' => $certificateParentIncome->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            CertificateParentIncomeApplicant::create($dataApplicant);

            $dataPerson = [
                'certificate_parent_income_id' => $certificateParentIncome->id,
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
            CertificateParentIncomePerson::create($dataPerson);

            $dataParent = [
                'certificate_parent_income_id' => $certificateParentIncome->id,
                'name' => $schema->getParentName(),
                'identifier_number' => $schema->getParentNik(),
                'birth_place' => $schema->getParentBirthPlace(),
                'date_of_birth' => $schema->getParentDateOfBirth(),
                'gender' => $schema->getParentGender(),
                'citizenship' => $schema->getParentCitizenship(),
                'religion' => $schema->getParentReligion(),
                'marriage' => $schema->getParentMarriage(),
                'job' => $schema->getParentJob(),
                'address' => $schema->getParentAddress(),
            ];
            CertificateParentIncomeParent::create($dataParent);
            DB::commit();
            return ServiceResponse::statusCreated("successfully send online letter", [
                'parent_income' => $certificateParentIncome,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route('online-letter.parent-income.code', [
                    'code' => $certificateParentIncome->reference_number
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
            $data = CertificateParentIncome::with(['applicant', 'person', 'parent'])
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
            $certificate = CertificateParentIncome::with(['applicant'])
                ->where('reference_number', '=', $referenceNumber)
                ->first();
            if (!$certificate) {
                return ServiceResponse::notFound("certificate not found");
            }

            # generate qrcode
            $url = route('online-letter.parent-income.code', [
                'code' => $referenceNumber
            ]);
            $qrCode = QRCodeService::generate($url);

            # create pdf
            $options = new Options();
            $options->setIsPhpEnabled(true);
            $options->setIsRemoteEnabled(true);
            $options->set('chroot', public_path());
            $pdf = Pdf::loadView('pdf.letter-receipt.parent-income', [
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
