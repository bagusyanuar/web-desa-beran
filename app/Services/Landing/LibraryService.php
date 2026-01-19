<?php

namespace App\Services\Landing;

use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\LibraryServiceInterface;
use App\Models\Library;
use App\Schemas\Landing\Library\LibraryQuery;

class LibraryService implements LibraryServiceInterface
{
    public function findAll(LibraryQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = Library::with([])
                ->when($queryParams->getParam(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('title', 'LIKE', "%{$queryParams->getParam()}%")
                        ->orWhere('author_name', 'LIKE', "%{$queryParams->getParam()}%");
                })
                ->orderBy('title', 'ASC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get libraries", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }


    public function findSome(): ServiceResponse
    {
        try {
            $data = Library::with([])
                ->orderBy('created_at', 'DESC')
                ->take(5)
                ->get();
            return ServiceResponse::statusOK("successfully get libraries", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findBySlug($slug): ServiceResponse
    {
        try {
            $data = Library::with([])
                ->where('slug', '=', $slug)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("library not found");
            }
            return ServiceResponse::statusOK("successfully get library", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
