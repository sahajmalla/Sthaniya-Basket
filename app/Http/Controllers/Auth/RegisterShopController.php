<?php

namespace App\Http\Controllers\Auth;

use App\Models\Shop;
use App\Models\Trader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterShopController extends Controller
{
    public function index() {

        return view('auth.register-shop');
    }

    public function store(Request $request){
        $this->validate($request, [
            'shopName' => 'required|max:255',
            'shopPic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',   
        ]);

        $traders = Trader::get()->where('user_id', auth()->user()->id);
        
        if ($request->hasFile('shopPic')) {
            $imageName = time().'.'.$request->shopPic->extension();  
            $request->shopPic->move(public_path('images/traders/shop'), $imageName);

            // $trader = Trader::find(auth()->user()->$trader->trader_id);
            $currentUserId = auth()->user()->user_id;

            foreach($traders as $trader){
                $traderUserId = (int) $trader->user_id;
                if($traderUserId === auth()->user()->id){
                    $trader->shops()->create([
                        'shopName'=> $request->shopName,
                        'shopPic'=> $imageName,
                    ]);
                }
            }
        }else{
            foreach($traders as $trader){
                $traderUserId = (int) $trader->user_id;
                if($traderUserId === auth()->user()->id){
                    $trader->shops()->create([
                        'shopName'=> $request->shopName,
                        'shopPic'=> 'defaultShopImage.png',
                    ]);
                }
            }
        }
        return redirect()->route('products.index');

    }
}
