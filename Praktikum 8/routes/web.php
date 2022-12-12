<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});

Route::get('/',[StudentController::class, 'index'])->name('mahasiswa');
Route::post('/',[StudentController::class, 'store'])->name('mahasiswa');
Route::get('/edit/{id}',[StudentController::class, 'edit'])->name('mahasiswa');
Route::post('/edit/{id}',[StudentController::class, 'update'])->name('mahasiswa');
Route::get('/delete/{id}',[StudentController::class, 'delete'])->name('mahasiswa');


