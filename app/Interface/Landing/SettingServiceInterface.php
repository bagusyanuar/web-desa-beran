<?php

namespace App\Interface\Landing;

use App\Commons\Libs\Http\ServiceResponse;

interface SettingServiceInterface
{
    public function getSetting(): ServiceResponse;
}
