<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class userController extends Controller
{
    public function index(){
        if  (Gate::denies('super_admin')) {
            abort(403);
        }
        $users = User::all();
        
        return view('dashboard.users.index',['users'=>$users]);
    }
    public function show(){
        $user = request()->user();
        if  (Gate::denies('user.show',$user)) {
            abort(403);
        }
        $user=[
            'id'=> $user->id,
            'name'=> $user->name,
            'email'=> $user->email,
            'created_at'=> $user->created_at,
        ];
  
        
        return view('dashboard.users.show',['user'=>$user]);
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
