<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defective extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'quantity',
        'created_at'
    ];
}