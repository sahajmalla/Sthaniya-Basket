<?php

namespace App\Http\Controllers;

use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifyTraderController extends Controller
{
    public function index() {
        
        $query = DB::table('traders')
                    ->join('users','users.id','=','traders.user_id')
                    ->select('users.user_image','users.firstname','users.lastname',
                            'traders.business','traders.verified_trader','users.email')
                    ->get();
        // dd($query);
        return view('verifyTrader',['result'=>$query]);
    }

    public function verify(){
        
    }   
}
