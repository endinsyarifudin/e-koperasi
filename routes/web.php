<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\JlabarugiController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KoperasiController;
use App\Http\Controllers\JneracaController;
use App\Http\Controllers\NeracaItemController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\UserProfilController;
use App\Http\Middleware\EnsureDataKoperasiCompleted;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;


Route::get('logout-user', function () {
    Auth::logout();
    return redirect('/');
})->name('logout-user');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('koperasi', KoperasiController::class);
    Route::middleware([EnsureDataKoperasiCompleted::class,])->group(function () {
        Route::resource('koperasi.create', KoperasiController::class);
        Route::resource('koperasi.index', KoperasiController::class);
        Route::resource('rekening', RekeningController::class);
        Route::resource('jenis', JenisController::class);
        Route::resource('kas', KasController::class);
        Route::resource('datakas', KasController::class);
        Route::get('kas2', [KasController::class, 'index2'])->name('kas2');
        Route::resource('userprofile', UserProfilController::class);
        // Neraca Jenis
        Route::resource('jenislabarugi', JlabarugiController::class);
        Route::resource('jenisneraca', JneracaController::class);
        Route::resource('itemneraca', NeracaItemController::class);
        Route::post('getJenisByKategori', [NeracaItemController::class, 'getJenisByKategori'])->name('getJenisByKategori');

        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });
});
