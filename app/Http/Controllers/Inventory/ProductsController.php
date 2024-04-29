<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::join('catergories', 'products.catergory_id', '=', 'catergories.id')
            ->select('products.*', 'catergories.*')
            ->orderByDesc('products.id')
            ->paginate(5);
        return view('layouts.inv.product', compact('products'));
    }
}
