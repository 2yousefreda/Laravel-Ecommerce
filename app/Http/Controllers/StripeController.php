<?php

namespace App\Http\Controllers;
use App\Http\Controllers\productController;
use App\Models\cart;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StripeController extends Controller
{
    public function checkout(){
        request()->validate([
            'name'=> ['required'],
            'email'=> ['required',Rule::email()],
            'address'=> ['required'],
            'phone'=> ['required'],
            'shipping'=> ['required'],
            'totalPrice'=> ['gt:0'],
        ],[
            'totalPrice.gt'=> 'Your cart is Empty '
        ]);
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $products=request()->user()->carts;
   
        $LineItems=[];
        foreach($products as $product){
            $LineItems[]=[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                         'name' => $product->product_Name,
                    ],
                    'unit_amount' => $product->product_Price * 100,
                    ],
                    'quantity' => $product->quantity,
            ];
        }
        $shipping_cost = request()->shipping * 100; 
        $LineItems[] = [
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Shipping Fee', 
                ],
                'unit_amount' => $shipping_cost, 
            ],
            'quantity' => 1, 
        ];
    $checkout_session = $stripe->checkout->sessions->create([
    'line_items' => $LineItems,
        
    'mode' => 'payment',
    'success_url' => route('checkout.success',request()->all()),
    'cancel_url' => route('checkout.cancel'),

    ]);
    
    return redirect($checkout_session->url);
}
public function success(){
    dd(request()->all());
    $cartItems= cart::all();
    $filterdElement=[];
    
    foreach ($cartItems as $item) {
        $filterdElement[]=[
            'product_id'=> $item['product_Id'],
            'product_name'=> $item['product_Name'],
            'product_price'=> $item['product_Price'],
            'quantity'=> $item['quantity'],
        ];
        productController::decreaseQuantity($item['product_Id'],$item['quantity']);
    }
    $jsonProducts   = json_encode($filterdElement);
    $user= request()->user();
    
    order::create([
        'user_id'=> $user->id,
        'name'=> request()->name,
        'email'=> request()->email,
        'address'=> request()->address,
        'phone'=> request()->phone,
        'description'=> request()->description,
        'shipping'=> request()->shipping,
        'total_price'=> request()->totalPrice,
        'cart_items'=> $jsonProducts,
    ]);
    return to_route('cart.destroyAll');
}
public function cancel(){

}
}
