<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\cart;
use Illuminate\Support\Facades\Validator;


class cartController  
{
    public function index()
    {
        $products = request()->user()->carts;

        $isEmpty = $products->isEmpty();
        $shipping = 0;
        if (!$isEmpty) {
            $shipping = 40;
        }
        $subtotal = 0;
        foreach ($products as $product) {
            $subtotal += $product->total_Price;
        }
        $totalPrice = $shipping + $subtotal;
        return view('cart', ['products' => $products, 'isEmpty' => $isEmpty, 'subtotal' => $subtotal, 'totalPrice' => $totalPrice, 'shipping' => $shipping]);
    }

    protected static function validateQuantity($productQuanity, $quantityInCart)
    {
        // $prod=$productQuanity;
        $Data = ['productQuantity' => $productQuanity, 'quantityInCart' => $quantityInCart];
        // $Data['productQuantity']=$prod;

        $rules = ['quantityInCart' => 'min:1|lte:productQuantity'];
        $ErrorMessage = ['quantityInCart.lte' => 'you must not buy greater than ' . $productQuanity];
        if ($productQuanity == 0) {
            $ErrorMessage['quantityInCart.lte'] = 'out of stock';
        }

        $val = Validator::make($Data, $rules, $ErrorMessage);

        return $val;
    }
    public function store(product $product)
    {
        $quantity = request()->get('quantity');
        request()->validate([
            'quantity' => ['required', 'integer', 'gt:0'],
        ]);

        $cartProduct = cart::where('product_Id', $product->id)
            ->where('user_id', request()->user()->id)
            ->firstOrNew([
                'user_id' => request()->user()->id,
                'product_Id' => $product->id,
                'product_Name' => $product->name,
                'product_Price' => $product->price,
                'image_Path' => $product->imagepath,
            ]);
        $newQuantity = $quantity;
        if (!empty($cartProduct)) {
            $newQuantity = $quantity + $cartProduct->quantity;
        }

        $val = cartController::validateQuantity($product->quantity, $newQuantity);
        if ($val->fails()) {
            session()->flash('error', $val->errors()->first());
            return redirect()->back()->withErrors($val)->withInput();
        }

        $totalPrice = $newQuantity * $product->price;

        $cartProduct->fill([
            'quantity' => $newQuantity,
            'total_Price' => $totalPrice,
        ]);
        $cartProduct->save();

        return redirect()->back(); 
        
    }
    public function destroy(product $product)
    {
        
        $product->delete();
        return to_route('cart.index');
    }
    public function destroyAll()
    {
        cart::truncate();
        return to_route('category');
    }
}
