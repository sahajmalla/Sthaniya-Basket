<?php

namespace App\Http\Controllers\Auth;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function __construct() {

        $this->middleware(['guest']);
    }
    
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request){

        // For traders
        if((isset($request['userType'])) && $request['userType'] === 'trader'){
            
            $this->validate($request, [   
                'email' => 'required|email|max:255|unique:users',
                'username' => 'required|max:255',
                'password' => 'required|confirmed',
                'firstname' => 'required|max:255',
                'lastname' => 'required|max:255',
                'address' => 'required|max:255',
                'dob' => 'required',
                'gender' => 'required',
                'shopname' => 'required',
                'business' => 'required'
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
                'business' => $request->business,
                'user_image' => 'userpp.png',
                'user_type' => $request->userType,
            ]);

        }else {

            // For customers
            $this->validate($request, [   
                'email' => 'required|email|max:255|unique:users',
                'username' => 'required|max:255',
                'password' => 'required|confirmed',
                'firstname' => 'required|max:255',
                'lastname' => 'required|max:255',
                'address' => 'required|max:255',
                'dob' => 'required',
                'gender' => 'required',
                'userType' => 'required'
            ]);

            // Subscription will be 'on' if set but nothing not even 'off' or 'null' if not set:
            if(!(isset($request['subscription']))){
                $request['subscription']='off';
            }

            User::create([
                'username' => $request->username,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'dob' => $request->dob,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hash facade.
                'address' => $request->address,
                'gender' => $request->gender,
                'subscription'=> $request->subscription, // For customer
                'user_image' => 'userpp.png',
                'user_type' => $request->userType,
            ]);

        }

        auth()->attempt($request->only('email', 'password'));

        // When user registers, if they have items in the cart, add items to the
        // registered user's record in the cart table.

        if (session('products') && auth()->user()->user_type === 'customer') {

            foreach (session('products') as $product) {
                
                // Check if product already exists in user's cart of products before adding:
                $productCollection = Cart::get()->where('product_id', $product->id)
                ->where('user_id', auth()->user()->id);
            
                if (!$productCollection->count()) {

                    $product->carts()->create([
                        'user_id' => $request->user()->id,
                        'total_price' => $product->price,
                        'product_quantity' => 1,
                    ]); 

                    //TODO: Add success message

                }else {
                
                    //TODO: Add error message(item is already in cart)
    
                }

            }
            
        }

        Event::dispatch(new Registered(auth()->user())); // Dispatching email verification event.

        return redirect()->route('home');
    }
}
