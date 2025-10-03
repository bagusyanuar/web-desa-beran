<?php

namespace App\Interface\Landing;

use App\Commons\Libs\Http\ServiceResponse;

interface MicroBusinessServiceInterface
{
    public function findSome(): ServiceResponse;
}
