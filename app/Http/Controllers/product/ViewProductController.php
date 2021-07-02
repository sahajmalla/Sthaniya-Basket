<?php

namespace App\Http\Controllers\product;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class ViewProductController extends Controller
{
    public function index(int $productID, Request $request) {

        $product = Product::find($productID);

        $trader = $product->trader->user;
        
        $reviews = Review::latest()->where('product_id', $productID)
        ->with(['customer', 'product'])->paginate(4); // Getting the reviews for that product.

        //$products = $product->trader->products; Getting products from same trader for 'similar products'
        $products = Product::get()->where('shop_id', $product->shop_id);

        $ratingsInStars = 0;

        if ($product->reviews->count()) {

            // A product's total rating out of 5 stars.
            $totalRatingsValue = Review::where('product_id', $product->id)->sum('review_rating');
            $maxRatingValue = Review::where('product_id', $product->id)->count('review_rating') * 5;
            $ratingsInStars = round(($totalRatingsValue / $maxRatingValue) * 5);

        }        

        return view('products.productDetails', [
            'product' => $product,
            'trader' => $trader,
            'reviews' =>  $reviews,
            'products' => $products,
            'ratingsInStars' => $ratingsInStars
        ]);
    } 
}
