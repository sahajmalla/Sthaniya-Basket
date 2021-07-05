<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
   public function search(Request $request){
    
    $query =$request->input('query');
    $products = DB::table('products')   
                ->whereRaw(DB::raw("lower(prod_name) like '%{$query}%'"))
                ->get();
// dd($products); 
    return view('search-results',[
        'products' => $products,
    ]);
   }
}
