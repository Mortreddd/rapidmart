<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PO\Product;
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
        'cash',
        'change',
        'created_at',
        'updated_at'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}