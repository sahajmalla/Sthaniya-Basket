<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product) {

        $this->validate($request, [
            'body' => 'required',
            'rating' => 'required',
        ]);

        // Creating a review record through the product:
        $product->reviews()->create([
            'user_id' => $request->user()->id, // Currently authenticated user that made an review.
            'review' => $request->body,
            'review_rating' => $request->rating
        ]); 

        return back();

    }
}
