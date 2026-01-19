<?php

namespace App\Services\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\Profile\VillageServiceInterface;
use App\Models\Village;

class VillageService implements VillageServiceInterface
{
    public function getVillages(): ServiceResponse
    {
        try {
            $data = Village::with(['community_units.neighborhood_units'])
                ->orderBy('name', 'ASC')
                ->get();
            return ServiceResponse::statusOK("successfully get villages", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
