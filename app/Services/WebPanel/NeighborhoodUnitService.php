<?php

namespace App\Services\WebPanel;

use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\NeighborhoodUnitServiceInterface;
use App\Models\NeighborhoodUnit;
use App\Schemas\WebPanel\NeighborhoodUnit\NeighborhoodUnitQuery;
use App\Schemas\WebPanel\NeighborhoodUnit\NeighborhoodUnitSchema;

class NeighborhoodUnitService implements NeighborhoodUnitServiceInterface
{
    public function findAll(NeighborhoodUnitQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = NeighborhoodUnit::with(['community_unit.village'])
                ->when($queryParams->getParam(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('code', 'LIKE', "%{$queryParams->getParam()}%")
                        ->orWhere('leader_name', 'LIKE', "%{$queryParams->getParam()}%");
                })
                ->orderBy('code', 'ASC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get neighborhood units", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByID($id): ServiceResponse
    {
        try {
            $data = NeighborhoodUnit::with(['community_unit'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }
            return ServiceResponse::statusOK("successfully get neighborhood unit", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function create(NeighborhoodUnitSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $data = [
                'community_unit_id' => $schema->getCommunityUnitId(),
                'code' => $schema->getCode(),
                'leader_name' => $schema->getLeaderName(),
                'leader_contact' => $schema->getLeaderContact(),
            ];

            NeighborhoodUnit::create($data);
            return ServiceResponse::statusCreated("successfully create neighborhood unit");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function update($id, NeighborhoodUnitSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $neighborhoodUnit = NeighborhoodUnit::with(['community_unit'])
                ->where('id', '=', $id)
                ->first();
            if (!$neighborhoodUnit) {
                return ServiceResponse::notFound("data not found");
            }

            $data = [
                'community_unit_id' => $schema->getCommunityUnitId(),
                'code' => $schema->getCode(),
                'leader_name' => $schema->getLeaderName(),
                'leader_contact' => $schema->getLeaderContact(),
            ];

            $neighborhoodUnit->update($data);
            return ServiceResponse::statusOK("successfully update neighborhood unit");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function delete($id): ServiceResponse
    {
        try {
            $neighborhoodUnit = NeighborhoodUnit::with(['community_unit'])
                ->where('id', '=', $id)
                ->first();
            if (!$neighborhoodUnit) {
                return ServiceResponse::notFound("data not found");
            }

            $neighborhoodUnit->delete();
            return ServiceResponse::statusOK("successfully delete neighborhood unit");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
