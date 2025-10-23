<?php

namespace App\Livewire\Pages\WebPanel\Complaint;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Complaint\ComplaintQuery;
use App\Services\WebPanel\ComplaintService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
     /** @var ComplaintService $service */
    private $service;

    public function boot(ComplaintService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new ComplaintQuery())->hydrateSchemaQuery($query);
        $response = $this->service->findAll($queryParams);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.complaint.index');
    }
}
