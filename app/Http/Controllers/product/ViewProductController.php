<?php

namespace App\Http\Controllers\product;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class ViewProductController extends Controller
{
    public function index(Product $product, Request $request) {

        $trader = $product->user;
        
        $reviews = Review::latest()->where('product_id', $product->id)
        ->with(['user', 'product'])->paginate(4); // Getting the reviews for that product.

        $products = $product->user->products; // Getting products from same trader for 'similar products'

        $ratingsInStars = 0;

        // A product's total rating out of 5 stars.
        if ($product->reviews->count() > 0) {
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
