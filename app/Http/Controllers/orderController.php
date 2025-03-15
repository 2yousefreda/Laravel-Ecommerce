<?php

namespace App\Http\Controllers;
use App\Models\cart;
use App\Models\order;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\CreateOrderRequest;






class orderController extends Controller
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
    
   
    public function create(CreateOrderRequest $request){
        
       $validated= $request->validated();
        
        $order=  cart::all();
        $isEmpty=$validated['isEmpty'];
        
        $suptotal=$validated['suptotal'];
        $shipping=$validated['shipping'];
        $totalPrice=$validated['totalPrice'];
        
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
    public function indexUserOrder(){
        $user = request()->user();
        
        if  (Gate::denies('user.show',$user)) {
            abort(403);
        }
        $orders = order::where('user_id',$user->id)->get();
        
        return view('dashboard.orders.index',['orders'=>$orders]);

    }
}
