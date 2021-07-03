<?php

namespace App\Http\Controllers;

use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifyTraderController extends Controller
{
    public function index() {
        
        $query = DB::table('users')
                    ->join('traders','users.id','=','traders.user_id')
                    ->get();
        // dd($query);
        return view('verifyTrader',['results'=>$query]);
    }

    public function verify(int $traderid){
        $trader=Trader::find($traderid);
        $trader->verified_trader = 'yes';
        $trader->save();
        return back();
    }
    public function unverify(int $traderid){
        $trader=Trader::find($traderid);
        $trader->verified_trader = 'no';
        $trader->save();
        return back();
    } 
}
