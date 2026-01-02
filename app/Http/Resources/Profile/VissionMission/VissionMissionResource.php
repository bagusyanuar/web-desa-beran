<?php

namespace App\Http\Resources\Profile\VissionMission;

use App\Commons\Libs\Resource\BaseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VissionMissionResource extends BaseResource
{
    protected function transformData(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'vission' => $this->vission,
            'mission' => $this->mission,
        ];
        return $data;
    }
}
