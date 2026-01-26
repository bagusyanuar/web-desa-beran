<?php

namespace App\Http\Controllers\Mobile\OnlineLetter;

use App\Commons\Libs\Http\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Schemas\Mobile\OnlineLetter\MaritalStatus\MaritalStatusSchema;
use App\Services\Mobile\OnlineLetter\MaritalStatusService;
use Illuminate\Http\Request;

class MaritalStatusController extends CustomController
{
    /** @var MaritalStatusService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new MaritalStatusService();
    }

    public function send()
    {
        $body = $this->jsonBody();
        $schema = (new MaritalStatusSchema())->hydrateSchemaBody($body);
        $response = $this->service->send($schema);
        return APIResponse::fromService($response);
    }
}
