<?php

namespace App\Http\Controllers\Mobile\OnlineLetter;

use App\Commons\Libs\Http\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Schemas\Mobile\OnlineLetter\SingleStatus\SingleStatusSchema;
use App\Services\Mobile\OnlineLetter\SingleStatusService;
use Illuminate\Http\Request;

class SingleStatusController extends CustomController
{
    /** @var SingleStatusService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new SingleStatusService();
    }

    public function send()
    {
        $body = $this->jsonBody();
        $schema = (new SingleStatusSchema())->hydrateSchemaBody($body);
        $response = $this->service->send($schema);
        return APIResponse::fromService($response);
    }
}
