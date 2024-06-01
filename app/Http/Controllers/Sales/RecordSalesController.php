<?php

namespace App\Http\Controllers\Sales; 

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\RecordSalesRequest;
use App\Models\Sales\Discount;
use App\Models\Sales\Sales;
use App\Models\Sales\Promo;
use App\Models\PO\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RecordSalesController extends Controller
{
    public function create()
    {   
        $products = Product::all();
        $discounts = Discount::all();
        $promo = Promo::where('promos.till_date','>=',now())
                        ->where('promos.from_date','<=', now())
                        ->get();
        return view('layouts.Sales.recordsales', compact('products', 'discounts', 'promo'));
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'discount_id' => 'nullable|exists:discounts,id',
            'promo_id' => 'nullable|exists:promos,id',
            'cash' => 'required|numeric|min:0',
        ]);
        
       $product = Product::find($request->product_id);
       $quantity = $request->quantity;
       $total = $product->price * $quantity;
       $discounts = Discount::find($request->discount_id);
       $promo = Promo::find($request->promo_id);
       $discount = 0;
       $cash = $request->cash;
       $change = 0;

       if($product->stocks <= 0){
        return redirect()->back()->withErrors(['product_id' => 'Product is out of stock.']);
       }
    
       if($discounts)
       {
            $discount = $discounts->percent/100 * $total;
       }

       if($promo)
       {
            if($promo->product_id != $product->id){
                return redirect()->back()->withErrors(['promo_id' => 'Promo is not applicable to this']);
            }
            $discount += $promo->percent/100 * $total;
       }

       

       $amount = $total - $discount;
       
       if ($cash < $amount) 
       {
        return redirect()->back()->withErrors(['cash' => 'Cash provided must be greater than or equal to the total amount after discounts and promotions.']);
       } 
       
        
    
    
        $change = $cash > $amount ? $cash - $amount : 0;

       Sales::create([
            'employee_id' => 1000,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'discount_id' =>$discounts->id ?? null,
            'promo_id' =>$promo->id ?? null,
            'amount' => $amount,
            'cash' => $cash,
            'change' => $change

       ]);

       $product->stocks = $product->stocks - $quantity;
       $product->save();
       return redirect()->back()->with('success', 'Sale recorded successfully!');
    }
}