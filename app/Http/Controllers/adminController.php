<?php

namespace App\Http\Controllers;
use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminProfileRequest;
class adminController extends Controller
{

    public function index(){
        if  (Gate::denies('super_admin')) {
            abort(403);
        }
        $users = admin::all();
        return view('dashboard.admins.index',['users'=>$users]);
    }
    public function show(admin $user){
        if  (Gate::denies('admin.show', $user)) {
            abort(403);
        }
        // $user=[
        //     'id'=> $user->id,
        //     'name'=> $user->name,
        //     'username'=> $user->username,
        //     'phone'=> $user->phone_number,
        //     'is_superAdmin'=> $user->super_admin,
        //     'email'=> $user->email,
        //     'created_at'=> $user->created_at,
        //     'updated_at'=> $user->updated_at,
        // ];
  
        
        return view('dashboard.admins.show',['user'=>$user]);
    }
    public function create(){
        if  (Gate::denies('super_admin')) {
            abort(403);
        }
       return view('auth.admin.register');
    }
    public function store(StoreAdminRequest $request){
      
        if  (Gate::denies('super_admin')) {
            abort(403);
        }
        $validated = $request->validated();
        if (request()->has('super_admin')) { 
            $validated['super_admin'] = true;
        }else{
            $validated['super_admin'] = false;
            
        }
        $validated['password'] = Hash::make( $validated['password']);

        Admin::create( $validated);
        return redirect()->back()->with('success','Done');
    }

    public function edit(){ 
        return view('auth.admin.edit');
    }
    public function update(UpdateAdminProfileRequest $request){ 

        if  (Gate::denies('admin.Profile.edit')) {
            abort(403);
        }
        $user=request()->user();
        
        $valedated = $request->validated();
        if (empty($valedated['name'])) {
           $valedated['name']= $user->name; ; 
        }
        if (empty($valedated['username'])) {
           $valedated['username']= $user->username; ; 
        }
        if (empty($valedated['phone_number'])) {
           $valedated['phone_number']= $user->phone_number; ; 
        }
        if (empty($valedated['email'])) {
           $valedated['email']= $user->email; ; 
        }
        $user->fill($valedated)->save();
        return to_route('admin.show', $user->id);
    }

    public function destroy(Admin $user){
        
        if  (Gate::denies('super_admin')) {
            abort(403);
        }
        $user->delete();
        return redirect()->back()->with('success','User Deleted successfuly');
    }
}
