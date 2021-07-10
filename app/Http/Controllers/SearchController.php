<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
   public function search(Request $request){
    
    $query =$request->input('query');
    $query = strtolower($query);
    $products = Product:: 
                whereRaw(Product::raw("lower(prod_name) like '%{$query}%'"))
                ->latest()->paginate(20);
// dd($products); 
    return view('search-results',[
        'products' => $products,
    ]);
   }
}
