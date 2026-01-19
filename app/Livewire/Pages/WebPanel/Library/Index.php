<?php

namespace App\Livewire\Pages\WebPanel\Library;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Library\LibraryQuery;
use App\Services\WebPanel\LibraryService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var LibraryService $service */
    private $service;

    public function boot(LibraryService $service)
    {
        $this->service = $service;
    }

    public function findAll($query)
    {
        $queryParams = (new LibraryQuery())->hydrateSchemaQuery($query);
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
        return view('livewire.pages.web-panel.library.index');
    }
}
