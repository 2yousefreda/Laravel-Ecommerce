<?php 
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\oredrController;

route::group([
    "middleware"=> ["auth:admin"],
    'prefix'=> 'admin',
], function () {
    Route::get('/dashboard', function () {
    return view('dashboard.main');
})->name('dashboard');

Route::get('/indexproduct', [productController::class,'index'])->name('product.index');
Route::get('/createproduct', [productController::class,'create'])->name('product.create');
Route::post('/storeproduct', [productController::class,'store'])->name('product.store');
Route::post('/updateQuantity', [productController::class,'updateQuantity'])->name('product.updateQuantity');

Route::get('/indexcategory', [categoryController::class,'index'])->name('category.index');
Route::get('/createcategory', [categoryController::class,'create'])->name('category.create');
Route::post('/storecategory', [categoryController::class,'store'])->name('category.store');
Route::get('/category/{categoryId}/edit', [categoryController::class,'edit'])->name('category.edit');
Route::put('/category/{categoryId}/update', [categoryController::class,'update'])->name('category.update');
Route::delete('/categorydestroy/{categoryId}', [categoryController::class,'destroy'])->name('category.destroy');

Route::get('/indexorder', [oredrController::class,'index'])->name('order.index');
Route::get('/order/{orderId}', [oredrController::class,'show'])->name('order.show');
Route::delete('/order/{orderId}', [oredrController::class,'destroy'])->name('order.destroy');

});