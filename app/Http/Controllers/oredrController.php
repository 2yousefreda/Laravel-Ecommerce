<?php

namespace App\Http\Controllers;
use App\Models\cart;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Attributes\RequiresSetting;

class oredrController extends Controller
{
    public function index(){
        return "order index";
    }
    public function show(){
        return "show order";
    }
    
    public function create(){
        $isempty=cart::first();
        $order=  cart::all();
        return view("checkout",['orders'=>$order,'isEmpty'=>$isempty]);
    }
    public function store(){
        
        
        request()->validate([
            'name'=> ['required'],
            'email'=> ['required',Rule::email()],
            'address'=> ['required'],
            'phone'=> ['required'],
        ]);

        $cartItems= cart::all();
        $validelEment=[];
      
       $totalPrice=0;
        foreach ($cartItems as $item) {
         
            $found = false;
          
           
            

                foreach ($validelEment as &$existingItem) {
                    if ($existingItem['product_id'] == $item['product_Id']) {
                        $existingItem['quantity'] += $item['quantity'];
                        $found = true;
                        break;
    
                    }
                    
                }
            
              if (!$found) {
                    $validelEment[] = [
                        'product_id' => $item['product_Id'],
                        'product_name' => $item['product_Name'],
                        'product_Price' => $item['product_Price'],
                        'quantity' => $item['quantity'],
                    ];
                }
                $totalPrice += $item['total_Price'];
           
        }
        $jsonProducts   = json_encode($validelEment);
        
        $totalPrice+=request()->shipping;
        order::create([
            'name'=> request()->name,
            'email'=> request()->email,
            'address'=> request()->address,
            'phone'=> request()->phone,
            'description'=> request()->description,
            'cart_items'=> $jsonProducts,
            'total_price'=> $totalPrice,
        ]);
        
       

        
        return to_route('cart.destroyAll');
    }
}
