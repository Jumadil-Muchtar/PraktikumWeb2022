<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LoginController;
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
Route::controller(MahasiswaController::class)->group(function () {
    Route::get('/admin', 'index_admin')->middleware('cekLogin');
    Route::get('/user', 'index_user')->middleware('cekLogin');
    Route::post('/admin/insert', 'insert')->middleware('cekLogin');
    Route::put('/admin/update/{nim}', 'update')->middleware('cekLogin');
    Route::delete('/admin/delete/{nim}', 'delete')->middleware('cekLogin');
});

Route::post('/admin/add', [AkunController::class, 'insert'])->middleware('cekLogin');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index');
    Route::post('/login/cek', 'cek');
    Route::get('/logout', 'logout');    
    Route::post('/login/add', 'insert');
});

// Route::group(['middleware' => ['auth']], function(){
//     Route::group(['middleware' => ['cekLogin:admin']], function () {
//         Route::resource('LoginController', 'index');
//     });
//     Route::group(['middleware' => ['cekLogin:mahasiswa']], function () {
//         Route::resource('LoginController', 'index');
//     });
// });
