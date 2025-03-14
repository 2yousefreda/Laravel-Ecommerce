<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;


use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

use Illuminate\Support\Facades\Storage;


class categoryController extends controller
{
    public function index(){
       $categories= category::all();
        
        return view("dashboard.categories.index",["categories"=> $categories]);
    }
    public function showWelcome(){
        $result= category::all();
   
        return view("home",["categories"=> $result]);
    }

    public function create(){
        return view("dashboard.categories.create");
    }
    public function store(StoreCategoryRequest $request){
        
       $validated= $request->validated();
        
        if($request->has('imagepath')){
            $ImagePath=StoreImage('imagepath','categories');
            $validated['imagepath']=$ImagePath;
        }
        

       
        

        category::create( $validated);
        return to_route('category.index');
    }
    public function show(){
        
        
            $categories= category::all();
            $products= product::all();
        
     
        
        return view("category",["categories"=> $categories,"products"=> $products]);
    }

    public function showforAdmin($categoryId){
        $category= category::findOrFail($categoryId);
        $productsCounter= count(product::where("category_id", $categoryId)->get());
        return  view("dashboard.categories.show",["category"=> $category,'products'=> $productsCounter]);

    }
    public function edit($categoryId){
       
        $category=category::findOrFail($categoryId);
        
        return view("dashboard.categories.edit",['category'=> $category]);

    }

    public function update(UpdateCategoryRequest $request, $categoryId){
       
        $validated= $request->validated();
       
        if(request()->has('imagepath')){
            
            $ImagePath=StoreImage('imagepath','categories');
            $validated['imagepath']=$ImagePath;
        
        }
     
        
        $category=category::findOrFail($categoryId);
        if(request()->has('imagepath')){
            
            Storage::disk('public')->delete($category->imagepath);
            $category->update($validated);
        }else{
            $category->update($validated);
        }
        
        
        return to_route('category.index');
    }
    private static  function destroyWhere($categoryId){
        $products=product::where('category_id', $categoryId)->get();
        foreach($products as $product){

            Storage::disk('public')->delete( $product->imagepath);
            $product->delete();
        }
        
        
    }
    public function destroy($categoryId){
        // dd($categoryId);
        $category=category::findOrFail($categoryId);
        categoryController::destroyWhere($categoryId);
        Storage::disk('public')->delete( $category->imagepath);
        $category->delete();
        return to_route('category.index');
    }

    public function singleCategory($categoryId){

        $products=product::where("category_id",$categoryId)->get();
            
        
        return view("category",["products"=> $products,"categories"=> null]);
    }
 
  
        
    
  

}
