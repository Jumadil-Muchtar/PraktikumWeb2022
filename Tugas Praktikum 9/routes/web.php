<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionSellerController;
use App\Models\PermissionSeller;

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

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'showCategoryUseEloquent');
    Route::post('/category/insert', 'insertCategoryUseEloquent');
    Route::post('/category/update', 'saveCategoryUseEloquent');
    Route::delete('/category/delete', 'deleteCategoryUseEloquent');
});

Route::controller(PermissionController::class)->group(function () {
    Route::get('/permission', 'showPermissionUseEloquent');
    Route::post('/permission/insert', 'insertPermissionUseEloquent');
    Route::post('/permission/update', 'savePermissionUseEloquent');
    Route::delete('/permission/delete', 'deletePermissionUseEloquent');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'showProductUseEloquent');
    Route::post('/product/insert', 'insertProductUseEloquent');
    Route::post('/product/update', 'saveProductUseEloquent');
    Route::delete('/product/delete', 'deleteProductUseEloquent');
});

Route::controller(SellerController::class)->group(function () {
    Route::get('/seller', 'showSellerUseEloquent');
    Route::post('/seller/insert', 'insertSellerUseEloquent');
    Route::post('/seller/update', 'saveSellerUseEloquent');
    Route::delete('/seller/delete', 'deleteSellerUseEloquent');
});

Route::controller(PermissionSellerController::class)->group(function () {
    Route::get('/permissionseller', 'showPermissionSellerUseEloquent');
    Route::post('/permissionseller/insert', 'insertPermissionSellerUseEloquent');
    Route::post('/permissionseller/update', 'savePermissionSellerUseEloquent');
    Route::delete('/permissionseller/delete', 'deletePermissionSellerUseEloquent');
});
