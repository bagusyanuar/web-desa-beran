<?php

namespace App\Livewire\Pages\Landing\Profile\History;

use App\Services\Landing\Profile\HistoryService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Index extends Component
{
    /** @var HistoryService $service */
    private $service;

    public $data;

    public function boot(HistoryService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $service = new HistoryService();
        $response = $service->getProfile();
        if ($response->getStatus() === 200) {
            $this->data = $response->getData();
        } else {
            $this->data = null;
        }
    }

    public function render()
    {
        return view('livewire.pages.landing.profile.history.index');
    }
}
