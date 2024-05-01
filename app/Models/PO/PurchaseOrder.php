<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'supplier_id',
        'pdf_path',
        'status',
    ];

    // public function supplier(): BelongsTo
    // {
    //     return $this->belongsTo(Supplier::class);
    // }

}
