<?php

namespace App\Interface\Landing\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface RegionalServiceInterface
{
    public function getProfile(): ServiceResponse;
}
