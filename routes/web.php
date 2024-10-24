<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[HomeController::class,'redirect'])->name('dashboard');
});

Route::get('redirect',[HomeController::class,'redirect']);

Route::get('/view_category',[AdminController::class,'view_category']);

Route::post('/add_category',[AdminController::class,'add_category']);

Route::delete('/delete_category/{id}',[AdminController::class,'delete_category']);


Route::get('/view_product',[AdminController::class,'view_product']);

Route::get('/add_product',[AdminController::class,'add_product_page']);

Route::post('/add_new_product', [AdminController::class,'add_product']);

Route::delete('/delete_product/{id}', [AdminController::class,'delete_product']);


Route::get('/update_product/{id}', [AdminController::class,'update_product']);

Route::put('/update_product_vt/{id}', [AdminController::class,'updateProduct']);

Route::get('/product_detail/{id}', [HomeController::class,'getProduct']);

Route::post('/add_cart/{id}', [HomeController::class,'add_cart']);

Route::get('/cart', [HomeController::class,'view_cart']);

Route::delete('/delete_cart/{id}', [HomeController::class,'delete_cart']);

Route::get('/checkout', [HomeController::class,'view_checkout']);


