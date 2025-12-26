<?php

namespace App\Http\Controllers\Mobile\OnlineLetter;

use App\Commons\Libs\Http\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Schemas\Mobile\OnlineLetter\Incapacity\IncapacitySchema;
use App\Services\Mobile\OnlineLetter\IncapacityService;
use Illuminate\Http\Request;

class IncapacityController extends CustomController
{
    /** @var IncapacityService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new IncapacityService();
    }

    public function send()
    {
        $body = $this->jsonBody();
        $schema = (new IncapacitySchema())->hydrateSchemaBody($body);
        $response = $this->service->send($schema);
        return APIResponse::fromService($response);
    }
}
