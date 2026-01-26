<?php

namespace App\Services\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\OnlineLetter\MaritalStatusServiceInterface;
use App\Models\CertificateMaritalStatus;
use App\Models\CertificateMaritalStatusApplicant;
use App\Models\CertificateMaritalStatusPerson;
use App\Schemas\Mobile\OnlineLetter\MaritalStatus\MaritalStatusSchema;
use Carbon\Carbon;
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
                'widow' => 'SKJD' . date('YmdHis'),
                'widower' => 'SKDD' . date('YmdHis'),
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
}
