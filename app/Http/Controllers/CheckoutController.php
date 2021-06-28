<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class CheckoutController extends Controller
{
    public function index(Request $request) {

        // dd($request->quantity);

        $total_price = 0.0;

        // Retrive products related to user from cart.
        $products = DB::table('products')
        ->join('carts', function ($join) {
            $join->on('carts.product_id', '=', 'products.id')
                ->where('carts.user_id', '=', auth()->user()->id);
        })
        ->get();

        foreach ($products as $product) {
            $total_price += $product->price;
        }

        $total_price_string_2dp = number_format($total_price, 2);

        return view('checkout', [
            "products" => $products,
            'total_price' => $total_price_string_2dp,
        ]);
    }
}
