<?php

namespace App\Services\Landing;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\NewsServiceInterface;
use App\Models\News;

class NewsService implements NewsServiceInterface
{
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
