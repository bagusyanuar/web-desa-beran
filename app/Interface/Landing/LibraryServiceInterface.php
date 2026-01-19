<?php

namespace App\Interface\Landing;

use App\Commons\Libs\Http\ServiceResponse;
use App\Schemas\Landing\Library\LibraryQuery;

interface LibraryServiceInterface
{
    public function findAll(LibraryQuery $queryParams): ServiceResponse;
    public function findSome(): ServiceResponse;
    public function findBySlug($slug): ServiceResponse;
}
