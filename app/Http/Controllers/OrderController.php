<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {

        $orders = Checkout::latest()->paginate(20)->where('customer_id', auth()->user()->customers->first()->id);

        return view('order', [
            "orders" => $orders,
        ]);
    }
}
