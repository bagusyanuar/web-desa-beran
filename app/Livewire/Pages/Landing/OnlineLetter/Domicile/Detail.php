<?php

namespace App\Livewire\Pages\Landing\OnlineLetter\Domicile;

use App\Services\Landing\OnlineLetter\DomicileService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Detail extends Component
{
    public $data;
    public $code;

    /** @var DomicileService $service */
    private $service;

    public function boot(DomicileService $service)
    {
        $this->service = $service;
    }

    public function mount($code)
    {
        $this->code = $code;
        $response = $this->service->findByCode($code);
        if ($response->getStatus() === 404) {
            abort(404, 'Data Permohonan Tidak DiTemukan');
        }
        $this->data = $response->getData();
    }

    public function render()
    {
        return view('livewire.pages.landing.online-letter.domicile.detail');
    }
}
