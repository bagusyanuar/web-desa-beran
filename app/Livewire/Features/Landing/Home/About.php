<?php

namespace App\Livewire\Features\Landing\Home;

use App\Services\Landing\Profile\HistoryService;
use Livewire\Component;

class About extends Component
{
    public $data = null;

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
        return view('livewire.features.landing.home.about');
    }
}
