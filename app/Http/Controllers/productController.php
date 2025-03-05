<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\RequiresSetting;

class productController extends Controller
{
    public function index(){
        $result= product::all();
        return view("dashboard.products.index",["products"=> $result]);
    }

    public function create(){
        $categories=Category::all();
        return view("dashboard.products.create",["categories"=>$categories]);
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
        
        
        return to_route('product.index');
    }


    public function show($productId){

        $product= product::findOrFail($productId );
        $categoryName=category::where("id",$product->category_id)->value('name');
        
        $relatedProducts=product::where("category_id",$product->category_id)->get();
        
        return view("singleProduct",["product"=> $product,"related"=> $relatedProducts,"category"=> $categoryName]);
    }
    public function showForAdmin($productId){

        $product= product::findOrFail($productId );
        $categoryName=category::where("id",$product->category_id)->value('name');
        return view("dashboard.products.show",["product"=> $product,"categoryName"=> $categoryName]);
    }
    public function edit(product $product){
        
        $categories=category::all();
        return view("dashboard.products.edit",["product"=> $product,'categories'=> $categories]);

    }

    public function update( $productId){
        
        request()->validate([
            'name'=> ['required'],
            'price'=> ['required','gt:0'],
            'quantity'=> ['required','gt:0'],
            'category_id'=> ['required','exists:categories,id'],
            'imagepath'=> ['mimes:jpeg,jpg,png,gif'],
        ]);
        $isImagePath=0;
        $imagepath="";
        if(request()->has('imagepath')){
            
            $file=request()->file('imagepath');
            $path=Storage::disk('public')->put('products',$file);
            $isImagePath=1;
            $imagepath=$path;
        }
        $name=request()->name;
        $description=request()->description;
        $price=request()->price;
        $quantity=request()->quantity;
        $category_id=request()->category_id;
        
        $singleProduct=product::findOrFail($productId);
        if($isImagePath== 1){

            Storage::disk('public')->delete($singleProduct->imagepath);
            $singleProduct->update([
                'name'=> $name,
                'price'=> $price,
                'quantity'=> $quantity,
                'description'=>$description,
                'imagepath'=>$imagepath,
                'category_id'=>$category_id,
            ]);
        }else{
            $singleProduct->update([
                'name'=> $name,
                'price'=> $price,
                'quantity'=> $quantity,
                'description'=>$description,
                'category_id'=>$category_id,
            ]);
        }
        
        
        return to_route('product.index');
    }
    public function destroy($productId){
        $product=product::findOrFail($productId);
        if(count(Cart::where("product_id",$productId)->get())){
            Cart::where("product_id",$productId)->delete();
        }
        Storage::disk('public')->delete( $product->imagepath);
        $product->delete();
        
        return to_route('product.index');
    }
   
    protected static function decreaseQuantity($productId,$quantity){

        $product=Product::find($productId);
        $newQuantity=$product->quantity-$quantity;
        $product->update([
            'quantity'=>$newQuantity
        ]);    
    }
    public  function updateQuantity(){
        $product=Product::findOrFail(request()->productId);
        $newQuantity=request()->quantity;
        $product->update([
            'quantity'=>$newQuantity
        ]);   
        return redirect()->back(); 
    }
}
