<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class productController extends Controller
{
    public function index($category){
        $result= DB::table("products")->get();
        return view("product",["products"=> $result]);
    }
    public function show($carId){
        $result= DB::table("products")->get();
        return view("product",["products"=> $result]);
    }
}
