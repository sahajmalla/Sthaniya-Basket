<?php

namespace App\Http\Controllers\Auth;

use App\Models\Cart;
use App\Models\User;
use App\Models\Trader;
use App\Models\Customer;
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

        //if exists
        $userEmailExists = User::where('email',$request->email)->count();
        
        if($userEmailExists){
            
            $request->session()->flash('UserExists', 'User already exists of your Email.');
            
            return back();
        }else{
            if((isset($request['userType'])) && $request['userType'] == 'trader'){
            
                $this->validate($request, [   
                    'email' => 'required|email|max:255|unique:users',
                    'username' => 'required|max:255',
                    'password' => 'required|confirmed',
                    'firstname' => 'required|max:255',
                    'lastname' => 'required|max:255',
                    'address' => 'required|max:255',
                    'dob' => 'required',
                    'gender' => 'required',
                    'business' => 'required',
                    'userType' => 'required',
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
                    'userType' => 'required',
                ]);
            }
             // For traders
       

            User::create([
                'username' => $request->username,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'dob' => $request->dob,
                'email' => $request->email,
                // 'password' => Hash::make($request->password), // Hash facade.
                'password' => md5($request->password),
                'address' => $request->address,
                'user_type'=>$request->userType,
                'gender' => $request->gender,
                'user_image' => 'userpp.png',
            ]);
        
        //logged in
            // auth()->attempt($request->only('email', 'password'));
            $user = User::where('email', $request->email)
            ->where('password',md5($request->password))
            ->first();

            Auth::login($user);

            if($request->userType == 'customer'){

                // Subscription will be 'on' if set but nothing not even 'off' or 'null' if not set:
                if(!(isset($request['subscription']))){
                    $request['subscription']='off';
                }
                $request->user()->customers()->create([
                    'subscription'=>$request->subscription,
                ]);
                        
            }

            if($request->userType=='trader'){
                $request->user()->traders()->create([
                    'business' => $request->business,
                    'verified_trader' => 'no',
                ]);
            }
            // When user registers, if they have items in the cart, add items to the
            // registered user's record in the cart table.

            if (session('products') && auth()->user()->user_type=='customer') {

                foreach (session('products') as $product) {
                
                    // Check if product already exists in user's cart of products before adding:
                    $productCollection = Cart::get()->where('product_id', $product->id)
                    ->where('customer_id', auth()->user()->customers->first()->id);
            
                    if (!$productCollection->count()) {

                        $product->carts()->create([
                            'customer_id' => $request->user()->customers->first()->id,
                            'total_price' => $product->price,
                            'product_quantity' => session($product->prod_name),
                        ]); 

                    //TODO: Add success message

                    }else {
                
                    //TODO: Add error message(item is already in cart)
    
                    }

                }
            
            }

            Event::dispatch(new Registered(auth()->user())); // Dispatching email verification event.       

            if($request->userType=='trader'){

                return redirect()->route('registerShop');

            }else{

                $request->session()->flash('registeredAndLoggedIn', 'Welcome '.auth()->user()->username.'. Please
                verify your account through the link in your email.');

                return redirect()->route('home');

            }
        }
       
        
    }
}
