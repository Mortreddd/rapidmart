<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
