<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifyTraderController extends Controller
{
    public function index() {
        
        $query = DB::table('traders')
                    ->join('shops','traders.id','=','shops.trader_id')
                    ->join('users','users.id','=','traders.user_id')
                    ->select('users.user_image','users.firstname','users.lastname',
                            'traders.business','traders.verified_trader',DB::raw('group_concat(shops.shopName) as shops'))
                    ->groupBy('traders.id','users.user_image','users.firstname','users.lastname','traders.business','traders.verified_trader')
                    ->get();
        // dd($query);
        return view('verifyTrader',['result'=>$query]);
    }
}
