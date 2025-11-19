<?php

namespace App\Services\WebPanel;

use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\VillageServiceInterface;
use App\Models\Village;
use App\Schemas\WebPanel\Village\VillageQuery;
use App\Schemas\WebPanel\Village\VillageSchema;

class VillageService implements VillageServiceInterface
{
    public function findAllNoPaging(): ServiceResponse
    {
        try {
            $data = Village::with([])
                ->orderBy('name', 'ASC')
                ->get();
            return ServiceResponse::statusOK("successfully get villages", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findAll(VillageQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = Village::with([])
                ->when($queryParams->getParam(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('name', 'LIKE', "%{$queryParams->getParam()}%")
                        ->orWhere('leader_name', 'LIKE', "%{$queryParams->getParam()}%");
                })
                ->orderBy('name', 'ASC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get villages", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByID($id): ServiceResponse
    {
        try {
            $data = Village::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }
            return ServiceResponse::statusOK("successfully get village", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public  function create(VillageSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $data = [
                'name' => $schema->getName(),
                'leader_name' => $schema->getLeaderName(),
                'leader_contact' => $schema->getLeaderContact(),
            ];

            Village::create($data);
            return ServiceResponse::statusCreated("successfully create village");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function update($id, VillageSchema $schema): ServiceResponse
    {
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $village = Village::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$village) {
                return ServiceResponse::notFound("data not found");
            }

            $data = [
                'name' => $schema->getName(),
                'leader_name' => $schema->getLeaderName(),
                'leader_contact' => $schema->getLeaderContact(),
            ];

            $village->update($data);
            return ServiceResponse::statusOK("successfully update village");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function delete($id): ServiceResponse
    {
        try {
            $village = Village::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$village) {
                return ServiceResponse::notFound("data not found");
            }

            $village->delete();
            return ServiceResponse::statusOK("successfully delete village");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
