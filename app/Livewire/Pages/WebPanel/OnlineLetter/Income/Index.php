<?php

namespace App\Livewire\Pages\WebPanel\OnlineLetter\Income;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\OnlineLetter\Income\IncomeQuery;
use App\Services\WebPanel\OnlineLetter\IncomeService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var IncomeService $service */
    private $service;

    public function boot(IncomeService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new IncomeQuery())->hydrateSchemaQuery($query);
        $response = $this->service->findAll($queryParams);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.online-letter.income.index');
    }
}
