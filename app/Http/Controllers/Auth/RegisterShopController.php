<?php

namespace App\Http\Controllers\Auth;

use App\Models\Shop;
use App\Models\Trader;
use App\Mail\ShopCreation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class RegisterShopController extends Controller
{
    public function index() {
        
        return view('auth.register-shop');
    }

    public function store(Request $request){
        $this->validate($request, [
            'shopname' => 'required|max:255',
            'shoppic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',   
        ]);

        $traders = Trader::get()->where('user_id', auth()->user()->id);

        $shop = new Shop();
        foreach($traders as $trader){
        $shopCount = DB::table('shops')
                        ->join('traders','traders.id','=','shops.trader_id')
                        ->where('traders.business',$trader->business)
                        ->count();
        }

        if($shopCount>=10){

            $request->session()->flash('ShopLimit', 'Shop is limited to 10 for your business type.');
            return back();

        }else{

            if ($request->hasFile('shoppic')) {
                $imageName = time().'.'.$request->shoppic->extension();  
                $request->shoppic->move(public_path('images/traders/shop'), $imageName);
    
                // $trader = Trader::find(auth()->user()->$trader->trader_id);
                $currentUserId = auth()->user()->user_id;
    
                foreach($traders as $trader){
                    $traderUserId = (int) $trader->user_id;
                    if($traderUserId == auth()->user()->id){
                        $shop = $trader->shops()->create([
                                    'shopname'=> $request->shopname,
                                    'shoppic'=> $imageName,
                                ]);
                    }
                }
            }else{
                foreach($traders as $trader){
                    $traderUserId = (int) $trader->user_id;
                    
                    if($traderUserId == auth()->user()->id){
                        $shop = $trader->shops()->create([
                                    'shopname'=> $request->shopname,
                                    'shoppic'=> 'defaultShopImage.png',
                                ]);
                    }
                }
            }
        }
        

        // Send email to user.
        Mail::to(auth()->user())->send(new ShopCreation($shop));
        $request->session()->flash('ShopCreated', 'Shop created successfully.');
        return redirect()->route('products.index');

    }
}
