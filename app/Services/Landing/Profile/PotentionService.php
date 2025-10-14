<?php

namespace App\Services\Landing\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\Profile\PotentionServiceInterface;
use App\Models\AboutPotention;

class PotentionService implements PotentionServiceInterface
{
    public function getProfile(): ServiceResponse
    {
        try {
            $data = AboutPotention::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get potention profile", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
