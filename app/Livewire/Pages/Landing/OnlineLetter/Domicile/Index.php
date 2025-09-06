<?php

namespace App\Livewire\Pages\Landing\OnlineLetter\Domicile;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.landing.online-letter.domicile.index');
    }
}
