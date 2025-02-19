<?php

namespace App\Http\Controllers;
use App\Models\cart;
use App\Models\product;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Attributes\RequiresSetting;

class oredrController extends productController
{
    public function index(){
        return "order index";
    }
    public function show($id){
        return "show order";
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
        
        // @dd(request()->description);
        request()->validate([
            'name'=> ['required'],
            'email'=> ['required',Rule::email()],
            'address'=> ['required'],
            'phone'=> ['required'],
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
        order::create([
            'name'=> request()->name,
            'email'=> request()->email,
            'address'=> request()->address,
            'phone'=> request()->phone,
            'description'=> request()->description,
            'total_price'=> request()->totalPrice,
            'cart_items'=> $jsonProducts,
        ]);
        return to_route('cart.destroyAll');
    }
}
