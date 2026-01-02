<?php

namespace App\Interface\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface HistoryServiceInterface
{
    public function getHistory(): ServiceResponse;
}
