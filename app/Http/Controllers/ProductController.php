<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Trader;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    
    public function index(Request $request){
        
        $traders = Trader::get()->where('user_id', auth()->user()->id);
        $products = collect();
        $shops = collect();
        
        foreach ($traders as $trader){
            $products = Product::where('trader_id', $trader->id)->get();
            $shops = Shop::where('trader_id', $trader->id)->get();
        }
        if($request){
            foreach ($shops as $shop){
                // dd($shop->shopName);
                if($request->sort==$shop->shopname){
                    $products = DB::table('products')
                        ->join('shops', 'shops.id', '=', 'products.shop_id')
                        ->where('shops.shopname',$shop->shopname)
                        ->get(); 
                }
            }  
        }
        // dd($products);
        return view('products.index', [
            'products' =>$products,
            'shops' => $shops,
        ]);
    }

    public function create()
    {
    
        $traders = Trader::get()->where('user_id', auth()->user()->id);

        $shops = collect();

        foreach ($traders as $trader){
            $shops = Shop::get()->where('trader_id', $trader->id);
        }

        return view('products.create',  [
            'shops' => $shops,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'prod_name' => 'required',
            'prod_descrip' => 'required',
            'price' => 'required',
            'prod_image' => 'required',
            'prod_quantity' => 'required',
            'shop' => 'required'
        ]);
        
        // $path = $request->prod_image->move(public_path('images'),$request->prod_image);
       
        $request->file('prod_image')->move(public_path('images/products/'), $request->file('prod_image')->getClientOriginalName());

        // $product = new Product;
        // $product->prod_name= $request->prod_name;
        // $product->prod_descrip= $request->prod_descrip;
        // $product->price= $request->price;
        // $product->prod_type= $request->user()->business;
        // $product->prod_image= $path;
        // $product->prod_quantity= $request->prod_quantity;
        // $product->save();

        // $request->user()->products()->create([
        
        // ]);

        $traders = Trader::get()->where('user_id', auth()->user()->id);

        foreach ($traders as $trader){

            if ($trader->user_id == auth()->user()->id) {

                $shops = Shop::get()->where('trader_id', $trader->id);

                foreach ($shops as $shop){

                    if ($shop->shopname == $request->shop) {

                        $trader->products()->create([
                            'prod_name' => $request->prod_name,
                            'prod_descrip' => $request->prod_descrip,
                            'price' => $request->price,
                            'prod_type' => $trader->business,
                            'prod_image' => $request->file('prod_image')->getClientOriginalName(),
                            'prod_quantity' => $request->prod_quantity,
                            'allergy' => $request->allergy,
                            'shop_id' => $shop->id
                        ]);

                    }
                
                }

            }

        }


        return redirect()->route('products.index')->with('Success','Product inserted successfully.');
    }

    public function show(Product $product)
    {
      return view('products.show',compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'prod_name' => 'required',
            'prod_descrip' => 'required',
            'price' => 'required',
            'prod_image' => 'image|mimes:jpg,png,jpeg,svg|max:2048',
            'prod_quantity' => 'required',
        ]);

        $product->prod_name = $request->prod_name;
        $product->prod_descrip = $request->prod_descrip;
        $product->price = $request->price;
        if($request->hasFile('prod_image')){
            $product->prod_image = $request->file('prod_image')->getClientOriginalName();
        }
        $product->allergy = $request->allergy;
        $product->prod_quantity = $request->prod_quantity;

        $product->save();

        return redirect()->route('products.index')->with('Success','Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('Success','Product deleted successfully');
    }
}
