<?php

namespace App\Interface\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface PotentionServiceInterface
{
    public function getPotention(): ServiceResponse;
}
