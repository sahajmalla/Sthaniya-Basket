<?php

namespace App\Http\Controllers\Auth;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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


        if (!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Invalid login details.');
        }
        
        // When user is logging in, if they have items in the cart, add items to the
        // logged in user's record in the cart table.

        if (session('products')) {

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

        return redirect()->route('home');
    }
}
