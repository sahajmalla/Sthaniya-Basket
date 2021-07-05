<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Trader;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewBakeryShopController extends Controller
{
    public function index(){
        $shopTraders = DB::table('traders')
                    ->join('shops','traders.id','=','shops.trader_id')
                    ->where('traders.business','bakery')
                    ->get();
        // dd($shopTraders);
        
        return view('shops.bakery',[
            'shopTraders'=>$shopTraders,
        ]);
    }


}
