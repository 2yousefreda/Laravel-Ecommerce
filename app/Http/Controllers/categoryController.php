<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class categoryController extends controller
{
    public function index(){
       $result= category::all();
   
        return view("category.index",["categories"=> $result]);
    }
    public function showWelcome(){
        $result= category::all();
   
        return view("welcome",["categories"=> $result]);
    }

    public function create(){
        return view("category.create");
    }
    public function store(Request $request){
        $request->validate([
            "name"=> "required|max:20",
            "imagepath"=> "required|mimes:png,jpg,jpeg",
            "description"=> "max:255",
        ]);
        
        if($request->has('imagepath')){
            $file=request()->file('imagepath');
            $path=Storage::disk('public')->put('categories',$file);
        }
        

        $name=$request->name;
        $description=$request->description;
        $imagepath=$path;
        

        category::create([
            'name'=> $name,
            'description'=>$description,
            'imagepath'=>$imagepath,
            
        ]);
        return to_route('category.index');
    }
    public function show(){
        
        
            $categories= category::all();
            $products= product::all();
        
        
        return view("category",["categories"=> $categories,"products"=> $products]);
    }

    public function edit($categoryId){
        // dd($categoryId);
        $category=category::findOrFail($categoryId);
        return view("category.edit",['category'=> $category]);

    }

    public function update( $categoryId){
        // @dd($categoryId);
        request()->validate([
            'name'=> ['required','max:255'],
            'description'=> ['max:255'],
            'imagepath'=> ['required','mimes:jpeg,jpg,png,gif'],
        ]);
        if(request()->has('imagepath')){
            $file=request()->file('imagepath');
            $path=Storage::disk('public')->put('categories',$file);
        }
        $name=request()->name;
        $description=request()->description;
        $imagepath=$path;
        
        $category=category::findOrFail($categoryId);
        Storage::disk('public')->delete($category->imagepath);
        $category->update([
            'name'=> $name,
            'description'=>$description,
            'imagepath'=>$imagepath,
            
        ]);
        
        
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
