<?php 
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;

route::group([
    "middleware"=> ["auth:admin"],
    // 'as'=>'dashboard.',
    'prefix'=> 'admin',
], function () {
    Route::get('/dashboard', function () {
    return view('dashboard.main');
})->name('dashboard');

});