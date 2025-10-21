<?php

namespace App\Services\Landing;

use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\MicroBusinessServiceInterface;
use App\Models\MicroBusiness;
use App\Schemas\Landing\MicroBusiness\MicroBusinessQuery;

class MicroBusinessService implements MicroBusinessServiceInterface
{
    public function findAll(MicroBusinessQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = MicroBusiness::with(['owner', 'contact', 'image'])
                ->when($queryParams->getParam(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('title', 'LIKE', "%{$queryParams->getParam()}%")
                        ->orWhereRelation('owner', 'name', 'LIKE', "%{$queryParams->getParam()}%");
                })
                ->orderBy('created_at', 'DESC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get micro business", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findSome(): ServiceResponse
    {
        try {
            $data = MicroBusiness::with(['owner', 'contact'])
                ->orderBy('created_at', 'DESC')
                ->take(5)
                ->get();
            return ServiceResponse::statusOK("successfully get micro business", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findBySlug($slug): ServiceResponse
    {
        try {
            $data = MicroBusiness::with(['owner', 'contact', 'image'])
                ->where('slug', '=', $slug)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("micro business not found");
            }
            return ServiceResponse::statusOK("successfully get micro business", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
