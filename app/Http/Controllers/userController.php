<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\order;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class userController  
{
    public function index(){
        if  (Gate::denies('super_admin')) {
            abort(403);
        }
        $users = User::all();
        
        return view('dashboard.users.index',['users'=>$users]);
    }
    public function show(User $user){
        
        if(Auth::guard('web')->user()){
            $user=Auth::user();
        }
        if  (Gate::denies('user.show',$user)) {
            abort(403);
        }
   
  
        
        return view('dashboard.users.show',['user'=>$user]);
    }
    
    public function Edit(){
        return view('auth.edit');
    }
    public function update(UpdateUserProfileRequest $request){
        $user = request()->user();
        if  (Gate::denies('user.Profile.edit',$user)) {
            abort(403);
        }
        $validated = $request->validated();
        
        if(empty($validated['email'])){
            $validated['email'] =$user->email;
        }
        if(empty($validated['name'])){
            $validated['name'] =$user->name;
        }
        $user->fill($validated)->save();
        return to_route('profile.show');
    }

}
