<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PemohonController;
use App\Http\Controllers\API\CetakController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/data/pemohon', [PemohonController::class, 'index'])->name('api.data.pemohon');
Route::get('/cetak/{id}', [CetakController::class, 'cetakData'])->name('api.cetak');

