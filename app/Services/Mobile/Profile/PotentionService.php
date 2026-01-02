<?php

namespace App\Services\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\Profile\PotentionServiceInterface;
use App\Models\AboutPotention;

class PotentionService implements PotentionServiceInterface
{
    public function getPotention(): ServiceResponse
    {
        try {
            $data = AboutPotention::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get profil potention", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
