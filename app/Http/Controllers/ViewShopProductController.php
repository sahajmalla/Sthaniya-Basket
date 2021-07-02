<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewShopProductController extends Controller
{
    public function showProduct(int $shopid){
        $shopProducts = Product::where('shop_id',$shopid)->get();
        return view('products.show-shop-products',[
            'products'=>$shopProducts
        ]);
    }
}
