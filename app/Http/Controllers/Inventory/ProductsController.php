<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Product;
use App\Models\PO\Catergory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::join('catergories', 'products.catergory_id', '=', 'catergories.id')
            ->select('products.*', 'catergories.name')
            ->orderByDesc('products.id')
            ->paginate(5);

        $category = Catergory::all();

        return view('layouts.inv.product', compact('products', 'category'));

    }

    public function store(Request $request)
    {
        function generateUniqueBarcode()
        {
            do {
                $barcode = rand(100000000, 999999999);
            } while (Product::where('barcode', $barcode)->exists());


            return $barcode;
        }

        $validated = Validator::make($request->all(), [
            'product_name' => 'required|max:100|min:1',
            'stock' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
            'category_id' => 'required'
        ], [
            'product_name.required' => 'Name is Required',
            'stock.required' => 'Quantity is Required',
            'price.required' => 'Price is Required',
            'category_id.required' => 'Category is Required',
            'image.image' => 'Must be an image',
            'image.mimes' => 'Must be an extension of (jpeg,png,jpg)',
            'image.max' => 'Image is too Big (max upload size: 10 Mb)',
            'stock.integer' => 'Quantity is must be a Number',
            'price.numeric' => 'Price is must be a Number',
            'stock.min' => 'Quantity (min:1)',
            'price.min' => 'Price (min:1)',
        ]);

        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validated->errors()]);
        }

        try {
            if ($request->hasFile('image')) {
                $image_path = $request->file('image')->store('ProductsImg', 'public');
            } else {
                $image_path = '
                ProductsImg/default.png';
            }




            $product = Product::create([
                'product_name' => $request->product_name,
                'image' => $image_path,
                'stocks' => $request->stock,
                'price' => $request->price,
                'catergory_id' => $request->category_id,
                'barcode' => generateUniqueBarcode(),
            ]);

            return response()->json(['status' => 'success', $product]);
        } catch (\Exception $e) {
            return response()->json([[$e->getMessage()]]);
        }
    }

    public function edit(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'product_name' => 'required|max:100|min:1',
            'stock' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ], [
            'product_name.required' => 'Name is Required',
            'stock.required' => 'Quantity is Required',
            'price.required' => 'Price is Required',
            'category_id.required' => 'Category is Required',
            'image.image' => 'Must be an image',
            'image.mimes' => 'Must be an extension of (jpeg,png,jpg)',
            'image.max' => 'Image is too Big (max upload size: 10 Mb)',
            'stock.integer' => 'Quantity is must be a Number',
            'price.numeric' => 'Price is must be a Number',
            'stock.min' => 'Quantity (min:1)',
            'price.min' => 'Price (min:1)',
        ]);

        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validated->errors()]);
        }

        try {
            if ($request->hasFile('image')) {
                $image_path = $request->file('image')->store('ProductsImg', 'public');
            }

            if (!empty($image_path) && !empty($request->category_id)) {
                $editProduct = Product::where('id', $request->id)->update([
                    'product_name' => $request->product_name,
                    'image' => $image_path,
                    'stocks' => $request->stock,
                    'price' => $request->price,
                    'catergory_id' => $request->category_id,
                ]);
            } else if (!empty($request->category_id)) {
                $editProduct = Product::where('id', $request->id)->update([
                    'product_name' => $request->product_name,
                    'stocks' => $request->stock,
                    'price' => $request->price,
                    'catergory_id' => $request->category_id,
                ]);
            } else if (!empty($image_path)) {
                $editProduct = Product::where('id', $request->id)->update([
                    'product_name' => $request->product_name,
                    'image' => $image_path,
                    'stocks' => $request->stock,
                    'price' => $request->price,
                ]);
            } else {
                $editProduct = Product::where('id', $request->id)->update([
                    'product_name' => $request->product_name,
                    'stocks' => $request->stock,
                    'price' => $request->price,
                ]);
            }

            return response()->json(['status' => 'success', 'data' => $editProduct]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function getProductData($id)
    {
        $productData = Product::join('catergories', 'products.catergory_id', '=', 'catergories.id')
            ->select('products.*', 'catergories.name')
            ->where('products.id', '=', $id)
            ->get();

        return response()->json(['status' => 'success', 'data' => $productData]);
    }

    public function delete($id)
    {
        try {
            $product = Product::where('id', $id)->delete();
            if ($product) {
                return response()->json(['status' => 'success', $product]);//just for console :)
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong.'], 500);//just for console :)
        }
    }

}
