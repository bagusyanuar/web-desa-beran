<?php

namespace App\Livewire\Pages\WebPanel\Login;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.auth-admin')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.web-panel.login.index');
    }
}
