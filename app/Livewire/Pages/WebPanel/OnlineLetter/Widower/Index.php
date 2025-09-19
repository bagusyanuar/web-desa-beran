<?php

namespace App\Livewire\Pages\WebPanel\OnlineLetter\Widower;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\OnlineLetter\MaritalStatus\MaritalStatusQuery;
use App\Services\WebPanel\OnlineLetter\MaritalStatusService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var MaritalStatusService $service */
    private $service;

    public function boot(MaritalStatusService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new MaritalStatusQuery())->hydrateSchemaQuery($query);
        $response = $this->service->findAll($queryParams);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.online-letter.widower.index');
    }
}
