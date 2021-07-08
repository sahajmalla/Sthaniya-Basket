<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\ProductPurchased;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable =[
        'order_quantity',
        'order_total',
        'order_description',
        'payment_type',
        'collection_time',
        'total_items',
        'paypal_orderid',
        'collection_day',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function productPurchaseds(){
        return $this->hasMany(ProductPurchased::class);
    }

}
