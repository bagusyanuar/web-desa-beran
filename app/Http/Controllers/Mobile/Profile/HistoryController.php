<?php

namespace App\Http\Controllers\Mobile\Profile;

use App\Http\Controllers\CustomController;
use App\Http\Resources\Profile\History\HistoryResource;
use App\Services\Mobile\Profile\HistoryService;

class HistoryController extends CustomController
{
    /** @var HistoryService $service */
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new HistoryService();
    }

    public function getHistory()
    {
        $response = $this->service->getHistory();
        return new HistoryResource($response->getData(), $response->getStatus(), $response->getMessage());
    }
}
