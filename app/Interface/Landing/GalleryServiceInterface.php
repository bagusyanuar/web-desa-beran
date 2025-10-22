<?php

namespace App\Interface\Landing;

use App\Commons\Libs\Http\ServiceResponse;

interface GalleryServiceInterface
{
    public function findAll(): ServiceResponse;
}
