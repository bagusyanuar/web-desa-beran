<?php

namespace App\Interface\Landing\Profile;

use App\Commons\Libs\Http\ServiceResponse;

interface VillageServiceInterface
{
    public function getVillages(): ServiceResponse;
}
