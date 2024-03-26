<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'code',
        'percent',
        'from_date',
        'till_date',
        'conditions'
    ];
}