<?php

namespace App\Models;

use App\Models\User;
use App\Models\Checkout;
use App\Models\ProductPurchased;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'subscription',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function checkouts(){
        return $this->hasMany(Checkout::class);
    }

    public function productPurchaseds(){
        return $this->hasMany(ProductPurchased::class);
    }

}
