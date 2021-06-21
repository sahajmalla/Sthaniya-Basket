<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterTraderController extends Controller
{
    public function __construct() {

        $this->middleware(['guest']);
    }
    public function index() {
        return view('auth.registerTrader');
    }
    public function store(Request $request){
        $this->validate($request, [
            'shopname' => 'required|max:255',
            'business'=> 'required',
            'email' => 'required|email|max:255',
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
            'gender' => $request->gender,
            'shop' => $request->shopname,
            'trader_type' => $request->business,
            'user_image' => 'images/userpp.png',
            'user_type' => 'trader',

        ]);
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('home');
    }
}
