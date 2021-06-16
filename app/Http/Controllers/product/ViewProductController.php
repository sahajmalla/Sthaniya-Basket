<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewProductController extends Controller
{
    public function index() {
        return view('product.productDetails');
    } 
}
