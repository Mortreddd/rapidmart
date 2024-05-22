<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Product;
use App\Models\PO\Catergory;
use App\Models\PO\Supplier;
use Illuminate\Http\Request;
use Log;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $stockFilter = $request->get('stock_filter');
        $priceFilter = $request->get('price_filter');
        $categoryId = $request->category_filter;
        $searchTerm = $request->get('datasearch');
        $supplierFilter = $request->get('supplier_filter');

        Log::info('Stock Filter: ' . $stockFilter);
        Log::info('Price Filter: ' . $priceFilter);
        Log::info('Category ID: ' . $categoryId);
        Log::info('Search Term: ' . $searchTerm);
        Log::info('Supplier Filter: ' . $supplierFilter);

        $categories = Catergory::all();
        $suppliers = Supplier::join('products', 'suppliers.id', '=', 'products.supplier_id')
            ->select('suppliers.company_name', 'suppliers.id')
            ->groupBy('suppliers.id')
            ->get();

        $products = Product::query();

        if ($stockFilter) {
            switch ($stockFilter) {
                case 'low-stocks':
                    $products->where('stocks', '<', 10);
                    break;
                case 'out-of-stock':
                    $products->where('stocks', 0);
                    break;
                case 'overstocked':
                    $products->where('stocks', '>', 50);
                    break;
            }
        }

        if ($priceFilter) {
            switch ($priceFilter) {
                case 'high-price':
                    $products->orderBy('selling_price', 'desc');
                    break;
                case 'low-price':
                    $products->orderBy('selling_price', 'asc');
                    break;
            }
        }

        if ($categoryId) {
            Log::info('Applying category filter');
            $products->where('catergory_id', $categoryId);
        }

        if ($supplierFilter) {
            Log::info('Applying supplier filter');
            $products->where('supplier_id', $supplierFilter);
        }

        if ($searchTerm) {
            Log::info('Applying search term filter');
            $products->where(function ($query) use ($searchTerm) {
                $query->where('product_name', 'like', "%{$searchTerm}%")
                    ->orWhere('barcode', 'like', "%{$searchTerm}%");
            });
        }
        Log::info('Generated SQL: ' . $products->toRawSql());

        $products = $products->paginate(10);



        return view('layouts.inv.stock', compact('products', 'categories', 'suppliers'));
    }




    public function updateStock(Request $request)
    {
        $product = Product::find($request->pid);
        $product->update([
            'stocks' => $request->quantity
        ]);

        return response()->json(['status' => 'success', 'product' => $product]);
    }

}