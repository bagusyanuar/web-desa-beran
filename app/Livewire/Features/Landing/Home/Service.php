<?php

namespace App\Livewire\Features\Landing\Home;

use App\Commons\Const\Service as AppService;
use Livewire\Component;

class Service extends Component
{
    public $services = AppService::SERVICES;

    public function render()
    {
        return view('livewire.features.landing.home.service');
    }
}
