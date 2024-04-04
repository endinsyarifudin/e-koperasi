<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KoperasiController;
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
        Route::resource('kas', KasController::class);
        Route::resource('userprofil', UserProfilController::class);
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });
});
