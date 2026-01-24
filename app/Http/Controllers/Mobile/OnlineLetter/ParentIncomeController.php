<?php

namespace App\Http\Controllers\Mobile\OnlineLetter;

use App\Commons\Libs\Http\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Schemas\Mobile\OnlineLetter\ParentIncome\ParentIncomeSchema;
use App\Services\Mobile\OnlineLetter\ParentIncomeService;
use Illuminate\Http\Request;

class ParentIncomeController extends CustomController
{
    /** @var ParentIncomeService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new ParentIncomeService();
    }

    public function send()
    {
        $body = $this->jsonBody();
        $schema = (new ParentIncomeSchema())->hydrateSchemaBody($body);
        $response = $this->service->send($schema);
        return APIResponse::fromService($response);
    }
}
