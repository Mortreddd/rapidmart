<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_id',
        'sale_receipt_id',
        'income',
        'total_cost',
        'profit',
        'created_at',
        'updated_at'
    ];
}