<?php

namespace App\Services\WebPanel\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\Profile\AboutPotentionServiceInterface;
use App\Models\AboutPotention;
use App\Schemas\WebPanel\Profile\AboutPotention\AboutPotentionSchema;

class AboutPotentionService implements AboutPotentionServiceInterface
{
    public function save(AboutPotentionSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $data = AboutPotention::with([])
                ->first();

            if (!$data) {
                AboutPotention::create(
                    [
                        'description' => $schema->getDescription(),
                    ],
                );
            } else {
                $data->update([
                    'description' => $schema->getDescription(),
                ]);
            }
            return ServiceResponse::statusOK("successfully update profil potention");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function getAbout(): ServiceResponse
    {
        try {
            $data = AboutPotention::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get profil potention", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
