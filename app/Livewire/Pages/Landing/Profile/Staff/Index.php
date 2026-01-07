<?php

namespace App\Livewire\Pages\Landing\Profile\Staff;

use App\Services\Landing\Profile\StaffService;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Index extends Component
{
    public $data;

    public function mount()
    {
        $service = new StaffService();
        $response = $service->getProfile();
        if ($response->getStatus() === 200) {
            $this->data = $response->getData();
        } else {
            $this->data = [];
        }
    }

    public function render()
    {
        return view('livewire.pages.landing.profile.staff.index');
    }
}
