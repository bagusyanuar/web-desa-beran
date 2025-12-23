<?php

namespace App\Commons\Libs\Http;

use App\Commons\Enum\HttpStatus;
use Illuminate\Support\Facades\Response;

class APIResponse
{
    public static function toJSON(HttpStatus $status, string $message = '', $data = null, $meta = null)
    {
        $response = [
            'status' => $status->value,
            'message' => $message,
        ];

        if (!is_null($data)) {
            $response['data'] = $data;
        }

        if (!is_null($meta)) {
            $response['meta'] = $meta;
        }
        return Response::json($response, $status->value);
    }

    public static function toJSONResponse(
        $status = 500,
        $message = '',
        $data = null,
        $meta = null
    ) {
        return Response::json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'meta' => $meta
        ], $status);
    }

    public static function fromService(ServiceResponse $response)
    {

        return self::toJSON(
            $response->getHttpStatus(),
            $response->getMessage(),
            $response->getData(),
            $response->getMeta()
        );
    }
}
