<?php

namespace App\Http\Controllers\Sales; 

use App\Http\Controllers\Controller;
use App\Models\Sales\Promo;
use Illuminate\Support\Facades\Route;

class PromoInformationController extends Controller
{
    public function index()
    {
        $promo = Promo::join('products', 'promos.product_id', '=', 'products.id')
                        ->select('promos.code as code', 'promos.percent as discount', 'promos.from_date as start', 'promos.till_date as end', 'products.name as product')
                        ->where('promos.till_date','>=',now())
                        ->orWhere('promos.from_date','<=', now())
                        ->paginate(10);

        return  view('layouts.sales.promoinformation', ['promo' => $promo])->with('i',(request()->input('page', 1) -1) *10);
    }
}