<?php

namespace App\Interface\Landing\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface CommunityServiceInterface
{
    public function getProfile(): ServiceResponse;
}
