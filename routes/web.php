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
    Route::get('/surat-keterangan-domisili/{code}', App\Livewire\Pages\Landing\OnlineLetter\Domicile\Detail::class)->name('online-letter.domicile.code');
    Route::get('/surat-keterangan-kematian', App\Livewire\Pages\Landing\OnlineLetter\Death\Index::class)->name('online-letter.death');
    Route::get('/surat-keterangan-kematian/{code}', App\Livewire\Pages\Landing\OnlineLetter\Death\Detail::class)->name('online-letter.death.code');
    Route::get('/surat-keterangan-kelahiran', App\Livewire\Pages\Landing\OnlineLetter\Birth\Index::class)->name('online-letter.birth');
    Route::get('/surat-keterangan-kelahiran/{code}', App\Livewire\Pages\Landing\OnlineLetter\Birth\Index::class)->name('online-letter.birth.code');
    Route::get('/surat-keterangan-catatan-kepolisian', App\Livewire\Pages\Landing\OnlineLetter\PoliceClearance\Index::class)->name('online-letter.police-clearance');
    Route::get('/surat-keterangan-catatan-kepolisian/{code}', App\Livewire\Pages\Landing\OnlineLetter\PoliceClearance\Index::class)->name('online-letter.police-clearance.code');
    Route::get('/surat-keterangan-belum-menikah', App\Livewire\Pages\Landing\OnlineLetter\SingleStatus\Index::class)->name('online-letter.single-status');
    Route::get('/surat-keterangan-belum-menikah/{code}', App\Livewire\Pages\Landing\OnlineLetter\SingleStatus\Index::class)->name('online-letter.single-status.code');
    Route::get('/surat-keterangan-tidak-mampu', App\Livewire\Pages\Landing\OnlineLetter\Incapacity\Index::class)->name('online-letter.incapacity');
    Route::get('/surat-keterangan-tidak-mampu/{code}', App\Livewire\Pages\Landing\OnlineLetter\Incapacity\Index::class)->name('online-letter.incapacity.code');
    Route::get('/surat-keterangan-penghasilan', App\Livewire\Pages\Landing\OnlineLetter\Income\Index::class)->name('online-letter.income');
    Route::get('/surat-keterangan-penghasilan/{code}', App\Livewire\Pages\Landing\OnlineLetter\Income\Index::class)->name('online-letter.income.code');
    Route::get('/surat-keterangan-duda', App\Livewire\Pages\Landing\OnlineLetter\Widower\Index::class)->name('online-letter.widower');
    Route::get('/surat-keterangan-duda/{code}', App\Livewire\Pages\Landing\OnlineLetter\Widower\Index::class)->name('online-letter.widower.code');
    Route::get('/surat-keterangan-janda', App\Livewire\Pages\Landing\OnlineLetter\Widow\Index::class)->name('online-letter.widow');
    Route::get('/surat-keterangan-janda/{code}', App\Livewire\Pages\Landing\OnlineLetter\Widow\Index::class)->name('online-letter.widow.code');
    Route::get('/surat-keterangan-penghasilan-orang-tua', App\Livewire\Pages\Landing\OnlineLetter\ParentIncome\Index::class)->name('online-letter.parent-income');
    Route::get('/surat-keterangan-penghasilan-orang-tua/{code}', App\Livewire\Pages\Landing\OnlineLetter\ParentIncome\Index::class)->name('online-letter.ParentIncome.code');
});


Route::group(['prefix' => 'web-panel'], function () {
    Route::get('/', App\Livewire\Pages\WebPanel\Login\Index::class)->name('web-panel.login');
    Route::get('/dashboard', App\Livewire\Pages\WebPanel\Dashboard\Index::class)->name('web-panel.dashboard');
    Route::get('/surat-keterangan-domisili', App\Livewire\Pages\WebPanel\OnlineLetter\Domicile\Index::class)->name('web-panel.online-letter.domicile');
    Route::get('/surat-keterangan-domisili/{id}', App\Livewire\Pages\WebPanel\OnlineLetter\Domicile\Detail::class)->name('web-panel.online-letter.domicile.detail');
    Route::get('/surat-keterangan-kematian', App\Livewire\Pages\WebPanel\OnlineLetter\Death\Index::class)->name('web-panel.online-letter.death');
    Route::get('/surat-keterangan-kematian/{id}', App\Livewire\Pages\WebPanel\OnlineLetter\Death\Detail::class)->name('web-panel.online-letter.death.detail');
    Route::get('/surat-keterangan-kelahiran', App\Livewire\Pages\WebPanel\OnlineLetter\Birth\Index::class)->name('web-panel.online-letter.birth');
    Route::get('/surat-keterangan-kelahiran/{id}', App\Livewire\Pages\WebPanel\OnlineLetter\Birth\Detail::class)->name('web-panel.online-letter.birth.detail');
    Route::get('/surat-keterangan-catatan-kepolisian', App\Livewire\Pages\WebPanel\OnlineLetter\PoliceClearance\Index::class)->name('web-panel.online-letter.police-clearance');
    Route::get('/surat-keterangan-catatan-kepolisian/{id}', App\Livewire\Pages\WebPanel\OnlineLetter\PoliceClearance\Detail::class)->name('web-panel.online-letter.police-clearance.detail');
    Route::get('/surat-keterangan-belum-menikah', App\Livewire\Pages\WebPanel\OnlineLetter\SingleStatus\Index::class)->name('web-panel.online-letter.single-status');
    Route::get('/surat-keterangan-belum-menikah/{id}', App\Livewire\Pages\WebPanel\OnlineLetter\SingleStatus\Detail::class)->name('web-panel.online-letter.single-status.detail');
    Route::get('/surat-keterangan-tidak-mampu', App\Livewire\Pages\WebPanel\OnlineLetter\Incapacity\Index::class)->name('web-panel.online-letter.incapacity');
    Route::get('/surat-keterangan-tidak-mampu/{id}', App\Livewire\Pages\WebPanel\OnlineLetter\Incapacity\Detail::class)->name('web-panel.online-letter.incapacity.detail');
    Route::get('/surat-keterangan-penghasilan', App\Livewire\Pages\WebPanel\OnlineLetter\Income\Index::class)->name('web-panel.online-letter.income');
    Route::get('/surat-keterangan-penghasilan/{id}', App\Livewire\Pages\WebPanel\OnlineLetter\Income\Detail::class)->name('web-panel.online-letter.income.detail');
    Route::get('/surat-keterangan-duda', App\Livewire\Pages\WebPanel\OnlineLetter\Widower\Index::class)->name('web-panel.online-letter.widower');
    Route::get('/surat-keterangan-duda/{id}', App\Livewire\Pages\WebPanel\OnlineLetter\Widower\Detail::class)->name('web-panel.online-letter.widower.detail');
    Route::get('/surat-keterangan-janda', App\Livewire\Pages\WebPanel\OnlineLetter\Widow\Index::class)->name('web-panel.online-letter.widow');
    Route::get('/surat-keterangan-janda/{id}', App\Livewire\Pages\WebPanel\OnlineLetter\Widow\Detail::class)->name('web-panel.online-letter.widow.detail');
    Route::get('/surat-keterangan-penghasilan-orang-tua', App\Livewire\Pages\WebPanel\OnlineLetter\ParentIncome\Index::class)->name('web-panel.online-letter.parent-income');
    Route::get('/surat-keterangan-penghasilan-orang-tua/{id}', App\Livewire\Pages\WebPanel\OnlineLetter\ParentIncome\Detail::class)->name('web-panel.online-letter.parent-income.detail');
});
