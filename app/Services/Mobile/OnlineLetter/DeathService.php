<?php

namespace App\Services\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\OnlineLetter\DeathServiceInterface;
use App\Models\CertificateDeath;
use App\Models\CertificateDeathApplicant;
use App\Models\CertificateDeathPerson;
use App\Models\CertificateDeathRecord;
use App\Schemas\Mobile\OnlineLetter\Death\DeathSchema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DeathService implements DeathServiceInterface
{
    public function send(DeathSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataDeath = [
                'date' => Carbon::now(),
                'reference_number' => 'SKKM' . date('YmdHis'),
                'status' => 'created',
                'approved_by_id' => null,
                'approved_at' => null
            ];
            $certificateDeath = CertificateDeath::create($dataDeath);

            $dataApplicant = [
                'certificate_death_id' => $certificateDeath->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            CertificateDeathApplicant::create($dataApplicant);

            $dataPerson = [
                'certificate_death_id' => $certificateDeath->id,
                'name' => $schema->getName(),
                'family_identifier_number' => $schema->getFamilyIdentifier(),
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
            CertificateDeathPerson::create($dataPerson);

            $dataRecord = [
                'certificate_death_id' => $certificateDeath->id,
                'date' => $schema->getDateOfDeath(),
                'death_place' => $schema->getDeathPlace(),
                'district_name' => $schema->getDistrict(),
                'city_name' => $schema->getCity(),
                'province_name' => $schema->getProvince(),
                'cause_of_death' => $schema->getCauseOfDeath(),
                'decider' => $schema->getDecider(),
                'post_mortem_notes' => $schema->getPostMortemNotes(),
                'birth_order' => $schema->getBirthOrder(),
            ];
            CertificateDeathRecord::create($dataRecord);
            DB::commit();
            return ServiceResponse::statusCreated("successfully send online letter", [
                'death' => $certificateDeath,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route('online-letter.death.code', [
                    'code' => $certificateDeath->reference_number
                ])
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
