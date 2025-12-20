<?php

namespace App\Http\Controllers\Mobile\Profile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Http\Resources\Profile\Staff\StaffResource;
use App\Services\Mobile\Profile\StaffService;
use Illuminate\Http\Request;

class StaffController extends CustomController
{
    /** @var StaffService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new StaffService();
    }

    public function getStaff()
    {
        $response = $this->service->getStaff();
        return new StaffResource($response->getData(), $response->getStatus(), $response->getMessage());
    }
}
