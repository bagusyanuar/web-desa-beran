<?php

namespace App\Livewire\Pages\WebPanel\OnlineLetter\SingleStatus;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\OnlineLetter\SingleStatus\SingleStatusQuery;
use App\Services\WebPanel\OnlineLetter\SingleStatusService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var SingleStatusService $service */
    private $service;

    public function boot(SingleStatusService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new SingleStatusQuery())->hydrateSchemaQuery($query);
        $response = $this->service->findAll($queryParams);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.online-letter.single-status.index');
    }
}
