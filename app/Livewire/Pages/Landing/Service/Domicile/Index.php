<?php

namespace App\Livewire\Pages\Landing\Service\Domicile;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.landing.service.domicile.index');
    }
}
