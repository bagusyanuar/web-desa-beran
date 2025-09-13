<?php

namespace App\Livewire\Pages\WebPanel\OnlineLetter\Domicile;

use App\Services\WebPanel\OnlineLetter\DomicileService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Detail extends Component
{
    public $data;

    /** @var DomicileService $service */
    private $service;

    public function boot(DomicileService $service)
    {
        $this->service = $service;
    }

    public function mount($id)
    {
        $response = $this->service->findByID($id);
        if ($response->getStatus() === 404) {
            abort(404, 'Data Permohonan Tidak DiTemukan');
        }
        $this->data = $response->getData();
    }

    public function render()
    {
        return view('livewire.pages.web-panel.online-letter.domicile.detail');
    }
}
