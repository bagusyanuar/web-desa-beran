<?php

namespace App\Livewire\Pages\Landing\MicroBusiness;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\Landing\MicroBusiness\MicroBusinessQuery;
use App\Services\Landing\MicroBusinessService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
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

    public function render()
    {
        return view('livewire.pages.landing.micro-business.index');
    }
}
