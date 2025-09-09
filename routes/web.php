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
Route::group(['prefix' => 'surat-online'], function () {
    Route::get('/', App\Livewire\Pages\Landing\OnlineLetter\Index::class)->name('online-letter');
    Route::get('/surat-keterangan-domisili', App\Livewire\Pages\Landing\OnlineLetter\Domicile\Index::class)->name('online-letter.domicile');
    Route::get('/surat-keterangan-domisili/{code}', App\Livewire\Pages\Landing\OnlineLetter\Domicile\Index::class)->name('online-letter.domicile.code');
    Route::get('/surat-keterangan-kematian', App\Livewire\Pages\Landing\OnlineLetter\Death\Index::class)->name('online-letter.death');
    Route::get('/surat-keterangan-kematian/{code}', App\Livewire\Pages\Landing\OnlineLetter\Death\Index::class)->name('online-letter.death.code');
});


Route::group(['prefix' => 'web-panel'], function () {
    Route::get('/', App\Livewire\Pages\WebPanel\Login\Index::class)->name('web-panel.login');
    Route::get('/dashboard', App\Livewire\Pages\WebPanel\Dashboard\Index::class)->name('web-panel.dashboard');
});
