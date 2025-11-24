<?php

namespace App\Livewire\Features\Landing\Home;

use Livewire\Component;

class GreetingWord extends Component
{
    public $greetingWord = '';


    public function render()
    {
        return view('livewire.features.landing.home.greeting-word');
    }
}
