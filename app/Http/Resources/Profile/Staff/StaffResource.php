<?php

namespace App\Http\Resources\Profile\Staff;

use App\Commons\Libs\Resource\BaseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends BaseResource
{
    protected function transformData(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->position,
            'image' => $this->image ? url($this->image) : null,
        ];
        return $data;
    }
}
