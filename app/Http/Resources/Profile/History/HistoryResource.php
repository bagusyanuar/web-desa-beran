<?php

namespace App\Http\Resources\Profile\History;

use App\Commons\Libs\Resource\BaseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends BaseResource
{
    protected function transformData(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'description' => $this->description,
            'image' => $this->image ? url($this->image) : null,
        ];
        return $data;
    }
}
