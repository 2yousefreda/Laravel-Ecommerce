<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    public function index(){
       $result= category::all();
   
        return view("welcome",["categories"=> $result]);
    }
    public function show(){
        
        
            $categories= category::all();
            $products= product::all();
        
        
        return view("category",["categories"=> $categories,"products"=> $products]);
    }

    
    public function singleCategory($catId){

        $products=product::where("category_id",$catId)->get();
            
        
        return view("singleCategory",["products"=> $products]);
    }
 
  
        
    
  

}
