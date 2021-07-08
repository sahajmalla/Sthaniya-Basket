<?php

namespace App\Models;

use App\Models\CollectionDay;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CollectionTimeSlot extends Model
{
    use HasFactory;

    protected $fillable =[
        'slot_time',
        'order_quantity',
    ];

    public function collectionDay(){
        return $this->belongsTo(CollectionDay::class);
    }

}
