<?php

namespace App\Livewire\Pages\WebPanel\OnlineLetter\Domicile;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app-admin')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.web-panel.online-letter.domicile.index');
    }
}
