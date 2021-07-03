<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) {
        // dd($request);
        $products = Product::inRandomOrder()->paginate(20);
        
        if($request->sort=='latest'){
            $products = Product::latest()->paginate(20); 
        }

        if($request->sort=='high-price'){
            $products = Product::orderBy('price','DESC')->paginate(20); 
        }
        if($request->sort=='low-price'){
            $products = Product::orderBy('price')->paginate(20); 
        }
        //todo
        // if($request->sort=='popularity'){
        //     $products = Product::latest()->paginate(20); 
        // }

        return view('home', [
            'products' => $products,
        ]);
    }
}
