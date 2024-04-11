<?php

use App\Http\Controllers\Dropdown;
use App\Http\Controllers\JlabarugiController;
use App\Http\Controllers\JneracaController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KatNeracaController;
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

Route::get('/dataKas', [KasController::class, 'dataKas']);

// Jenis Laba Rugi
Route::get('/jenislabarugi', [JlabarugiController::class, 'jenisLabaRugi']);
Route::post('/jenislabarugi/create', [JlabarugiController::class, 'store']);
Route::put('/jenislabarugi/{id}', [JlabarugiController::class, 'update']);
Route::delete('/jenislabarugi/{id}', [JlabarugiController::class, 'destroy']);
Route::get('/namakatlabarugi', [JlabarugiController::class, 'getNamaKatLabarugi']);

// Item Neraca
Route::get('/neracaitem', [NeracaItemController::class, 'neracaitem']);
Route::post('/neracaitem/create', [NeracaItemController::class, 'store']);
Route::put('/neracaitem/{id}', [NeracaItemController::class, 'update']);
Route::delete('/neracaitem/{id}', [NeracaItemController::class, 'destroy']);
Route::get('/namakategori', [KatNeracaController::class, 'getNamaKategori']);
Route::get('/namajenis', [JneracaController::class, 'getNamaJenis']);


// For Dropdown
Route::get('/dropdown', [Dropdown::class, 'index']);
Route::post('fetch-jenis', [Dropdown::class, 'fetchJenis']);
Route::post('fetch-item', [Dropdown::class, 'fetchItem']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });