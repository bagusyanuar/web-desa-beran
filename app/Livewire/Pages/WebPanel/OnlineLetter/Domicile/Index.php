<?php

namespace App\Livewire\Pages\WebPanel\OnlineLetter\Domicile;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\OnlineLetter\Domicile\DomicileQuery;
use App\Services\WebPanel\OnlineLetter\DomicileService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var DomicileService $service */
    private $service;

    public function boot(DomicileService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new DomicileQuery())->hydrateSchemaQuery($query);
        $response = $this->service->findAll($queryParams);
        return AlpineResponse::fromService($response);
    }
    public function render()
    {
        return view('livewire.pages.web-panel.online-letter.domicile.index');
    }
}
