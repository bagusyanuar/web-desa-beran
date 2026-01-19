<?php

namespace App\Http\Controllers\Mobile\OnlineLetter;

use App\Commons\Libs\Http\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Schemas\Mobile\OnlineLetter\Birth\BirthSchema;
use App\Services\Mobile\OnlineLetter\BirthService;
use Illuminate\Http\Request;

class BirthController extends CustomController
{
    /** @var BirthService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new BirthService();
    }

    public function send()
    {
        $body = $this->jsonBody();
        $schema = (new BirthSchema())->hydrateSchemaBody($body);
        $response = $this->service->send($schema);
        return APIResponse::fromService($response);
    }
}
