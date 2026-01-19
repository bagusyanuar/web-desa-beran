<?php

namespace App\Http\Resources\Profile\Regional;

use App\Commons\Libs\Resource\BaseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegionalResource extends BaseResource
{
    protected function transformData(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'description' => $this->description,
        ];
        return $data;
    }
}
