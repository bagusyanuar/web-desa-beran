<?php

namespace App\Interface\Landing;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\News\NewsQuery;

interface NewsServiceInterface
{
    public function findAll(NewsQuery $queryParams): ServiceResponse;
    public function findSome(): ServiceResponse;
}
