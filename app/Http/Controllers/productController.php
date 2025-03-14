<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
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
    public function store(StoreProductRequest $request){
         
        $validated= $request->validated();
        if(request()->has('imagepath')){
           $ImagePath= StoreImage('imagepath','products');
           $validated['imagepath']=$ImagePath;
        }
        product::create(  $validated);
        return to_route('product.index');
    }

    public function update(UpdateProductRequest $request, $productId){
        $validated= $request->validated();
        if(request()->has('imagepath')){
           $ImagePath= StoreImage('imagepath','products');
           $validated['imagepath']=$ImagePath;
           
        }
        $singleProduct=product::findOrFail($productId);
        if(request()->has('imagepath')){

            Storage::disk('public')->delete($singleProduct->imagepath);
            $singleProduct->update($validated);
        }else{
            $singleProduct->update($validated);
        }
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


    public function destroy($productId){
        $product=product::findOrFail($productId);
        if(count(Cart::where("product_id",$productId)->get())){
            Cart::where("product_id",$productId)->delete();
        }
        Storage::disk('public')->delete( $product->imagepath);
        $product->delete();
        
        return to_route('product.index');
    }
   
    public static function decreaseQuantity($productId,$quantity){

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
