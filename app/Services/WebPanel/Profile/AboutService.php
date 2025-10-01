<?php

namespace App\Services\WebPanel\Profile;

use App\Commons\FileUpload\FileUpload;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\Profile\AboutServiceInterface;
use App\Models\About;
use App\Schemas\WebPanel\Profile\About\AboutSchema;

class AboutService implements AboutServiceInterface
{
    public function save(AboutSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $data = About::with([])
                ->first();

            # create images
            $profileImage = null;
            if ($schema->getImage()) {
                $fileUploadService = new FileUpload($schema->getImage(), "assets/images/profile");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $profileImage = $fileUploadResponse->getFileName();
            }
            if (!$data) {
                About::create(
                    [
                        'description' => $schema->getDescription(),
                        'image' => $profileImage
                    ],
                );
            } else {
                $data->update([
                    'description' => $schema->getDescription(),
                    'image' => $profileImage
                ]);
            }
            return ServiceResponse::statusOK("successfully update profil");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function getAbout(): ServiceResponse
    {
        try {
            $data = About::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get profil", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
