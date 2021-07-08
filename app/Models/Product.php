<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Shop;
use App\Models\User;
use App\Models\Review;
use App\Models\Trader;
use App\Models\Wishlist;
use App\Models\ProductPurchased;
use App\Models\ProductQuantitySales;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;

    protected $fillable =[
        'prod_name',
        'prod_type',
        'prod_descrip',
        'price',
        'prod_image',
        'prod_quantity',
        'shop_id',
        'allergy'
    ];

    protected $casts = [
        'price' => 'float'
    ];

    public function trader(){
        return $this->belongsTo(Trader::class);
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function productQuantitySales(){
        return $this->hasMany(ProductQuantitySales::class);
    }

    public function productPurchaseds(){
        return $this->hasMany(ProductPurchased::class);
    }
    
}
