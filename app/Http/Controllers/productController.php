<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    public function index(){
        $result= product::all();
        return view("product.index",["products"=> $result]);
    }

    public function create(){
        $categories=Category::all();
        return view("product.createProduct",["categories"=>$categories]);
    }
    public function store(){
        
        request()->validate([
            'name'=> ['required'],
            'price'=> ['required','gt:0'],
            'quantity'=> ['required','gt:0'],
            'category_id'=> ['required','exists:categories,id'],
            'imagepath'=> ['required','mimes:jpeg,jpg,png,gif'],
        ]);
        if(request()->has('imagepath')){
            $file=request()->file('imagepath');
            $path=Storage::disk('public')->put('products',$file);
        }
        $name=request()->name;
        $description=request()->description;
        $price=request()->price;
        $quantity=request()->quantity;
        $category_id=request()->category_id;
        $imagepath=$path;
        

        product::create([
            'name'=> $name,
            'price'=> $price,
            'quantity'=> $quantity,
            'description'=>$description,
            'imagepath'=>$imagepath,
            'category_id'=>$category_id,
        ]);
        
        
        return to_route('product.create');
    }


    public function show($prodId){

        $product= product::findOrFail($prodId );
        $categoryName=category::where("id",$product->category_id)->value('name');
        
        $relatedProducts=product::where("category_id",$product->category_id)->get();
        
        return view("singleProduct",["product"=> $product,"related"=> $relatedProducts,"category"=> $categoryName]);
    }
    public function edit(product $product){
        
        $categories=category::all();
        return view("product.editProduct",["product"=> $product,'categories'=> $categories]);

    }

    public function update( $productId){
        
        request()->validate([
            'name'=> ['required'],
            'price'=> ['required','gt:0'],
            'quantity'=> ['required','gt:0'],
            'category_id'=> ['required','exists:categories,id'],
            'imagepath'=> ['required','mimes:jpeg,jpg,png,gif'],
        ]);
        if(request()->has('imagepath')){
            $file=request()->file('imagepath');
            $path=Storage::disk('public')->put('products',$file);
        }
        $name=request()->name;
        $description=request()->description;
        $price=request()->price;
        $quantity=request()->quantity;
        $category_id=request()->category_id;
        $imagepath=$path;
        
        $singleProduct=product::findOrFail($productId);
        Storage::disk('public')->delete($singleProduct->imagepath);
        $singleProduct->update([
            'name'=> $name,
            'price'=> $price,
            'quantity'=> $quantity,
            'description'=>$description,
            'imagepath'=>$imagepath,
            'category_id'=>$category_id,
        ]);
        
        
        return to_route('product.index');
    }
    public function destroy($product){
        $product=product::findOrFail($product);
        Storage::disk('public')->delete( $product->imagepath);
        $product->delete();
        
        return to_route('product.index');
    }
}
