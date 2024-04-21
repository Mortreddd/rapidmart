<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'address',
        'email',
        'description',
        'picture',
    ];

    // public function PurchaseOrder(): HasMany
    // {
    //     return $this->hasMany(PurchaseOrder::class, 'supplier_id');
    // }

}
