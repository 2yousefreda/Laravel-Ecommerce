<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', [categoryController::class,'index'])->name('welcome');


Route::get('/addproduct', [productController::class,'create'])->name('product.create');
Route::post('/storeproduct', [productController::class,'store'])->name('product.store');



Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/category', [categoryController::class,'show'])->name('category');


Route::get('category/{catId}',[categoryController::class,'categoryProducts'])->name('category.product');
Route::get('Product/{prodId}',[productController::class,'show'])->name('product.show');
