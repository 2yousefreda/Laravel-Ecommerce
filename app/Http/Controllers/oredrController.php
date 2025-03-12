<?php

namespace App\Http\Controllers;
use App\Models\cart;
use App\Models\product;
use App\Models\order;
use Illuminate\Support\Facades\Gate;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Validation\Rule;

use PHPUnit\Framework\Attributes\RequiresSetting;
use Symfony\Component\Finder\Glob;


class oredrController extends productController
{
  
   
    public function index(){
        $orders=Order::all();
        
        return view('dashboard.orders.index',['orders'=>$orders]);
    }
    public function show($orderId){
        $user=request()->user();    
        if  (Gate::denies('user.show',$user)) {
            abort(403);
        }
        $order=Order::find($orderId);
        $products = json_decode($order->cart_items);
        return view('dashboard.orders.show',['order'=>$order,'products'=>$products]);
    }
    
   
    public function create(){
        
        request()->validate([
            "totalPrice"=> ['gt:0']
        ],[
            'totalPrice.gt'=> 'Your cart is empty'
        ]);
        $isEmpty=request()->isEmpty;
        
        $order=  cart::all();
        $suptotal=request()->suptotal;
        $shipping=request()->shipping;
        $totalPrice=request()->totalPrice;
        
        return view("checkout",['orders'=>$order,'isEmpty'=>$isEmpty,'suptotal'=> $suptotal,'shipping'=>$shipping,'totalPrice'=>$totalPrice]);
    }
    
    public function store(){
        // dd(request()->all());
        // @dd(request()->description);
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
        $user= FacadesAuth::user();
        
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
    public function destroy($orderId){
        
        $user=request()->user();    
        if  (Gate::denies('user.show',$user)) {
            abort(403);
        }
        $order = Order::findOrFail($orderId);
        $order->delete();
        return redirect()->back(); 
    }
}
