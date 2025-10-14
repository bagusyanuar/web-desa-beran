<?php

namespace App\Interface\Landing\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface PotentionServiceInterface
{
    public function getProfile(): ServiceResponse;
}
