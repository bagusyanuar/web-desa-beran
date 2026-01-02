<?php

namespace App\Http\Controllers\Mobile\OnlineLetter;

use App\Commons\Libs\Http\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Schemas\Mobile\OnlineLetter\Domicile\DomicileSchema;
use App\Services\Mobile\OnlineLetter\DomicileService;
use Illuminate\Http\Request;

class DomicileController extends CustomController
{
    /** @var DomicileService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new DomicileService();
    }

    public function send()
    {
        $body = $this->jsonBody();
        $schema = (new DomicileSchema())->hydrateSchemaBody($body);
        $response = $this->service->send($schema);
        return APIResponse::fromService($response);
    }
}
