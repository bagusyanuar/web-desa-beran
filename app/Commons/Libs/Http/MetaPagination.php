<?php

namespace App\Commons\Libs\Http;

use Illuminate\Pagination\LengthAwarePaginator;

class MetaPagination
{
    public static function generate(LengthAwarePaginator $pagination): array
    {
        return [
            'page' => $pagination->currentPage(),
            'pageSize' => $pagination->perPage(),
            'totalRows' => $pagination->total()
        ];
    }
}
