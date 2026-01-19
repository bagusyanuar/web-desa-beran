<?php

namespace App\Services\Landing;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Landing\GalleryServiceInterface;
use App\Models\Gallery;

class GalleryService implements GalleryServiceInterface
{
    public function findAll(): ServiceResponse
    {
        try {
            $data = Gallery::with([])
                ->orderBy('created_at', 'DESC')
                ->get();
            return ServiceResponse::statusOK("successfully get galleries", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
