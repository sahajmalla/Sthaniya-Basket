<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateShopController extends Controller
{
    public function index(Request $request){
        // dd($request);
        $request->validate([
            'tradershop' => 'required',
        ]);
        $query = DB::table('shops')
                    ->where('shopname',$request->tradershop)
                    ->get();
        // dd($query);
        return view('update-shop',['shops'=>$query]);
    }

    public function update(Request $request, int $id){
        
    
        $shop =Shop::find($id);
        // dd($shop);
        if($request->hasFile('shopImage')){
            $request->validate([
                'shopname' => 'required',
                'shopImage' => 'image|mimes:jpg,png,jpeg,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->shopimage->extension(); 
            $request->shopImage->move(public_path('images/traders/shop'), $imageName);
            $shop->shopname = $request->shopname;
            $shop->shoppic=$imageName; 
            $shop->save();    
        }
        else{
            $request->validate([
                'shopname' => 'required',
            ]);
            $shop->shopname = $request->shopname;
            $shop->shoppic = $shop->shoppic;  
            $shop->save();
             
        }
        $request->session()->flash('updateShop', 'Successfully updated shop.');
        return redirect()->route('home');
        
    }   
}
