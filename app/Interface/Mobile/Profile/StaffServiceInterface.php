<?php

namespace App\Interface\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface StaffServiceInterface
{
    public function getStaff(): ServiceResponse;
}
