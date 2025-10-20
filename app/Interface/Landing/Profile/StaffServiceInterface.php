<?php

namespace App\Interface\Landing\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface StaffServiceInterface
{
    public function getProfile(): ServiceResponse;
}
