<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'sub_total',
        'tax',
        'total_cost',
        'payment_due',
        'account_number',
        'invoice_file',
        'invoice_date',
    ];
}