<?php

namespace App\Livewire\Pages\Landing\Gallery;

use App\Commons\Libs\Http\AlpineResponse;
use App\Services\Landing\GalleryService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
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

    public function render()
    {
        return view('livewire.pages.landing.gallery.index');
    }
}
