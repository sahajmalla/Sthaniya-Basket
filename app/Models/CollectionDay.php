<?php

namespace App\Models;

use App\Models\CollectionTimeSlot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CollectionDay extends Model
{
    use HasFactory;

    protected $fillable =[
        'day',
    ];

    public function collectionTimeSlots(){
        return $this->hasMany(CollectionTimeSlot::class);
    }

}
