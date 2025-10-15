<?php

namespace App\Interface\Landing\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface VissionMissionServiceInterface
{
    public function getProfile(): ServiceResponse;
}
