<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[HomeController::class,'redirect'])->name('dashboard');
});
Route::get('redirect',action: [HomeController::class,'redirect']);
Route::middleware(['auth:sanctum',AdminMiddleware::class])->group(function () {
    Route::get('/view_product',[AdminController::class,'view_product']);
    Route::get('/view_category',[AdminController::class,'view_category']);
    Route::post('/add_category',[AdminController::class,'add_category']);
    Route::delete('/delete_category/{id}',[AdminController::class,'delete_category']);
    Route::get('/add_product',action: [AdminController::class,'add_product_page']);
    Route::post('/add_new_product', [AdminController::class,'add_product']);
    Route::delete('/delete_product/{id}', [AdminController::class,'delete_product']);
    Route::get('/update_product/{id}', [AdminController::class,'update_product']);
    Route::put('/update_product_vt/{id}', [AdminController::class,'updateProduct']);
    Route::get('/orders', [AdminController::class,'getOrders']);
    Route::get('/order_detail/{id}', [AdminController::class,'getOrderDetail']);
    Route::get('/confirm_delivery/{id}', [AdminController::class,'confirmDelivery']);
    Route::get('/confirm_payment/{id}',  [AdminController::class,'confirmPayment']);
    Route::get('/print/{id}',  [AdminController::class,'printOrder']);
    Route::get('/search',   [AdminController::class,'searchProduct']);
    Route::get('/users',  [AdminController::class,'getUsers']);
    Route::get('/users/search',  action: [AdminController::class,'searchUser']);
    Route::get('/orders',  action: [AdminController::class,'filterOrders']);

});


Route::get('/product_detail/{id}', [HomeController::class,'getProduct']);

Route::post('/add_cart/{id}', [HomeController::class,'add_cart']);

Route::get('/cart', [HomeController::class,'view_cart']);

Route::delete('/delete_cart/{id}', [HomeController::class,'delete_cart']);

Route::get('/checkout', [HomeController::class,'view_checkout']);

Route::post('/command', [HomeController::class,'command']);

Route::get('stripe_payment/{total}', [HomeController::class,'stripe']);

Route::post('stripe/{total}',[HomeController::class, 'stripePost'])->name('stripe.post');

Route::get('/products',  [HomeController::class,'getProducts']);

Route::get('/products',  [HomeController::class,'searchProduct']);

Route::post('/add_comment/{id}',  [HomeController::class,'addComment']);

Route::get('/order_history', [HomeController::class,'getOrders']);

Route::put('/cancel_order/{id}', [HomeController::class,'cancelOrder']);


