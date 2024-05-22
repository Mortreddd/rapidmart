<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Product;
use App\Models\PO\Catergory;
use App\Models\PO\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $q = Product::query();

        if ($request->has('datasearch')) {
            $q->where('products.product_name', 'LIKE', $request->datasearch . '%');
        }

        $products = $q->paginate(5);

        $category = Catergory::all();

        $supplier = Supplier::all();

        return view('layouts.inv.product', compact('products', 'category', 'supplier'));
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

        $validated = Validator::make(
            $request->all(),
            [
                'product_name' => 'required|max:100|min:1',
                'stock' => 'required|integer|min:1',
                'selling_price' => 'required|numeric|min:0.01',
                'buying_price' => 'required|numeric|min:0.01',
                'category_id' => 'required|integer',
                'supplier_id' => 'required|integer',
                'unit' => 'required|string|in:pc,pack,box,bottle,can,jar,bag,roll,carton',
                'image' => 'image|mimes:jpeg,png,jpg|max:10240',
            ],
            [
                'product_name.required' => 'Name is Required',
                'stock.required' => 'Quantity is Required',
                'selling_price.required' => 'Price is Required',
                'buying_price.required' => 'Buying Price is Required',
                'category_id.required' => 'Category is Required',
                'supplier_id.required' => 'Supplier is Required',
                'unit.required' => 'Unit is Required',
                'image.image' => 'Must be an image',
                'image.mimes' => 'Must be an extension of (jpeg,png,jpg)',
                'image.max' => 'Image is too Big (max upload size: 10 Mb)',
                'stock.integer' => 'Quantity must be a Number',
                'selling_price.numeric' => 'Price must be a Number',
                'buying_price.numeric' => 'Buying Price must be a Number',
                'stock.min' => 'Quantity (min:1)',
                'selling_price.min' => 'Price (min:0.01)',
                'buying_price.min' => 'Buying Price (min:0.01)',
            ],
        );

        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validated->errors()]);
        }

        try {
            if ($request->hasFile('image')) {
                $image_path = $request->file('image')->store('ProductsImg', 'public');
            } else {
                $image_path = 'ProductsImg/default.png';
            }

            $product = Product::create([
                'product_name' => $request->product_name,
                'image' => $image_path,
                'buying_price' => $request->buying_price,
                'selling_price' => $request->selling_price,
                'stocks' => $request->stock,
                'unit' => $request->unit,
                'catergory_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'barcode' => generateUniqueBarcode(),
            ]);

            return response()->json(['status' => 'success', $product]);
        } catch (\Exception $e) {
            return response()->json([[$e->getMessage()]]);
        }
    }

    public function edit(Request $request)
    {
        $existingProduct = Product::find($request->id);


        if (
            empty($request->image) &&
            $existingProduct->product_name == $request->product_name &&
            $existingProduct->stocks == $request->stock &&
            $existingProduct->selling_price == $request->selling_price &&
            $existingProduct->buying_price == $request->buying_price &&
            $existingProduct->catergory_id == $request->category_id &&
            $existingProduct->supplier_id == $request->supplier_id &&
            $existingProduct->unit == $request->unit
        ) {
            return response()->json(['status' => 'nothing']);
        }

        $validated = Validator::make(
            $request->all(),
            [
                'product_name' => 'required|max:100|min:1',
                'stock' => 'required|integer|min:1',
                'selling_price' => 'required|numeric|min:0.01',
                'buying_price' => 'required|numeric|min:0.01',
                'category_id' => 'required|integer',
                'supplier_id' => 'required|integer',
                'unit' => 'required|string|in:pc,pack,box,bottle,can,jar,bag,roll,carton',
                'image' => 'image|mimes:jpeg,png,jpg|max:10240',
            ],
            [
                'product_name.required' => 'Name is Required',
                'stock.required' => 'Quantity is Required',
                'selling_price.required' => 'Price is Required',
                'buying_price.required' => 'Buying Price is Required',
                'category_id.required' => 'Category is Required',
                'supplier_id.required' => 'Supplier is Required',
                'unit.required' => 'Unit is Required',
                'image.image' => 'Must be an image',
                'image.mimes' => 'Must be an extension of (jpeg,png,jpg)',
                'image.max' => 'Image is too Big (max upload size: 10 Mb)',
                'stock.integer' => 'Quantity must be a Number',
                'selling_price.numeric' => 'Price must be a Number',
                'buying_price.numeric' => 'Buying Price must be a Number',
                'stock.min' => 'Quantity (min:1)',
                'selling_price.min' => 'Price (min:0.01)',
                'buying_price.min' => 'Buying Price (min:0.01)',
            ],
        );

        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validated->errors()]);
        }

        try {
            $image_path = null;
            if ($request->hasFile('image')) {
                $image_path = $request->file('image')->store('ProductsImg', 'public');
            }

            $updateData = [
                'product_name' => $request->product_name,
                'stocks' => $request->stock,
                'buying_price' => $request->buying_price,
                'selling_price' => $request->selling_price,
                'catergory_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'image' => $image_path,
                'unit' => $request->unit,
            ];

            if (empty($image_path)) {
                unset($updateData['image']);
            }

            $editProduct = Product::where('id', $request->id)->update($updateData);

            return response()->json(['status' => 'success', 'data' => $editProduct]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function getProductData($id)
    {
        $productData = Product::leftJoin('catergories', 'products.catergory_id', '=', 'catergories.id')
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
                return response()->json(['status' => 'success', $product]); //just for console :)
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong.'], 500); //just for console :)
        }
    }

    public function addCategory(Request $request)
    {

        $validated = Validator::make(
            $request->all(),
            [
                'category' => 'required'
            ],
            [
                'category.required' => 'Please Input Data'
            ]
        );

        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validated->errors()]);
        }

        try {

            $category = Catergory::create([
                'name' => $request->category,
            ]);
            return response()->json(['status' => 'success', $category]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', $e->getMessage()]);
        }
    }

    public function deleteCategory(Request $request)
    {
        try {
            Product::where('catergory_id', $request->ids)->update(['catergory_id' => null]);
            $deleteCategory = Catergory::where('id', $request->ids)->delete();
            if ($deleteCategory) {
                return response()->json(['status' => 'success', $deleteCategory]);
            }

        } catch (\Exception $e) {
            // return response()->json(['error' => 'Something went wrong.'], 500);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}