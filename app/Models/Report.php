<?php

namespace App\Models;

use App\Models\Trader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $fillable =[
        'report_type',
        'report_sales_quantity',
        'report_earnings',
    ];

    public function trader(){
        return $this->belongsTo(Trader::class);
    }
}
