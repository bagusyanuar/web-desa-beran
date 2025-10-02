<?php

namespace App\Services\WebPanel\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\Profile\AboutRegionalServiceInterface;
use App\Models\AboutRegional;
use App\Schemas\WebPanel\Profile\AboutRegional\AboutRegionalSchema;

class AboutRegionalService implements AboutRegionalServiceInterface
{
    public function save(AboutRegionalSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $data = AboutRegional::with([])
                ->first();

            if (!$data) {
                AboutRegional::create(
                    [
                        'description' => $schema->getDescription(),
                    ],
                );
            } else {
                $data->update([
                    'description' => $schema->getDescription(),
                ]);
            }
            return ServiceResponse::statusOK("successfully update profil regional");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function getAbout(): ServiceResponse
    {
        try {
            $data = AboutRegional::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get profil regional", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
