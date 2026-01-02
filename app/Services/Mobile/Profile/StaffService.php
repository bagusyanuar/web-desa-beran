<?php

namespace App\Services\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\Profile\StaffServiceInterface;
use App\Models\AboutStaff;

class StaffService implements StaffServiceInterface
{
    public function getStaff(): ServiceResponse
    {
        try {
            $data = AboutStaff::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get staff", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
