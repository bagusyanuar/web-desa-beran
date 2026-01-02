<?php

namespace App\Http\Controllers\Mobile\Profile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Http\Resources\Profile\Regional\RegionalResource;
use App\Services\Mobile\Profile\RegionalService;
use Illuminate\Http\Request;

class RegionalController extends CustomController
{
    /** @var RegionalService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new RegionalService();
    }

    public function getRegional()
    {
        $response = $this->service->getRegional();
        return new RegionalResource($response->getData(), $response->getStatus(), $response->getMessage());
    }
}
