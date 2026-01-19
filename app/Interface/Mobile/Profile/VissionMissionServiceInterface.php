<?php

namespace App\Interface\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface VissionMissionServiceInterface
{
    public function getVissionMission(): ServiceResponse;
}
