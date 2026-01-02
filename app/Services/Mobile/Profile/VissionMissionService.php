<?php

namespace App\Services\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\Profile\VissionMissionServiceInterface;
use App\Models\AboutVissionMission;

class VissionMissionService implements VissionMissionServiceInterface
{
    public function getVissionMission(): ServiceResponse
    {
        try {
            $data = AboutVissionMission::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get vission mission", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
