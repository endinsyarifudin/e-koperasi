<?php

use App\Http\Controllers\Dropdown;
use App\Http\Controllers\JneracaController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NeracaItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Get Nama
Route::get('/namakategori', [KategoriController::class, 'getNamaKategori']);
Route::get('/namajenis', [JneracaController::class, 'getNamaJenis']);

// Item Neraca
Route::get('/neracaitem', [NeracaItemController::class, 'neracaitem']);
Route::post('/neracaitem/create', [NeracaItemController::class, 'store']);
Route::post('/neracaitem/edit', [NeracaItemController::class, 'update']);


// For Dropdown
Route::get('/dropdown', [Dropdown::class, 'index']);
Route::post('fetch-jenis', [Dropdown::class, 'fetchJenis']);
Route::post('fetch-item', [Dropdown::class, 'fetchItem']);


Route::get('/dataKas', [KasController::class, 'dataKas'])->name('api.dataKas');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });