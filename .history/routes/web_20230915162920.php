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

Route::get('/', function () {
    return view('index');
});

Route::resource('admin', AdminController::class);
Route::post('admin/ngeprint', 'AdminController@ngeprint')->name('admin.ngeprint');

Route::get('/role', [IndexController::class, 'index'])->name('form');

Route::get('/form/{role}', [IndexController::class, 'indexRole'])->name('form.role');

Route::get('/form', [FormController::class, 'index'])->name('form');



