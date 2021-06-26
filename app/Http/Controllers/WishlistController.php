<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function __construct() {

        $this->middleware(['auth']);
    }

    public function index() {

        //TODO: Get all products that the user wishlisted.

        $products = DB::table('products')
        ->join('wishlists', function ($join) {
            $join->on('wishlists.product_id', '=', 'products.id')
                 ->where('wishlists.user_id', '=', auth()->user()->id);
        })
        ->get();

        return view('wishlist', [
            "products" => $products
        ]);
    }
    
    public function store(Request $request, Product $product){
        
        $productCollection = Wishlist::get()->where('product_id', $product->id)
            ->where('user_id', auth()->user()->id);

        if (!$productCollection->count()) {

            $product->wishlists()->create([
                'user_id' => $request->user()->id, // Currently authenticated user that made an review.
            ]); 

            // $request->session()->put('wishlist', 'Successfully added item to your wishlist.');

        }else {
            
            // Inform user that user has already added the product to the wishlist.
            // $request->session()->put('wishlist', 'Item is already on your wishlist.');

        }

        return back();

    }

    public function destroy (String $productID) {

        $product_id = (int) $productID;

        // Delete from Wishlist table using the selected product's ID and the authenticated user's 
        // ID.

        $deletedRows = Wishlist::where('product_id', $product_id)
            ->where('user_id', auth()->user()->id)->delete();
        
        return back()->with('status', 'Successfully deleted product.');

    }

}
