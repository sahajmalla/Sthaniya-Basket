<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Cart;
use Illuminate\Http\Request;

class CheckItemsInCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        $cart = Cart::where('customer_id',auth()->user()->customers->first()->id);
        if($cart->count()){
            return $next($request);
        }
        return redirect('/')->with('cartEmpty','Please add something to your cart before going to checkout page.');
    }
}
