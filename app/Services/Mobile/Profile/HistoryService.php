<?php

namespace App\Services\Mobile\Profile;

use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\Mobile\Profile\HistoryServiceInterface;
use App\Models\About;

class HistoryService implements HistoryServiceInterface
{
    public function getHistory(): ServiceResponse
    {
        try {
            $data = About::with([])
                ->first();
            return ServiceResponse::statusOK("successfully get history", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
