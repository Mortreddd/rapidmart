<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'product_id',
        'quantity',
        'discount_id',
        'promo_id',
        'amount',
        'created_at',
        'updated_at'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}