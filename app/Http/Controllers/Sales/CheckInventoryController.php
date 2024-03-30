<?php

namespace App\Http\Controllers\Sales; 

use App\Http\Controllers\Controller;
use App\Models\PO\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckInventoryController extends Controller
{
    public function index()
    {
            $products = Product::join('catergories','products.catergory_id','=','catergories.id')
                                ->select('products.id as product_id',
                                'products.name as product_name',
                                'catergories.name as category_name',
                                'products.price as price',
                                'products.stocks as stock'
                                )
                                ->paginate(10);
        return view('layouts.sales.checkinventory',['products' => $products])->with('i',(request()->input('page', 1) -1) *10);
    }

    public function search(Request $request){
        $request->validate([
            'search' => 'nullable|string|max:50', 
        ]);

        $searchTerm = $request->input('search');

        if(!empty($searchTerm))
        {
            $products = Product::join('catergories','products.catergory_id','=','catergories.id')
                                ->select(
                                    'products.id as product_id',
                                    'products.name as product_name',
                                    'catergories.name as category_name',
                                    'products.price as price',
                                    'products.stocks as stock'
                                )
                                ->where('products.name','LIKE','%'.$searchTerm.'%')
                                ->orWhere('catergories.name','LIKE', '%' .$searchTerm. '%')
                                ->paginate(10);
        }
        return view('layouts.sales.checkinventory',['products' => $products])->with('i',(request()->input('page', 1) -1) *10);

    }
}