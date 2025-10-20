<?php

namespace App\Services\WebPanel\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\Profile\AboutVissionMissionServiceInterface;
use App\Models\AboutVissionMission;
use App\Schemas\WebPanel\Profile\AboutVissionMission\AboutVissionMissionSchema;

class AboutVissionMissionService implements AboutVissionMissionServiceInterface
{
    public function save(AboutVissionMissionSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $data = AboutVissionMission::with([])
                ->first();

            if (!$data) {
                AboutVissionMission::create(
                    [
                        'vission' => $schema->getVission(),
                        'mission' => $schema->getMission(),
                    ],
                );
            } else {
                $data->update([
                    'vission' => $schema->getVission(),
                    'mission' => $schema->getMission(),
                ]);
            }
            return ServiceResponse::statusOK("successfully update profil vission and mission");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function getAbout(): ServiceResponse
    {
        try {
            $data = AboutVissionMission::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get profil vission and mission", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
