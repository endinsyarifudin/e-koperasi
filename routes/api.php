<?php

use App\Http\Controllers\KasController;
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

Route::get('/dataKas', [KasController::class, 'dataKas'])->name('api.dataKas');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
