<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct() {

        $this->middleware(['auth']);
    }

    public function index() {
        return view('wishlist');
    }
    
    public function add(Product $product){
        return view('wishlist', [
            'products' => $product
        ]);
    }
}
