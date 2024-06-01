<?php

namespace App\Http\Controllers\Sales; 

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\AddPromoRequest;
use Illuminate\Support\Facades\Redirect;
use App\Models\Sales\Promo;
use App\Models\PO\Product;
use Illuminate\Support\Facades\Route;

class AddPromoController extends Controller
{
    public function index()
    {

        return view('layouts.Sales.addpromo');
    }

    public function store(AddPromoRequest $request)
    {
        $messages = $request->messages();
        $product = Product::select('id')
                            ->where('name','LIKE','%'.$request->product_name.'%')
                            ->first();
        if($product){
            Promo::create([
                'product_id' => $product->id,
                'code' => $request->code,
                'percent' => $request->discount,
                'from_date' => $request ->date_start,
                'till_date' => $request -> valid_until,
            ]);
            return Redirect::route('sales.promoinformation.index')->with(['promo' => 'Successfully added promo']);
        }
        else {
            return Redirect::back()->withErrors(['product_name' => 'Product not found.'])->withInput();
        }
        

    }
}