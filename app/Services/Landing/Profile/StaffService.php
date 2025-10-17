<?php

namespace App\Services\Landing\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\Profile\StaffServiceInterface;
use App\Models\AboutStaff;

class StaffService implements StaffServiceInterface
{
    public function getProfile(): ServiceResponse
    {
        try {
            $data = AboutStaff::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get staffs", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
