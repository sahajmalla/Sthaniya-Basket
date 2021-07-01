<?php

namespace App\Http\Controllers;

use App\Models\Trader;
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

        $customers = auth()->user()->customers;

        foreach ($customers as $customer) {
            
            $id = $customer->id;

            $products= DB::table('products')
            ->join('wishlists', function ($join) use($customer) {
                $join->on('wishlists.product_id', '=', 'products.id')
                    ->where('wishlists.customer_id', '=', $customer->id);
            })
            ->get();

        }

        return view('wishlist', [
            "products" => $products
        ]);
    }
    
    public function store(Request $request, Product $product){
        
        // Check if product already exists in user's wishlist before adding:
        $productCollection = Wishlist::get()->where('product_id', $product->id)
            ->where('customer_id', auth()->user()->customers->first()->id);

        if (!$productCollection->count()) {

            $product->wishlists()->create([
                'customer_id' => auth()->user()->customers->first()->id, // Current authenticated user that added a prodcut.
            ]); 

            $request->session()->flash('addedToWishlist', 'Successfully added item to your wishlist!');

        }else {
            
            // Inform user that user has already added the product to the wishlist.

            $request->session()->flash('failedToAddToWishlist', 'Item already exists in wishlist.');
        }

        return back();

    }

    public function destroy (Request $request, String $productID) {

        $product_id = (int) $productID;

        // Delete from Wishlist table using the selected product's ID and the authenticated user's 
        // ID.

        $deletedRows = Wishlist::where('product_id', $product_id)
            ->where('customer_id', auth()->user()->customers->first()->id)->delete();
        
        $request->session()->flash('deleteFromWishlist', 'Successfully removed item from wishlist.');

        return back();

    }

}
