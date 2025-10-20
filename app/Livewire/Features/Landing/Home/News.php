<?php

namespace App\Livewire\Features\Landing\Home;

use App\Services\Landing\NewsService;
use Livewire\Component;

class News extends Component
{
    public $data;

    public function mount()
    {
        $this->data = [];
        $service = new NewsService();
        $response = $service->findSome();
        if ($response->getStatus() === 200) {
            $this->data = $response->getData();
        }
    }

    public function toDetail($slug)
    {
        return redirect()->route('micro-business.detail', ['slug' => $slug]);
    }

    public function render()
    {
        return view('livewire.features.landing.home.news');
    }
}
