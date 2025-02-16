<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    public function index(){
       $result= DB::table("categories")->get();
    //    dd($result);
        return view("welcome",["categories"=> $result]);
    }
    public function show($categoryId){

        
            $result= DB::table("products")->where('category_id',$categoryId)->get();
        
        // dd($result);
        return view("shop",["products"=> $result]);
    }
    public function showAll(){
        
        $result= DB::table("products")->get();
            
        return view("shop",["products"=> $result]);
    }
  
        
    
  

}
