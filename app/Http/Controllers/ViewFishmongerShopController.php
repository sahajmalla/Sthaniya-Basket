<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewFishmongerShopController extends Controller
{
    public function index(){
        $shopTraders = DB::table('traders')
                    ->join('shops','traders.id','=','shops.trader_id')
                    ->where('traders.business','fishmonger')
                    ->get();
        
        return view('shops.fishmonger',[
            'shopTraders'=>$shopTraders,
        ]);
    }
}
