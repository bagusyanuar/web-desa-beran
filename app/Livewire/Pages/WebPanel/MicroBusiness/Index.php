<?php

namespace App\Livewire\Pages\WebPanel\MicroBusiness;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\MicroBusiness\MicroBusinessQuery;
use App\Services\WebPanel\MicroBusinessService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var MicroBusinessService $service */
    private $service;

    public function boot(MicroBusinessService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new MicroBusinessQuery())->hydrateSchemaQuery($query);
        $response = $this->service->findAll($queryParams);
        return AlpineResponse::fromService($response);
    }

    public function delete($id)
    {
        $response = $this->service->delete($id);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.micro-business.index');
    }
}
