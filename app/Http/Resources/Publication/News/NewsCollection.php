<?php

namespace App\Http\Resources\Publication\News;

use App\Commons\Libs\Resource\BaseCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsCollection extends BaseCollection
{
    protected $baseResource = NewsResource::class;
}
