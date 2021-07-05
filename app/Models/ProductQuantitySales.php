<?php

namespace App\Models;

use App\Models\Trader;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductQuantitySales extends Model
{
    use HasFactory;

    protected $fillable =[
        'total_quantity_sold',
        'total_earnings',
        'trader_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function trader(){
        return $this->belongsTo(Trader::class);
    }

}
