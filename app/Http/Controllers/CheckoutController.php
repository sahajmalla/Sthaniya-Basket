<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class CheckoutController extends Controller
{
    public function index(Request $request) {

        $total_price = 0.0;
        $total_items_quantity = 0;

        // Retrive products related to user from cart.
        $cartAndProductRecords = DB::table('products')
        ->join('carts', function ($join) {
            $join->on('carts.product_id', '=', 'products.id')
                ->where('carts.user_id', '=', auth()->user()->id);
        })
        ->get();

        foreach ($cartAndProductRecords as $cartAndProductRecord) {
            $total_price += ($cartAndProductRecord->price * $cartAndProductRecord->product_quantity);
            $total_items_quantity += $cartAndProductRecord->product_quantity;
        }

        $total_price_string_2dp = number_format($total_price, 2);

        return view('checkout', [
            "cartAndProductRecords" => $cartAndProductRecords,
            'total_price' => $total_price_string_2dp,
            'total_items_quantity' => $total_items_quantity,
        ]);
    }
}
