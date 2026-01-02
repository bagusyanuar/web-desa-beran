<?php

namespace App\Services\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\Profile\RegionalServiceInterface;
use App\Models\AboutRegional;

class RegionalService implements RegionalServiceInterface
{
    public function getRegional(): ServiceResponse
    {
        try {
            $data = AboutRegional::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get regional", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
