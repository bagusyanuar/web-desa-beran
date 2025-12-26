<?php

namespace App\Services\Mobile\OnlineLetter;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\OnlineLetter\DomicileServiceInterface;
use App\Models\CertificateDomicile;
use App\Models\CertificateDomicileApplicant;
use App\Models\CertificateDomicilePerson;
use App\Schemas\Mobile\OnlineLetter\Domicile\DomicileSchema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
                'reference_number' => 'SKDP' . date('YmdHis'),
                'status' => 'created',
                'purpose' => $schema->getPurpose(),
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
}
