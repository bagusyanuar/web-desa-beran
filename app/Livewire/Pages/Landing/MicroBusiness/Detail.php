<?php

namespace App\Livewire\Pages\Landing\MicroBusiness;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Detail extends Component
{
    public function render()
    {
        return view('livewire.pages.landing.micro-business.detail');
    }
}
