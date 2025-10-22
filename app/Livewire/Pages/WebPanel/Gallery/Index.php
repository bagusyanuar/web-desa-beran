<?php

namespace App\Livewire\Pages\WebPanel\Gallery;

use App\Commons\Libs\Http\AlpineResponse;
use App\Schemas\WebPanel\Gallery\GalleryQuery;
use App\Services\WebPanel\GalleryService;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    /** @var GalleryService $service */
    private $service;

    public function boot(GalleryService $service)
    {
        $this->service = $service;
    }

    public function findAll()
    {
        $response = $this->service->findAll();
        return AlpineResponse::fromService($response);
    }

    public function delete($id)
    {
        $response = $this->service->delete($id);
        return AlpineResponse::fromService($response);
    }

    public function render()
    {
        return view('livewire.pages.web-panel.gallery.index');
    }
}
