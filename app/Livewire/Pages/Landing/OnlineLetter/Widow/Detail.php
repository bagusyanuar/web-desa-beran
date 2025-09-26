<?php

namespace App\Livewire\Pages\Landing\OnlineLetter\Widow;

use App\Services\Landing\OnlineLetter\MaritalStatusService;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Detail extends Component
{
    public $data;
    public $code;

    /** @var MaritalStatusService $service */
    private $service;

    public function boot(MaritalStatusService $service)
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
        return view('livewire.pages.landing.online-letter.widow.detail');
    }
}
