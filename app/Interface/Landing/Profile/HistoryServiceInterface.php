<?php

namespace App\Interface\Landing\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface HistoryServiceInterface
{
    public function getProfile(): ServiceResponse;
}
