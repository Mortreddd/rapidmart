<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityReports extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspector_id',
        'po_id',
        'reports_pdf_path',
        'status',
        'description',
        'isEmailed_status'
    ];
}
