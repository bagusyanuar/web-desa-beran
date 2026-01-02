<?php

namespace App\Services\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\Profile\CommunityServiceInterface;
use App\Models\AboutCommunity;

class CommunityService implements CommunityServiceInterface
{
    public function getCommunity(): ServiceResponse
    {
        try {
            $data = AboutCommunity::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get profil community", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
