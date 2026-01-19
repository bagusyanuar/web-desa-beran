<?php

namespace App\Http\Controllers\Mobile\OnlineLetter;

use App\Commons\Libs\Http\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Schemas\Mobile\OnlineLetter\Income\IncomeSchema;
use App\Services\Mobile\OnlineLetter\IncomeService;
use Illuminate\Http\Request;

class IncomeController extends CustomController
{
    /** @var IncomeService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new IncomeService();
    }

    public function send()
    {
        $body = $this->jsonBody();
        $schema = (new IncomeSchema())->hydrateSchemaBody($body);
        $response = $this->service->send($schema);
        return APIResponse::fromService($response);
    }
}
