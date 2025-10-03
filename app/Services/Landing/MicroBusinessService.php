<?php

namespace App\Services\Landing;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\MicroBusinessServiceInterface;
use App\Models\MicroBusiness;

class MicroBusinessService implements MicroBusinessServiceInterface
{
    public function findSome(): ServiceResponse
    {
        try {
            $data = MicroBusiness::with(['owner', 'contact'])
                ->orderBy('created_at', 'DESC')
                ->take(5)
                ->get();
            return ServiceResponse::statusOK("successfully get micro business", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
