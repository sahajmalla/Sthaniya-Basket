<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {
        return view('cart');
    } 

    public function add(Product $product) {
        
        return view('cart', [
            '$product' => $product
        ]);
    } 
}
