<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Numeric;

class cartController extends Controller
{
    public function index(){
       $isEmpty= empty(Cart::first());
        $products = cart::all();
        $shipping=0;
        if(!$isEmpty){
            $shipping=40; 
        }
        $subtotal=0;  
        foreach($products as $product){
            $subtotal+=$product->total_Price;
        }
        $totalPrice=$shipping + $subtotal;
        return view("cart",["products"=>$products,'isEmpty'=>$isEmpty,'subtotal'=>$subtotal,'totalPrice'=>$totalPrice,'shipping'=>$shipping]);
    }
   
    protected static function validateQuantity( $productQuanity, $quantityInCart){
        // $prod=$productQuanity;
        $Data=['productQuantity'=>$productQuanity,'quantityInCart'=>$quantityInCart];
        // $Data['productQuantity']=$prod;

        $cata=['quantityInCart'=>'min:1|lte:productQuantity'];
       
        $val=Validator::make($Data, $cata,['quantityInCart.lte'=> 'The quantity in stock has been exceeded '. $productQuanity]);
        
            
            return $val;
         
    }
    public function store($productId){
        $quantity =request()->get("quantity");
        request()->validate([
            "quantity"=> ["required",'integer','gt:0'],
            "product_Id"=> ['exists:products,id'],
        ]);
        
        $product=product::findOrFail($productId);

        $cartProduct=cart::where('product_id',$productId)->first();
        $newQuantity=$quantity;
        if(!empty( $cartProduct)){

            $newQuantity=$quantity+$cartProduct->quantity;
        }

        
        $val= cartController::validateQuantity( $product->quantity,$newQuantity);
        if($val->fails()){
            session()->flash('error', $val->errors()->first());
            return redirect()->back()->withErrors($val)->withInput();
        }  


        $totalPrice=$newQuantity * $product->price;
        if (empty($cartProduct)){

            cart::create([
                "product_Id"=> $product->id,
                "product_Name"=>$product->name,
                "product_Price"=>$product->price,
                "quantity"=>$newQuantity,
                "total_Price"=>$totalPrice,
                "image_Path"=>$product->imagepath,
            ]);
        }else{
            $cartProduct->update([
                "quantity"=>$newQuantity,
                "total_Price"=>$totalPrice,
            ]);
        }

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
