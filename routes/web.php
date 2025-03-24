<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\userController;

use Illuminate\Support\Facades\Route;

Route::get('/', [categoryController::class, 'showWelcome'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/category', [categoryController::class, 'show'])->name('category');
Route::get('/category/{category}', [categoryController::class, 'singleCategory'])->name('category.product');
Route::get('/product/{product}', [productController::class, 'show'])->name('product.show');

Route::group(['middleware' => ['auth',]], function () {
    Route::get('/profile', [userController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [userController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [userController::class, 'Update'])->name('profile.update');
    Route::get('/cart', [cartController::class, 'index'])->name('cart.index');
    route::get('/createorder', [orderController::class, 'create'])->name('order.create');
    route::post('/createorder', [orderController::class, 'store'])->name('order.store');
    route::post('/checkout',[StripeController::class,'checkout'])->name('checkout');
    route::get('/success',[StripeController::class,'success'])->name('checkout.success');
    route::get('/cancel',[StripeController::class,'cancel'])->name('checkout.cancel');
    Route::post('/addtocart/{product}', [cartController::class, 'store'])->name('cart.store');
    Route::get('/cart/destroyall', [cartController::class, 'destroyAll'])->name('cart.destroyAll');
    Route::get('/order', [orderController::class, 'indexUserOrder'])->name('user.order.index');
    Route::delete('/cart/{product}', [cartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/order/{order}', [orderController::class, 'show'])->name('user.order.show');
    Route::delete('/order/{order}', [orderController::class, 'destroy'])->name('user.order.destroy');

});

require __DIR__ . '/dashboard.php';
