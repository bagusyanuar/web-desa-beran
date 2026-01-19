<?php

namespace App\Services\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\OnlineLetter\IncomeServiceInterface;
use App\Models\CertificateIncome;
use App\Models\CertificateIncomeApplicant;
use App\Models\CertificateIncomePerson;
use App\Schemas\Mobile\OnlineLetter\Income\IncomeSchema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IncomeService implements IncomeServiceInterface
{
    public function send(IncomeSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataIncome = [
                'date' => Carbon::now(),
                'reference_number' => 'SKPH' . date('YmdHis'),
                'status' => 'created',
                'approved_by_id' => null,
                'approved_at' => null,
                'income_per_month' => $schema->getIncomePerMonth(),
                'purpose' => $schema->getPurpose(),
            ];
            $certificateIncome = CertificateIncome::create($dataIncome);

            $dataApplicant = [
                'certificate_income_id' => $certificateIncome->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            CertificateIncomeApplicant::create($dataApplicant);

            $dataPerson = [
                'certificate_income_id' => $certificateIncome->id,
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
            CertificateIncomePerson::create($dataPerson);
            DB::commit();
            return ServiceResponse::statusCreated("successfully send online letter", [
                'income' => $certificateIncome,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route('online-letter.income.code', [
                    'code' => $certificateIncome->reference_number
                ])
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
