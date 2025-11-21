<?php

namespace App\Services\Landing;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\SettingServiceInterface;
use App\Models\Setting;

class SettingService implements SettingServiceInterface
{
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
