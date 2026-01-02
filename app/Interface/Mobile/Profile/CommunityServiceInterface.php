<?php

namespace App\Interface\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface CommunityServiceInterface
{
    public function getCommunity(): ServiceResponse;
}
