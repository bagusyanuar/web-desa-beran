<?php

namespace App\Commons\Libs\Http;

class AlpineResponse
{
    public static function fromService(ServiceResponse $serviceResponse): array
    {
        return [
            'status' => $serviceResponse->getStatus(),
            'message' => $serviceResponse->getMessage(),
            'data' => $serviceResponse->getData(),
            'meta' => $serviceResponse->getMeta()
        ];
    }
}
