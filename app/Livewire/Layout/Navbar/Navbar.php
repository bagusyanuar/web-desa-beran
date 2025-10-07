<?php

namespace App\Livewire\Layout\Navbar;

use App\Commons\Libs\Http\AlpineResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public function logout()
    {
        Auth::logout();
        return AlpineResponse::toJSON(200, 'successfully logout');
    }

    public function render()
    {
        return view('livewire.layout.navbar.navbar');
    }
}
