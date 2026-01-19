<?php

namespace App\Services\Landing\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\Profile\CommunityServiceInterface;
use App\Models\AboutCommunity;

class CommunityService implements CommunityServiceInterface
{
    public function getProfile(): ServiceResponse
    {
        try {
            $data = AboutCommunity::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get community profile", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
