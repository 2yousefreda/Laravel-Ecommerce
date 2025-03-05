<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\oredrController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;


Route::get('/', [categoryController::class,'showWelcome'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/cart', [cartController::class,'index'])->name('cart.index')->middleware('auth');
Route::get('/category', [categoryController::class,'show'])->name('category');


route::get('/checkout', [oredrController::class,'create'])->name('order.create');
route::post('/checkout', [oredrController::class,'store'])->name('order.store');





Route::get('/category/{categoryId}',[categoryController::class,'singleCategory'])->name('category.product');

Route::get('/product/{productId}',[productController::class,'show'])->name('product.show');

Route::get('/addtocart/{productId}', [cartController::class,'store'])->name('cart.store')->middleware(['auth']);//to route for 404 page
Route::post('/addtocart/{productId}', [cartController::class,'store'])->name('cart.store')->middleware(['auth']);




Route::get('/cart/destroyall', [cartController::class,'destroyAll'])->name('cart.destroyAll');
Route::delete('/cart/{productId}', [cartController::class,'destroy'])->name('cart.destroy');
require __DIR__ .'/dashboard.php';