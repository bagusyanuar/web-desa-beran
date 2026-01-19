<?php

namespace App\Http\Controllers\Mobile\Profile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Http\Resources\Profile\Community\CommunityResource;
use App\Services\Mobile\Profile\CommunityService;
use Illuminate\Http\Request;

class CommunityController extends CustomController
{
    /** @var CommunityService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new CommunityService();
    }

    public function getCommunity()
    {
        $response = $this->service->getCommunity();
        return new CommunityResource($response->getData(), $response->getStatus(), $response->getMessage());
    }
}
