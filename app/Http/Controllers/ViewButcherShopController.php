<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewButcherShopController extends Controller
{
    public function index(){
        $shopTraders = DB::table('traders')
                    ->join('shops','traders.id','=','shops.trader_id')
                    ->where('traders.business','butcher')
                    ->get();
        
        return view('shops.butcher',[
            'shopTraders'=>$shopTraders,
        ]);
    }
}
