<?php

namespace App\Services\Mobile\Publication;

use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\Publication\NewsServiceInterface;
use App\Models\News;
use App\Schemas\Mobile\Publication\News\NewsQuery;

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

    public function findBySlug($slug): ServiceResponse
    {
        try {
            $data = News::with(['author', 'thumbnail', 'images'])
                ->where('slug', '=', $slug)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("news not found");
            }
            return ServiceResponse::statusOK("successfully get news", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
