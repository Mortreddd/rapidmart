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
                        ->leftJoin('discounts','sales.discount_id','=','discounts.id')
                        ->leftJoin('promos','sales.promo_id','=','promos.id')
                        ->select(
                            'sales.id as id',
                            'sales.quantity as quantity',
                            'sales.amount as amount',
                            'sales.created_at as created_at',
                            'sales.cash as cash',
                            'sales.change as change',
                            'promos.percent as promo',
                            'discounts.percent as discount',
                            'products.price as price',
                            'products.name as product_name',
                            'catergories.name as category_name'
                            )
                        ->latest()
                        ->paginate(10);
        return view('layouts.sales.salesreport',['sales' => $sales])->with('i',(request()->input('page', 1) -1) *10);
    }
}