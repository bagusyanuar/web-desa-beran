<?php

namespace App\Interface\Landing;

use App\Commons\Libs\Http\ServiceResponse;

interface NewsServiceInterface
{
    public function findSome(): ServiceResponse;
}
