<?php

namespace App\Services\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\OnlineLetter\PoliceClearanceServiceInterface;
use App\Models\CertificatePoliceClearance;
use App\Models\CertificatePoliceClearanceApplicant;
use App\Models\CertificatePoliceClearanceDescription;
use App\Models\CertificatePoliceClearancePerson;
use App\Schemas\Mobile\OnlineLetter\PoliceClearance\PoliceClearanceSchema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PoliceClearanceService implements PoliceClearanceServiceInterface
{
    public function send(PoliceClearanceSchema $schema): ServiceResponse
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
                'reference_number' => 'SKCK' . date('YmdHis'),
                'status' => 'created',
                'purpose' => $schema->getPurpose(),
                'approved_by_id' => null,
                'approved_at' => null
            ];
            $certificatePoliceClearance = CertificatePoliceClearance::create($dataDeath);

            $dataApplicant = [
                'certificate_police_clearance_id' => $certificatePoliceClearance->id,
                'name' => $schema->getApplicantName(),
                'phone' => $schema->getApplicantPhone(),
            ];
            CertificatePoliceClearanceApplicant::create($dataApplicant);

            $dataPerson = [
                'certificate_police_clearance_id' => $certificatePoliceClearance->id,
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
            CertificatePoliceClearancePerson::create($dataPerson);

            foreach ($schema->getDescriptions() as $description) {
                $dataDescription = [
                    'certificate_police_clearance_id' => $certificatePoliceClearance->id,
                    'description' => $description,
                ];
                CertificatePoliceClearanceDescription::create($dataDescription);
            }

            DB::commit();
            return ServiceResponse::statusCreated("successfully send online letter", [
                'police_clearance' => $certificatePoliceClearance,
                'applicant' => [
                    'name' => $schema->getApplicantName(),
                    'phone' => $schema->getApplicantPhone(),
                ],
                'url' => route('online-letter.police-clearance.code', [
                    'code' => $certificatePoliceClearance->reference_number
                ])
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
