<?php

namespace App\Livewire\Pages\WebPanel\Profile\Staff;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Profile\AboutStaff\AboutStaffQuery;
use App\Services\WebPanel\Profile\AboutStaffService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var AboutStaffService $service */
    private $service;

    public function boot(AboutStaffService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new AboutStaffQuery())->hydrateSchemaQuery($query);
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
        return view('livewire.pages.web-panel.profile.staff.index');
    }
}
