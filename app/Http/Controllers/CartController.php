<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function index() {

        // If user is not signed in, we will set the price to 0.0 and send over an empty 
        // collection of products to cart.blade.php page.

        $total_price = 0.0;
        $products = collect();
        
        if (auth()->user()) {

            // If user is signed in:
            
            $products = DB::table('products')
            ->join('carts', function ($join) {
                $join->on('carts.product_id', '=', 'products.id')
                    ->where('carts.user_id', '=', auth()->user()->id);
            })
            ->get();

            foreach ($products as $product) {
                $total_price += $product->price;
            }

        }else {
            
            // User is not signed in and user has added to the cart:
            
            if (session('products')) {
                foreach (session('products') as $product) {
                    $total_price += $product->price;
                }
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

            // If user is adding to cart while being logged in.

            // Disallow duplicates:
            $itemMatch = false;
            if (session('products')) {
                foreach (session('products') as $prod) {
                    if ($prod->id === $product->id ) {
                        $itemMatch = true;
                    }            
                }
            }

            // If duplicate not found add item to the session's products array.
            if (!$itemMatch) {
                $request->session()->push('products', $product);
            }

        }

        return back();
    }

    public function destroy (Request $request, String $productID) {

        // If user is logged in, delete from database.
        if (auth()->user()) {

            //Length aware paginator vs Collection products. 
            $product_id = (int) $productID;

            // Delete from Cart table using the selected product's ID and the authenticated user's 
            // ID.
            $deletedRows = Cart::where('product_id', $product_id)
                ->where('user_id', auth()->user()->id)->delete();

        }else {

            // Deleting guest's cart items from session.

            $product_id = (int) $productID; // Since collection's product can't be passed.

            foreach (session('products') as $prod) {
                if ($prod->id === $product_id ) {
                    $key = array_search($prod, session('products'));
                    $tempArray = session('products');
                    array_splice($tempArray , $key, 1); // Splice prevents gaps in the index position.
                    $request->session()->forget('products');
                    $request->session()->put('products', $tempArray);
                }            
            }
        }
        
        return back()->with('status', 'Successfully deleted product.');

    }

    public function delete (Request $request, Product $product) {

        if(($key = array_search($product, session('products'))) !== false){
            $tempArray = session('products');
            array_splice($tempArray , $key, 1); // Splice prevents gaps in the index position.
            $request->session()->forget('products');
            $request->session()->put('products', $tempArray);
        }

        return back()->with('status', 'Successfully deleted product from your cart.');

    }


}