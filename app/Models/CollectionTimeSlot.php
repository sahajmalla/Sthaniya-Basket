<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionTimeSlot extends Model
{
    use HasFactory;

    protected $fillable =[
        'slot_time',
        'order_quantity',
    ];

}
