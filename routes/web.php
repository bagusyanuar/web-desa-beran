<?php

use App\Http\Middleware\RedirectAdminIfAuthenticated;
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
Route::get('/sejarah-desa-beran', App\Livewire\Pages\Landing\Profile\History\Index::class)->name('history');
Route::get('/wilayah-desa-beran', App\Livewire\Pages\Landing\Profile\Regional\Index::class)->name('regional');
Route::get('/masyarakat-desa-beran', App\Livewire\Pages\Landing\Profile\Community\Index::class)->name('community');
Route::get('/potensi-desa-beran', App\Livewire\Pages\Landing\Profile\Potention\Index::class)->name('potention');
Route::get('/visi-dan-misi-desa-beran', App\Livewire\Pages\Landing\Profile\VissionMission\Index::class)->name('vission-mission');
Route::get('/perangkat-desa-beran', App\Livewire\Pages\Landing\Profile\Staff\Index::class)->name('staff');
Route::group(['prefix' => 'produk-umkm-desa-beran'], function () {
    Route::get('/', App\Livewire\Pages\Landing\MicroBusiness\Index::class)->name('micro-business');
    Route::get('/{slug}', App\Livewire\Pages\Landing\MicroBusiness\Detail::class)->name('micro-business.detail');
});
Route::group(['prefix' => 'berita-desa-beran'], function () {
    Route::get('/', App\Livewire\Pages\Landing\News\Index::class)->name('news');
    Route::get('/{slug}', App\Livewire\Pages\Landing\News\Detail::class)->name('news.detail');
});


Route::group(['prefix' => 'surat-online'], function () {
    Route::get('/', App\Livewire\Pages\Landing\OnlineLetter\Index::class)->name('online-letter');
    Route::get('/surat-keterangan-domisili', App\Livewire\Pages\Landing\OnlineLetter\Domicile\Index::class)->name('online-letter.domicile');
    Route::get('/surat-keterangan-domisili/{code}', App\Livewire\Pages\Landing\OnlineLetter\Domicile\Detail::class)->name('online-letter.domicile.code');
    Route::get('/surat-keterangan-kematian', App\Livewire\Pages\Landing\OnlineLetter\Death\Index::class)->name('online-letter.death');
    Route::get('/surat-keterangan-kematian/{code}', App\Livewire\Pages\Landing\OnlineLetter\Death\Detail::class)->name('online-letter.death.code');
    Route::get('/surat-keterangan-kelahiran', App\Livewire\Pages\Landing\OnlineLetter\Birth\Index::class)->name('online-letter.birth');
    Route::get('/surat-keterangan-kelahiran/{code}', App\Livewire\Pages\Landing\OnlineLetter\Birth\Detail::class)->name('online-letter.birth.code');
    Route::get('/surat-keterangan-catatan-kepolisian', App\Livewire\Pages\Landing\OnlineLetter\PoliceClearance\Index::class)->name('online-letter.police-clearance');
    Route::get('/surat-keterangan-catatan-kepolisian/{code}', App\Livewire\Pages\Landing\OnlineLetter\PoliceClearance\Detail::class)->name('online-letter.police-clearance.code');
    Route::get('/surat-keterangan-belum-menikah', App\Livewire\Pages\Landing\OnlineLetter\SingleStatus\Index::class)->name('online-letter.single-status');
    Route::get('/surat-keterangan-belum-menikah/{code}', App\Livewire\Pages\Landing\OnlineLetter\SingleStatus\Detail::class)->name('online-letter.single-status.code');
    Route::get('/surat-keterangan-tidak-mampu', App\Livewire\Pages\Landing\OnlineLetter\Incapacity\Index::class)->name('online-letter.incapacity');
    Route::get('/surat-keterangan-tidak-mampu/{code}', App\Livewire\Pages\Landing\OnlineLetter\Incapacity\Detail::class)->name('online-letter.incapacity.code');
    Route::get('/surat-keterangan-penghasilan', App\Livewire\Pages\Landing\OnlineLetter\Income\Index::class)->name('online-letter.income');
    Route::get('/surat-keterangan-penghasilan/{code}', App\Livewire\Pages\Landing\OnlineLetter\Income\Detail::class)->name('online-letter.income.code');
    Route::get('/surat-keterangan-duda', App\Livewire\Pages\Landing\OnlineLetter\Widower\Index::class)->name('online-letter.widower');
    Route::get('/surat-keterangan-duda/{code}', App\Livewire\Pages\Landing\OnlineLetter\Widower\Detail::class)->name('online-letter.widower.code');
    Route::get('/surat-keterangan-janda', App\Livewire\Pages\Landing\OnlineLetter\Widow\Index::class)->name('online-letter.widow');
    Route::get('/surat-keterangan-janda/{code}', App\Livewire\Pages\Landing\OnlineLetter\Widow\Detail::class)->name('online-letter.widow.code');
    Route::get('/surat-keterangan-penghasilan-orang-tua', App\Livewire\Pages\Landing\OnlineLetter\ParentIncome\Index::class)->name('online-letter.parent-income');
    Route::get('/surat-keterangan-penghasilan-orang-tua/{code}', App\Livewire\Pages\Landing\OnlineLetter\ParentIncome\Detail::class)->name('online-letter.parent-income.code');
});

