<?php

namespace App\Livewire\Features\Landing\Home;

use Livewire\Component;

class Hero extends Component
{
    public $heroes = [];

    public $imageHero = null;
    public $landingTitle = '';
    public $landingSubTitle = '';

    public function mount()
    {
        $this->heroes = [
            url("/static/images/hero/slide-1.png"),
            // "https://flowbite.com/docs/images/carousel/carousel-1.svg",
            // "https://flowbite.com/docs/images/carousel/carousel-2.svg",
            // "https://flowbite.com/docs/images/carousel/carousel-3.svg"
        ];
    }

    public function render()
    {
        return view('livewire.features.landing.home.hero');
    }
}
