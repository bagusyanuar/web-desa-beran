<?php

namespace App\Interface\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface RegionalServiceInterface
{
    public function getRegional(): ServiceResponse;
}
