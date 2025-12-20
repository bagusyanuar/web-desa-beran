<?php

namespace App\Http\Resources\Profile\Village;

use App\Commons\Libs\Resource\BaseCollection;
use App\Commons\Libs\Resource\BaseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VillageCollection extends BaseCollection
{
    protected $baseResource = VillageResource::class;
}
