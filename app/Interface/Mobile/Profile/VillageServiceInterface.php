<?php

namespace App\Interface\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface VillageServiceInterface
{
    public function getVillages(): ServiceResponse;
}
