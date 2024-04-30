<?php

namespace App\Http\Controllers\Sales; 

use App\Http\Controllers\Controller;
use App\Models\Sales\Sales;
use Illuminate\Support\Facades\Route;
use App\Models\PO\Catergory;
use App\Models\PO\Product;

class SalesReportController extends Controller
{
    public function index()
    {
        $sales = Sales::join('products', 'sales.product_id','=', 'products.id')
                        ->join('catergories','products.catergory_id','=','catergories.id')
                        ->select(
                            'sales.quantity as quantity',
                            'sales.amount as amount',
                            'sales.created_at as created_at',
                            'products.price as price',
                            'products.name as product_name',
                            'catergories.name as category_name'
                            )
                        ->latest()
                        ->paginate(10);
        return view('layouts.sales.salesreport',['sales' => $sales])->with('i',(request()->input('page', 1) -1) *10);
    }
}