<?php

namespace App\Interface\Mobile\Publication;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Mobile\Publication\News\NewsQuery;

interface NewsServiceInterface
{
    public function findAll(NewsQuery $queryParams): ServiceResponse;
    public function findBySlug($slug): ServiceResponse;
}
