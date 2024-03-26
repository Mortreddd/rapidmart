<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catergory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];
}