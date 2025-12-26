<?php

namespace App\Services\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\OnlineLetter\IncapacityServiceInterface;
use App\Models\CertificateIncapacity;
use App\Models\CertificateIncapacityApplicant;
use App\Models\CertificateIncapacityPerson;
use App\Schemas\Mobile\OnlineLetter\Incapacity\IncapacitySchema;
use Carbon\Carbon;
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
                'reference_number' => 'SKTM' . date('YmdHis'),
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
}
