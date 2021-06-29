<?php

namespace App\Models;

use App\Models\Trader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopName',
        'shopPic',
    ];

    public function trader() {
        return $this->belongsTo(Trader::class);
    }
}
