<?php

namespace App\Http\Controllers\Mobile\Profile;

use App\Http\Controllers\CustomController;
use App\Http\Resources\Profile\VissionMission\VissionMissionResource;
use App\Services\Mobile\Profile\VissionMissionService;

class VissionMissionController extends CustomController
{
    /** @var VissionMissionService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new VissionMissionService();
    }

    public function getVissionMission()
    {
        $response = $this->service->getVissionMission();
        return new VissionMissionResource($response->getData(), $response->getStatus(), $response->getMessage());
    }
}
