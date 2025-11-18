<?php

namespace App\Services\WebPanel;

use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\CommunityUnitServiceInterface;
use App\Models\CommunityUnit;
use App\Schemas\WebPanel\CommunityUnit\CommunityUnitQuery;
use App\Schemas\WebPanel\CommunityUnit\CommunityUnitSchema;

class CommunityUnitService implements CommunityUnitServiceInterface
{
    public function findAll(CommunityUnitQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = CommunityUnit::with(['village'])
                ->when($queryParams->getParam(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('code', 'LIKE', "%{$queryParams->getParam()}%")
                        ->orWhere('leader_name', 'LIKE', "%{$queryParams->getParam()}%");
                })
                ->orderBy('code', 'ASC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get community units", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByID($id): ServiceResponse
    {
        try {
            $data = CommunityUnit::with(['village'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }
            return ServiceResponse::statusOK("successfully get community unit", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function create(CommunityUnitSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $data = [
                'village_id' => $schema->getVillageId(),
                'code' => $schema->getCode(),
                'leader_name' => $schema->getLeaderName(),
                'leader_contact' => $schema->getLeaderContact(),
            ];

            CommunityUnit::create($data);
            return ServiceResponse::statusCreated("successfully create community unit");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function update($id, CommunityUnitSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $communityUnit = CommunityUnit::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$communityUnit) {
                return ServiceResponse::notFound("data not found");
            }

            $data = [
                'village_id' => $schema->getVillageId(),
                'code' => $schema->getCode(),
                'leader_name' => $schema->getLeaderName(),
                'leader_contact' => $schema->getLeaderContact(),
            ];

            $communityUnit->update($data);
            return ServiceResponse::statusOK("successfully update community unit");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function delete($id): ServiceResponse
    {
        try {
            $communityUnit = CommunityUnit::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$communityUnit) {
                return ServiceResponse::notFound("data not found");
            }

            $communityUnit->delete();
            return ServiceResponse::statusOK("successfully delete community unit");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
