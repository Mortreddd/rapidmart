<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'image',
        'buying_price',
        'selling_price',
        'stocks',
        'unit',
        'catergory_id',
        'supplier_id',
        'barcode',
    ];
}