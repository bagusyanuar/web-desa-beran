<?php

namespace App\Livewire\Pages\WebPanel\OnlineLetter\ParentIncome;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\OnlineLetter\ParentIncome\ParentIncomeQuery;
use App\Services\WebPanel\OnlineLetter\ParentIncomeService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var ParentIncomeService $service */
    private $service;

    public function boot(ParentIncomeService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new ParentIncomeQuery())->hydrateSchemaQuery($query);
        $response = $this->service->findAll($queryParams);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.online-letter.parent-income.index');
    }
}
