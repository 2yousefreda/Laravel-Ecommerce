<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            "name"=> ["required","max:20", Rule::unique(category::class)],
            "imagepath"=> "required|mimes:png,jpg,jpeg,webp",
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

    public function showforAdmin($categoryId){
        $category= category::findOrFail($categoryId);
        $productsCounter= count(product::where("category_id", $categoryId)->get());
        return  view("dashboard.categories.show",["category"=> $category,'products'=> $productsCounter]);

    }
    public function edit($categoryId){
       
        $category=category::findOrFail($categoryId);
        
        return view("dashboard.categories.edit",['category'=> $category]);

    }

    public function update( $categoryId){
       
        request()->validate([
            'name'=> ['required','max:255'],
            'description'=> ['max:255'],
            'imagepath'=> ['mimes:jpeg,jpg,png,gif'],
        ]);
        $isImagePath=0;
        $imagepath="";
        if(request()->has('imagepath')){
            $file=request()->file('imagepath');
            $path=Storage::disk('public')->put('categories',$file);
            $isImagePath=1;
            $imagepath=$path;
        }
        $name=request()->name;
        $description=request()->description;
        
        $category=category::findOrFail($categoryId);
        if($isImagePath){
            
            Storage::disk('public')->delete($category->imagepath);
            $category->update([
                'name'=> $name,
                'description'=>$description,
                
                'imagepath'=>$imagepath,
                
            ]);
        }else{
            $category->update([
                'name'=> $name,
                'description'=>$description,
                
                
                
            ]);
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