Route::get('/web-panel', App\Livewire\Pages\WebPanel\Login\Index::class)
    ->middleware(RedirectAdminIfAuthenticated::class)
    ->name('web-panel.login');
Route::group(['prefix' => 'web-panel', 'middleware' => 'auth'], function () {
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
    Route::get('/produk-umkm', App\Livewire\Pages\WebPanel\MicroBusiness\Index::class)->name('web-panel.micro-business');
    Route::get('/produk-umkm/tambah', App\Livewire\Pages\WebPanel\MicroBusiness\Create::class)->name('web-panel.micro-business.new');
    Route::get('/produk-umkm/{id}/detail', App\Livewire\Pages\WebPanel\MicroBusiness\Detail::class)->name('web-panel.micro-business.detail');

    Route::get('/sejarah-desa', App\Livewire\Pages\WebPanel\Profile\About\Index::class)->name('web-panel.history');
    Route::get('/wilayah-desa', App\Livewire\Pages\WebPanel\Profile\Regional\Index::class)->name('web-panel.regional');
    Route::get('/masyarakat-desa', App\Livewire\Pages\WebPanel\Profile\Community\Index::class)->name('web-panel.community');
    Route::get('/potensi-desa', App\Livewire\Pages\WebPanel\Profile\Potention\Index::class)->name('web-panel.potention');
    Route::get('/visi-dan misi', App\Livewire\Pages\WebPanel\Profile\VissionMission\Index::class)->name('web-panel.vission-mission');

    Route::group(['prefix' => 'perangkat-desa'], function () {
        Route::get('/', App\Livewire\Pages\WebPanel\Profile\Staff\Index::class)->name('web-panel.staff');
        Route::get('/tambah', App\Livewire\Pages\WebPanel\Profile\Staff\Create::class)->name('web-panel.staff.new');
        Route::get('/{id}/edit', App\Livewire\Pages\WebPanel\Profile\Staff\Edit::class)->name('web-panel.staff.update');
    });

    # publication route
    Route::group(['prefix' => 'berita'], function () {
        Route::get('/', App\Livewire\Pages\WebPanel\News\Index::class)->name('web-panel.news');
        Route::get('/tambah', App\Livewire\Pages\WebPanel\News\Create::class)->name('web-panel.news.new');
        Route::get('/{id}/edit', App\Livewire\Pages\WebPanel\News\Edit::class)->name('web-panel.news.update');
    });

    Route::group(['prefix' => 'perpustakaan-online'], function () {
        Route::get('/', App\Livewire\Pages\WebPanel\Library\Index::class)->name('web-panel.library');
        Route::get('/tambah', App\Livewire\Pages\WebPanel\Library\Create::class)->name('web-panel.library.new');
        Route::get('/{id}/edit', App\Livewire\Pages\WebPanel\Library\Edit::class)->name('web-panel.library.update');
    });
});
