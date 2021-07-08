<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Checkout;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductPurchased extends Model
{
    use HasFactory;

    protected $fillable =[
        'prod_quantity',
        'total_price',
        'customer_id',
        'checkout_id',
    ];

    public function user() {
        return $this->belongsTo(Customer::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function checkout() {
        return $this->belongsTo(Checkout::class);
    }

}
