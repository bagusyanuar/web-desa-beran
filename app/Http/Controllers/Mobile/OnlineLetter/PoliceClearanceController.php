<?php

namespace App\Http\Controllers\Mobile\OnlineLetter;

use App\Commons\Libs\Http\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Schemas\Mobile\OnlineLetter\PoliceClearance\PoliceClearanceSchema;
use App\Services\Mobile\OnlineLetter\PoliceClearanceService;
use Illuminate\Http\Request;

class PoliceClearanceController extends CustomController
{
    /** @var PoliceClearanceService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new PoliceClearanceService();
    }

    public function send()
    {
        $body = $this->jsonBody();
        $schema = (new PoliceClearanceSchema())->hydrateSchemaBody($body);
        $response = $this->service->send($schema);
        return APIResponse::fromService($response);
    }
}
