<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pest\Arch\Objects\FunctionDescription;

class SupplierController extends Controller
{
    public function index()
    {
        return view('layouts.po.supplier');
    }
}
