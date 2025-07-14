<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', App\Livewire\Pages\Landing\Home\Index::class)->name('home');

Route::group(['prefix' => 'web-panel'], function () {
    Route::get('/', App\Livewire\Pages\WebPanel\Login\Index::class)->name('web-panel.login');
    Route::get('/dashboard', App\Livewire\Pages\WebPanel\Dashboard\Index::class)->name('web-panel.dashboard');
});
