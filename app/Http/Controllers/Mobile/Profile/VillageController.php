<?php

namespace App\Http\Controllers\Mobile\Profile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Http\Resources\Profile\Village\VillageCollection;
use App\Services\Mobile\Profile\VillageService;
use Illuminate\Http\Request;

class VillageController extends CustomController
{
    /** @var VillageService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new VillageService();
    }

    public function getVillages()
    {
        $response = $this->service->getVillages();
        return new VillageCollection($response->getData(), $response->getHttpStatus(), $response->getMessage());
    }
}
