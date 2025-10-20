<?php

namespace App\Services\Landing\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\Profile\VissionMissionServiceInterface;
use App\Models\AboutVissionMission;

class VissionMissionService implements VissionMissionServiceInterface
{
    public function getProfile(): ServiceResponse
    {
        try {
            $data = AboutVissionMission::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get regional vission and mission", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
