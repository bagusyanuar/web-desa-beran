<?php

namespace App\Livewire\Pages\Landing\Privacy;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.landing.privacy.index');
    }
}
