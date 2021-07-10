<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Trader;
use Illuminate\Http\Request;

class UpdateDetailsController extends Controller
{
    public function index() {
        $traders = Trader::get()->where('user_id', auth()->user()->id);
        $shops = collect();

        foreach ($traders as $trader){
            $shops = Shop::where('trader_id', $trader->id)->get();
            
        }
        // dd($shops);
        return view('updateDetails',['shops'=>$shops]);
    }
}
