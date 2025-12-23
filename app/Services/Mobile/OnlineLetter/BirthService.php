<?php

namespace App\Services\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\OnlineLetter\BirthServiceInterface;
use App\Models\CertificateBirth;
use App\Models\CertificateBirthApplicant;
use App\Models\CertificateBirthFather;
use App\Models\CertificateBirthInfant;
use App\Models\CertificateBirthMother;
use App\Schemas\Mobile\OnlineLetter\Birth\BirthSchema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BirthService implements BirthServiceInterface
{
    public function send(BirthSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataBirth = [
                'date' => Carbon::now(),
                'reference_number' => 'SKKL' . date('YmdHis'),
                'status' => 'created',
                'approved_by_id' => null,
                'approved_at' => null
            ];
            $certificateBirth = CertificateBirth::create($dataBirth);

            $dataInfant = [
                'certificate_birth_id' => $certificateBirth->id,
                'name' => $schema->getInfantName(),
                'birth_place' => $schema->getInfantBirthPlace(),
                'date_of_birth' => $schema->getInfantDateOfBirth(),
                'gender' => $schema->getInfantGender(),
                'birth_type' => $schema->getInfantBirthType(),
                'birth_order' => $schema->getInfantBirthOrder(),
            ];
            CertificateBirthInfant::create($dataInfant);

            $dataMother = [
                'certificate_birth_id' => $certificateBirth->id,
                'name' => $schema->getMotherName(),
                'identifier_number' => $schema->getMotherNik(),
                'birth_place' => $schema->getMotherBirthPlace(),
                'date_of_birth' => $schema->getMotherDateOfBirth(),
                'citizenship' => $schema->getMotherCitizenShip(),
                'religion' => $schema->getMotherReligion(),
                'job' => $schema->getMotherJob(),
                'address' => $schema->getMotherAddress(),
            ];
            CertificateBirthMother::create($dataMother);

            $dataFather = [
                'certificate_birth_id' => $certificateBirth->id,
                'name' => $schema->getFatherName(),
                'identifier_number' => $schema->getFatherNik(),
                'birth_place' => $schema->getFatherBirthPlace(),
                'date_of_birth' => $schema->getFatherDateOfBirth(),
                'citizenship' => $schema->getFatherCitizenShip(),
                'religion' => $schema->getFatherReligion(),
                'job' => $schema->getFatherJob(),
                'address' => $schema->getFatherAddress(),
            ];
            CertificateBirthFather::create($dataFather);

            $dataApplicant = [
                'certificate_birth_id' => $certificateBirth->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            CertificateBirthApplicant::create($dataApplicant);

            DB::commit();
            return ServiceResponse::statusCreated("successfully send online letter", [
                'birth' => $certificateBirth,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route('online-letter.birth.code', [
                    'code' => $certificateBirth->reference_number
                ])
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
