<?php

namespace App\Livewire\Pages\WebPanel\MicroBusiness;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.web-panel.micro-business.index');
    }
}
