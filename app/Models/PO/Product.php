<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'stock',
        'price',
        'category_id',
        'supplier_id',
        'size',
        'created_at',
        'updated_at'
    ];

    public function category() {
        return $this->belongsTo(Catergory::class);
    }

    public function sales(){
        return $this->hasMany(Sales::class);
    }

    public function promo(){
        return $this->hasMany(Promo::class);
    }
}