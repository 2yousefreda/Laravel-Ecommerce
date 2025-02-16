<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', [categoryController::class,'index'])->name('welcome');

Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/category', [categoryController::class,'show'])->name('category');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('product/{catId}',[categoryController::class,'categoryProducts'])->name('category.product');
