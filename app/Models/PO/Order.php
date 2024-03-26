<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'supplier_id',
        'product_id',
        'shipper_id',
        'unit_price',
        'quantity',
        'total_amount',
        'order_date',
        'created_at',
        'updated_at'
    ];


    protected $casts = [
        'created_at' => 'datetime'
    ];
}