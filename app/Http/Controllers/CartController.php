<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    // public function __construct() {
    //     $this->middleware(['auth']);
    // }

    public function index() {

        // If user is not signed in, we will set the price to 0.0 and send over an empty 
        // collection of products to cart.blade.php page.

        $total_price = 0.0;
        $products = collect();

        if (auth()->user()) {
            
            $products = DB::table('products')
            ->join('carts', function ($join) {
                $join->on('carts.product_id', '=', 'products.id')
                    ->where('carts.user_id', '=', auth()->user()->id);
            })
            ->get();

            foreach ($products as $product) {
                $total_price += $product->price;
            }

        }

        $total_price_string_2dp = number_format($total_price, 2);

        return view('cart', [
            "products" => $products,
            'total_price' => $total_price_string_2dp,
        ]);
    } 

    public function store(Request $request, Product $product){

        // If user is logged in, add the item to the cart database.
        
        $products = collect([]); // Creating a collection for un-authenticated users.

        if (auth()->user()) {

            // Check if product already exists in user's cart of products before adding:
            $productCollection = Cart::get()->where('product_id', $product->id)
                ->where('user_id', auth()->user()->id);
            
            if (!$productCollection->count()) {

                $product->carts()->create([
                    'user_id' => $request->user()->id,
                    'total_price' => $product->price,
                    'product_quantity' => 1,
                ]); 

                //TODO: Add success message

            }else {
                
                //TODO: Add error message(item is already in cart)

            }

        }else {

            // If user is adding to cart while being logged out.
            $request->session()->put('products', $products);
            $request->session()->push('products', $product);
            dd(session('products'));

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
