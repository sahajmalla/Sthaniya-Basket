<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {

        //TODO: Get all products that the user added to cart.

        $products = DB::table('products')
        ->join('carts', function ($join) {
            $join->on('carts.product_id', '=', 'products.id')
                ->where('carts.user_id', '=', auth()->user()->id);
        })
        ->get();

        $total_price = 0.0;

        foreach ($products as $product) {
            $total_price += $product->price;
        }

        $total_price_string_2dp = number_format($total_price, 2);

        return view('cart', [
            "products" => $products,
            'total_price' => $total_price_string_2dp,
        ]);
    } 

    public function store(Request $request, Product $product){

        // Check if product already exists in user's cart of products before adding:
        $productCollection = Cart::get()->where('product_id', $product->id)
            ->where('user_id', auth()->user()->id);
        
        if (!$productCollection->count()) {

            $product->carts()->create([
                'user_id' => $request->user()->id, // Current authenticated user that added a prodcut.
                'total_price' => $product->price,
                'product_quantity' => 1,
            ]); 

            // $request->session()->put('cart', 'Successfully added item to your cart.');

        }else {
            
            // Inform user that user has already added the product to the cart.
            // $request->session()->put('cart', 'Item is already on your cart.');

        }

        return back();
    }

    public function destroy (String $productID) {

        //Length aware paginator vs Collection products. 

        $product_id = (int) $productID;

        // Delete from Cart table using the selected product's ID and the authenticated user's 
        // ID.
        $deletedRows = Cart::where('product_id', $product_id)
            ->where('user_id', auth()->user()->id)->delete();
        
        return back()->with('status', 'Successfully deleted product.');

    }


}
