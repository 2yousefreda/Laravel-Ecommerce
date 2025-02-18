<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\oredrController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', [categoryController::class,'index'])->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Route::get('/cart', [cartController::class,'index'])->name('cart.index');
Route::get('/cart/destroyall', [cartController::class,'destroyAll'])->name('cart.destroyAll');



Route::get('/category', [categoryController::class,'show'])->name('category');


route::get('/checkout', [oredrController::class,'create'])->name('order.create');
route::post('/checkout', [oredrController::class,'store'])->name('order.store');



Route::get('/index', [productController::class,'index'])->name('product.index');
Route::get('/createproduct', [productController::class,'create'])->name('product.create');
Route::post('/storeproduct', [productController::class,'store'])->name('product.store');

Route::get('/category/{catId}',[categoryController::class,'singleCategory'])->name('category.product');

Route::get('/product/{prodId}',[productController::class,'show'])->name('product.show');

Route::get('/addtocart/{productId}', [cartController::class,'store'])->name('cart.store');//to route for 404 page
Route::post('/addtocart/{productId}', [cartController::class,'store'])->name('cart.store');

Route::put('/product/{product}', [productController::class,'update'])->name('product.update');
Route::get('/product/{product}/edit', [productController::class,'edit'])->name('product.edit');
Route::delete('/product/{product}', [productController::class,'destroy'])->name('product.destroy');


Route::delete('/cart/{productId}', [cartController::class,'destroy'])->name('cart.destroy');