<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Shop;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsShopAvailable
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
        $traders = Trader::get()->where('user_id', auth()->user()->id);   
        foreach($traders as $trader){
            $traderUserId = $trader->id;
            $query = Shop::get()->where('trader_id', $traderUserId)->count();
            if($query){
                return $next($request);
            }
        }
        return redirect('registerShop')->with('error','You must register shop before you enter your products');
    }
}
