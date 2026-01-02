<?php

namespace App\Http\Resources\Profile\Village;

use App\Commons\Libs\Resource\BaseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VillageResource extends BaseResource
{
    protected function transformData(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'leader_name' => $this->leader_name,
            'leader_contact' => $this->leader_contact,
        ];

        if ($this->relationLoaded('community_units')) {
            $data['community_units'] = $this->community_units->map(function ($communityUnit) {
                $neighborhoodUnits = [];
                if ($communityUnit->relationLoaded('neighborhood_units')) {
                    $neighborhoodUnits = $communityUnit->neighborhood_units->map(function ($neighborhoodUnit) {
                        return [
                            'id' => $neighborhoodUnit->id,
                            'code' => $neighborhoodUnit->code,
                            'leader_name' => $neighborhoodUnit->leader_name,
                            'leader_contact' => $neighborhoodUnit->leader_contact,
                        ];
                    });
                }
                return [
                    'id' => $communityUnit->id,
                    'code' => $communityUnit->code,
                    'leader_name' => $communityUnit->leader_name,
                    'leader_contact' => $communityUnit->leader_contact,
                    'neighborhood_units' => $neighborhoodUnits
                ];
            });
        }
        return $data;
    }
}
