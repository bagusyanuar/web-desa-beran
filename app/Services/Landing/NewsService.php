<?php

namespace App\Services\Landing;

use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\NewsServiceInterface;
use App\Models\News;
use App\Schemas\Landing\News\NewsQuery;

class NewsService implements NewsServiceInterface
{
    public function findAll(NewsQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = News::with(['author', 'thumbnail'])
                ->when($queryParams->getParam(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('title', 'LIKE', "%{$queryParams->getParam()}%");
                })
                ->orderBy('title', 'ASC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get news", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }


    public function findSome(): ServiceResponse
    {
        try {
            $data = News::with(['thumbnail'])
                ->orderBy('created_at', 'DESC')
                ->take(5)
                ->get();
            return ServiceResponse::statusOK("successfully get news", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
