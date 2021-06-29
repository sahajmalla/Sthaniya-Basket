<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'total_price',
        'product_quantity'
    ];

    public function user() {
        return $this->belongsTo(Customer::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

}
