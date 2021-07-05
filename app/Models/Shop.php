<?php

namespace App\Models;

use App\Models\Trader;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopname',
        'shoppic',
    ];

    public function trader() {
        return $this->belongsTo(Trader::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

}
