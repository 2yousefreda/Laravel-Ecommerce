<?php

namespace App\Http\Controllers;
use App\Models\User;
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
        // dd($users);
        return view('dashboard.users.index',['users'=>$users]);
    }
    public function show(User $user){
        if  (Gate::denies('super_admin')) {
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

}
