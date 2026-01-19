<?php

namespace App\Livewire\Pages\Landing\Profile\Potention;

use App\Services\Landing\Profile\PotentionService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Index extends Component
{
    public $data;

    public function mount()
    {
        $service = new PotentionService();
        $response = $service->getProfile();
        if ($response->getStatus() === 200) {
            $this->data = $response->getData();
        } else {
            $this->data = null;
        }
    }

    public function render()
    {
        return view('livewire.pages.landing.profile.potention.index');
    }
}
