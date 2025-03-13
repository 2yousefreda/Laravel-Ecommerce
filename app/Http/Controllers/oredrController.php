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
