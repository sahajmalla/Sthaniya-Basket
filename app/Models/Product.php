<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;

    protected $fillable =[
        'prod_name',
        'prod_type',
        'prod_descrip',
        'price',
        'prod_image',
        'prod_quantity',
    ];

    protected $casts = [
        'price' => 'float'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
