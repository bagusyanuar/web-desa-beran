<?php

namespace App\Http\Controllers\Mobile\Profile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomController;
use App\Http\Resources\Profile\Potention\PotentionResource;
use App\Services\Mobile\Profile\PotentionService;
use Illuminate\Http\Request;

class PotentionController extends CustomController
{
    /** @var PotentionService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new PotentionService();
    }

    public function getPotention()
    {
        $response = $this->service->getPotention();
        return new PotentionResource($response->getData(), $response->getStatus(), $response->getMessage());
    }
}
