<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\cart;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function index(){
       $isempty= Cart::first()?? null;
        $products = cart::all();

        return view("cart",["products"=>$products,'isEmpty'=>$isempty]);
    }
   
    public function store($productId){
        $quantity =request()->get("quantity");
        request()->validate([
            "quantity"=> ["required",'integer','gt:0'],
        ]);
        $product=product::findOrFail($productId);
        $totalPrice=$quantity * $product->price;
        cart::create([
            "product_Id"=> $product->id,
            "product_Name"=>$product->name,
            "product_Price"=>$product->price,
            "quantity"=>$quantity,
            "total_Price"=>$totalPrice,
            "image_Path"=>$product->imagepath,
        ]);
        return to_route("cart.index");
    }
    public function destroy($productId){
        $product=cart::findOrFail($productId);
        $product->delete();
        return to_route("cart.index");
    }
    public function destroyAll(){
        cart::truncate();
        return to_route("category");
    }
}
