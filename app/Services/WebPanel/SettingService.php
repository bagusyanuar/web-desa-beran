<?php

namespace App\Services\WebPanel;

use App\Commons\FileUpload\FileUpload;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\SettingServiceInterface;
use App\Models\Setting;
use App\Schemas\WebPanel\Setting\SettingGreetingWordSchema;
use App\Schemas\WebPanel\Setting\SettingHeroSchema;

class SettingService implements SettingServiceInterface
{
    public function createHeroImage(SettingHeroSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            # create thumbnail
            $heroImageName = null;
            if ($schema->getHeroImage()) {
                $fileUploadService = new FileUpload($schema->getHeroImage(), "assets/images/hero");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $heroImageName = $fileUploadResponse->getFileName();
            }
            $dataHero = [
                'image_hero' => $heroImageName,
            ];

            $setting = Setting::with([])
                ->first();

            if (!$setting) {
                Setting::create($dataHero);
            } else {
                $setting->update($dataHero);
            }

            return ServiceResponse::statusOK("successfully update hero");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function createGreetingWord(SettingGreetingWordSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataHero = [
                'greeting_word' => $schema->getText(),
            ];

            $setting = Setting::with([])
                ->first();

            if (!$setting) {
                Setting::create($dataHero);
            } else {
                $setting->update($dataHero);
            }

            return ServiceResponse::statusOK("successfully greeting word");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function getSetting(): ServiceResponse
    {
        try {
            $data = Setting::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get setting", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
