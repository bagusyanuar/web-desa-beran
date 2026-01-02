<?php

namespace App\Http\Controllers\Mobile\OnlineLetter;

use App\Commons\Libs\Http\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Schemas\Mobile\OnlineLetter\Death\DeathSchema;
use App\Services\Mobile\OnlineLetter\DeathService;
use Illuminate\Http\Request;

class DeathController extends CustomController
{
    /** @var DeathService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new DeathService();
    }

    public function send()
    {
        $body = $this->jsonBody();
        $schema = (new DeathSchema())->hydrateSchemaBody($body);
        $response = $this->service->send($schema);
        return APIResponse::fromService($response);
    }
}
