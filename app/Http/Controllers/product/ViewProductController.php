<?php

namespace App\Http\Controllers\product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewProductController extends Controller
{
    public function index(Product $product) {

        $trader = $product->user;

        return view('products.productDetails', [
            'product' => $product,
            'trader' => $trader
        ]);
    } 
}
