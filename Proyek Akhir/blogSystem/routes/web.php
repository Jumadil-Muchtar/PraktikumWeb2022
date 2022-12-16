<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CrudController;

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

Route::get('/', [DashboardController::class, 'index']);
Route::get('login', function () {
    return view('layouts.cms.login');
});

Route::get('register', function () {
    return view('layouts.cms.register');
});

Route::post('login', [UserController::class, 'addUser']);
Route::post('log', [UserController::class, 'loginUser']);
Route::get('blogsystem', function () {
    return view('layouts.fe.blogsystem');
});

Route::get('dashboard', function () {
    return view('layouts.cms.dashboard');
});

Route::get('create', [CrudController::class, 'index']);
Route::get('create', [CrudController::class, 'create']);

Route::get('article', function () {
    return view('layouts.cms.article');
});

Route::get('homepage', function () {
    return view('layouts.fe.homepage');
});

Route::get('article', function () {
    return view('layouts.cms.article');
});

Route::get('category', function () {
    return view('layouts.cms.category');
})->name('category');

Route::get('sub-category', function () {
    return view('layouts.cms.sub-category');
})->name('sub-category');

Route::get('tag', function () {
    return view('layouts.cms.tag'); });
Route::get('profile', function () {
    return view('layouts.cms.profile');
});
Route::get('addtag', function () {
    return view('layouts.cms.addtag');
});
