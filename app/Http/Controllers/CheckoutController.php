<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class CheckoutController extends Controller
{
    public function index() {
        return view('checkout');
    }
}
