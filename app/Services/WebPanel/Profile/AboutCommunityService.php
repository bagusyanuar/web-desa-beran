<?php

namespace App\Services\WebPanel\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\Profile\CommunityServiceInterface;
use App\Models\AboutCommunity;
use App\Schemas\WebPanel\Profile\Community\CommunitySchema;

class AboutCommunityService implements CommunityServiceInterface
{
    public function save(CommunitySchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $data = AboutCommunity::with([])
                ->first();

            if (!$data) {
                AboutCommunity::create(
                    [
                        'description' => $schema->getDescription(),
                    ],
                );
            } else {
                $data->update([
                    'description' => $schema->getDescription(),
                ]);
            }
            return ServiceResponse::statusOK("successfully update profil community");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function getAbout(): ServiceResponse
    {
        try {
            $data = AboutCommunity::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get profil community", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
