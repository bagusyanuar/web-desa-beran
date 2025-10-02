<?php

namespace App\Services\Landing\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\Profile\RegionalServiceInterface;
use App\Models\AboutRegional;

class RegionalService implements RegionalServiceInterface
{
    public function getProfile(): ServiceResponse
    {
        try {
            $data = AboutRegional::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get regional profile", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
