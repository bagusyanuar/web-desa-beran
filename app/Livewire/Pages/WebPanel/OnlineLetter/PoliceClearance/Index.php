<?php

namespace App\Livewire\Pages\WebPanel\OnlineLetter\PoliceClearance;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\OnlineLetter\PoliceClearance\PoliceClearanceQuery;
use App\Services\WebPanel\OnlineLetter\PoliceClearanceService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var PoliceClearanceService $service */
    private $service;

    public function boot(PoliceClearanceService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new PoliceClearanceQuery())->hydrateSchemaQuery($query);
        $response = $this->service->findAll($queryParams);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.online-letter.police-clearance.index');
    }
}
