<?php

namespace App\Livewire\Pages\Landing\Profile\Village;

use App\Services\Landing\Profile\VillageService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Index extends Component
{
    public $data;

    public function mount()
    {
        $service = new VillageService();
        $response = $service->getVillages();
        if ($response->getStatus() === 200) {
            $this->data = $response->getData();
        } else {
            $this->data = [];
        }
    }

    public function render()
    {
        return view('livewire.pages.landing.profile.village.index');
    }
}
