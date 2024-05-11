<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderExpense extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'total_amount', 'created_at', 'updated_at'];
}