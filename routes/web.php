<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FormController;
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



Auth::routes();

Route::get('/', [IndexController::class, 'index'])->name('form');

Route::get('/form', [FormController::class, 'index'])->name('form');
Route::post('/store', [FormController::class, 'store'])->name('form.store');
Route::post('form', [FormController::class, 'create'])->name('form.create');



Route::middleware(['auth'])->group(function () {

        Route::post('/admin/delete-by-month', [PemohonController::class, 'deleteByMonth'])->name('admin.deleteByMonth');
        Route::get('/data-pemohon', 'App\Http\Controllers\AdminControllere@dataPemohon')->name('dataPemohon');
        Route::get('admin/data-Pemohon', 'App\Http\Controllers\AdminController@dataPemohon')->name('admin.dataPemohon');
        Route::get('/admin/{id}/data', 'App\Http\Controllers\AdminController@getAdminData');
        Route::get('/admin/ngeprint/{id}', 'App\Http\Controllers\AdminController@ngeprint')->name('admin.ngeprint');

        Route::resource('admin', AdminController::class);

        Route::get('/form/{role}', [IndexController::class, 'indexRole'])->name('form.role');


    });
