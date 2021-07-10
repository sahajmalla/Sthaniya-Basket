<?php

namespace App\Http\Controllers\Auth;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.login');
    }

    public function read(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        // if (!auth()->attempt($request->only('email', 'password'), $request->remember)){
        //     return back()->with('status', 'Invalid login details.');
        // }
        $user = User::where('email', $request->email)
                  ->where('password',md5($request->password))
                  ->first();

        if($user){
            Auth::login($user);
        }else{
            return back()->with('status', 'Invalid login details.');
        }
        
        
        // When user is logging in, if they have items in the cart, add items to the
        // logged in user's record in the cart table.

        if (session('products')) {

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
                    $request->session()->flash('addedCartItem', 'Successfully added item to the cart.');
                }else {
                
                    //TODO: Add error message(item is already in cart)
                    $request->session()->flash('notAddedCartItem', 'Item is already in the cart. You can increase the number of products from your cart');
                }

            }
            
        }
        $request->session()->flash('loggedIn', 'Welcome '.auth()->user()->username);
        return redirect()->route('home');
    }
}
