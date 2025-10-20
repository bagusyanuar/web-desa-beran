<?php

namespace App\Livewire\Pages\Landing\Library;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\Landing\Library\LibraryQuery;
use App\Services\Landing\LibraryService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
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

    public function render()
    {
        return view('livewire.pages.landing.library.index');
    }
}
