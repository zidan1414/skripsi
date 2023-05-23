<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HargaPaketController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PaketwisataController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PeramalanController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/travel', [TravelController::class, 'index'])->name('travel.index');
Route::get('/travel/view', [TravelController::class, 'index_view'])->name('travel.index.view');
Route::get('/travel/create', [TravelController::class, 'create'])->name('travel.create');
Route::post('/travel', [TravelController::class, 'store'])->name('travel.store');
Route::get('/travel/{id}/edit', [TravelController::class, 'edit'])->name('travel.edit');
Route::put('/travel/{id}', [TravelController::class, 'update'])->name('travel.update');
Route::delete('/travel/{id}', [TravelController::class, 'destroy'])->name('travel.destroy');

Route::get('/profils', [ProfilController::class, 'index'])->name('profil.index');
Route::get('/profils/view', [ProfilController::class, 'index_view'])->name('profil.index.view');
Route::get('/profils/create', [ProfilController::class, 'create'])->name('profil.create');
Route::post('/profils', [ProfilController::class, 'store'])->name('profil.store');
Route::get('/profils/{id}/edit', [ProfilController::class, 'edit'])->name('profil.edit');
Route::put('/profils/{id}', [ProfilController::class, 'update'])->name('profil.update');
Route::delete('/profils/{id}', [ProfilController::class, 'destroy'])->name('profil.destroy');

Route::get('/kategoris', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategoris/view', [KategoriController::class, 'index_view'])->name('kategori.index.view');
Route::get('/kategoris/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategoris', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategoris/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategoris/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategoris/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/galeris', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/galeris/view', [GaleriController::class, 'index_view'])->name('galeri.index.view');
Route::get('/galeris/create', [GaleriController::class, 'create'])->name('galeri.create');
Route::post('/galeris', [GaleriController::class, 'store'])->name('galeri.store');
Route::delete('/galeris/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

Route::get('/paketwisatas', [PaketWisataController::class, 'index'])->name('paketwisata.index');
Route::get('/paketwisatas/view', [PaketWisataController::class, 'index_view'])->name('paketwisata.index.view');
Route::get('/paketwisatas/create', [PaketWisataController::class, 'create'])->name('paketwisata.create');
Route::post('/paketwisatas', [PaketWisataController::class, 'store'])->name('paketwisata.store');
Route::delete('/paketwisatas/{id}', [PaketWisataController::class, 'destroy'])->name('paketwisata.destroy');

Route::get('/hargas', [HargaPaketController::class, 'index'])->name('hargapaket.index');
Route::get('/hargas/view', [HargaPaketController::class, 'index_view'])->name('hargapaket.index.view');
Route::get('/hargas/create', [HargaPaketController::class, 'create'])->name('hargapaket.create');
Route::post('/hargas', [HargaPaketController::class, 'store'])->name('hargapaket.store');
Route::get('/hargas/{id}/edit', [HargaPaketController::class, 'edit'])->name('hargapaket.edit');
Route::put('/hargas/{id}', [HargaPaketController::class, 'update'])->name('hargapaket.update');
Route::delete('/hargas/{id}', [HargaPaketController::class, 'destroy'])->name('hargapaket.destroy');

Route::post('/pemesanans', [PemesananController::class, 'create']);
Route::get('/pemesanans/{id}', [PemesananController::class, 'show']);
Route::put('/pemesanans/{id}', [PemesananController::class, 'update']);
Route::delete('/pemesanans/{id}', [PemesananController::class, 'delete']);


Route::get('/faqs', [FAQController::class, 'index'])->name('admin.faq.index');
Route::get('/faqs/create', [FAQController::class, 'create'])->name('admin.faq.create');
Route::post('/faqs', [FAQController::class, 'store'])->name('admin.faq.store');
Route::get('/faqs/{id}/edit', [FAQController::class, 'edit'])->name('admin.faq.edit');
Route::put('/faqs/{id}', [FAQController::class, 'update'])->name('admin.faq.update');
Route::delete('/faqs/{id}', [FAQController::class, 'destroy'])->name('admin.faq.destroy');
