<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{
    public function __construct() {

        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.register-admin');
    }

    public function store(Request $request){
        $this->validate($request, [   
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:255',
            'password' => 'required|confirmed',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'address' => 'required|max:255',
            'dob' => 'required',
            'gender' => 'required',
        ]);
    
        User::create([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'dob' => $request->dob,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash facade.
            'address' => $request->address,
            'user_type'=>'admin',
            'gender' => $request->gender,
            'user_image' => 'userpp.png',
        ]);
        
        //logged in
        auth()->attempt($request->only('email', 'password')); 
        $request->session()->flash('registered', 'Successfully logged in. Check your email for verification.');
        return redirect()->route('home');
        
        
    }

}
