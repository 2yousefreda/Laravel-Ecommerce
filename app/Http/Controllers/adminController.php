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
        if  (Gate::denies('user.show', $user)) {
            abort(403);
        }
        $user=[
            'id'=> $user->id,
            'name'=> $user->name,
            'username'=> $user->username,
            'phone'=> $user->phone_number,
            'is_superAdmin'=> $user->super_admin,
            'email'=> $user->email,
            'created_at'=> $user->created_at,
            'updated_at'=> $user->updated_at,
        ];
  
        
        return view('dashboard.admins.show',['user'=>$user]);
    }
    public function create(){
        if  (Gate::denies('super_admin')) {
            abort(403);
        }
       return view('auth.admin.register');
    }

    protected function passwordRules(): array
    {
        return ['required', 'string', Password::default(), 'confirmed'];
    }

    public function store(Request $request){
        if  (Gate::denies('super_admin')) {
            abort(403);
        }
        $input= ($request->all());
        $is_super_admin = false;
        
        if($request->has('super_admin')){
            $is_super_admin=true;
        }
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required','string',Rule::unique(Admin::class),'max:255'],
            'phone_number' => ['required',Rule::unique(Admin::class), 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
                Rule::unique(Admin::class),
            ],
            
            'password' => $this->passwordRules(),
        ])->validate();

        Admin::create([
            'name' => $input['name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'super_admin' => $is_super_admin,
            
            'password' => Hash::make($input['password']),
        ]);
        return redirect()->back()->with('success','Done');
    }
    public function destroy(Admin $user){
        
        if  (Gate::denies('super_admin')) {
            abort(403);
        }
        $user->delete();
        return redirect()->back()->with('success','User Deleted successfuly');
    }
}
