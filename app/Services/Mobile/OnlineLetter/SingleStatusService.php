<?php

namespace App\Services\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\OnlineLetter\SingleStatusServiceInterface;
use App\Models\CertificateSingleStatus;
use App\Models\CertificateSingleStatusApplicant;
use App\Models\CertificateSingleStatusPerson;
use App\Schemas\Mobile\OnlineLetter\SingleStatus\SingleStatusSchema;
use Carbon\Carbon;
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
}
