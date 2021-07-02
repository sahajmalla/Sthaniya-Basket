<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowShopProductController extends Controller
{
    public function showProducts(Request $request, Shop $shop){
        $traders = Trader::get()->where('user_id', auth()->user()->id);
        dd($request);
        // $shopid = $request->
        $products =collect();
        foreach ($traders as $trader){
            $products = Product::where('trader_id', $trader->id)->get();
        }

        return view('products.show-products');
    }
}
