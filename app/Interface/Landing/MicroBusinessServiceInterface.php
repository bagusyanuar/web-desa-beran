<?php

namespace App\Interface\Landing;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\MicroBusiness\MicroBusinessQuery;

interface MicroBusinessServiceInterface
{
    public function findAll(MicroBusinessQuery $queryParams): ServiceResponse;
    public function findSome(): ServiceResponse;
}
