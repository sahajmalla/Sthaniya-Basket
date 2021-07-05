<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\User;
use App\Models\Report;
use App\Models\Product;
use App\Models\ProductQuantitySales;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trader extends Model
{
    use HasFactory;

    protected $fillable = [
        'business',
        'verified_trader',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function shops(){
        return $this->hasMany(Shop::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function ProductQuantitySales(){
        return $this->hasMany(ProductQuantitySales::class);
    }

}
