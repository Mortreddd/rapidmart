<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Requests\Supplier\SupplierRequest;
// use Pest\Arch\Objects\FunctionDescription;
use App\Models\PO\supplier;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        return view('layouts.po.supplier');
    }
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'company_name' => 'required|max:255',
            'address' => 'required',
            'email' => 'required|email|max:255|unique:supplier,email',
            'description' => 'required|min:30',
            'picture' => 'image|mimes:jpeg,png,jpg|max:10240',
        ], [
            'company_name.required' => 'Name is required',
            'company_name.max' => 'Name is too long',
            'address.required' => 'Address is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email',
            'email.max' => 'Email is too long',
            'email.unique' => 'Oops! Email already taken!',
            'description.required' => 'Company Description is required',
            'description.min' => 'Company Description is to short (min:30 character)',
            'picture.image' => 'Must be an Image',
            'picture.mimes' => 'Must be an extension of (jpeg,png,jpg)',
            'picture.max' => 'Image is too Big (max upload size: 10 Mb)',

        ]);

        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validated->errors()]);
        }

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture')->store('SupplierImg');
        } else {
            $picture = 'SupplierImg/default.png';
        }

        $supplier = supplier::create([
            'company_name' => $request->company_name,
            'address' => $request->address,
            'email' => $request->email,
            'description' => $request->description,
            'picture' => $picture,
        ]);




        return response()->json(['status' => 'success', $supplier]);


    }
}

// Validation rules
// $rules = [
//     'company_name' => 'required|string|max:255',
//     'address' => 'required|string|max:255',
//     'email' => 'required|email|max:255',
//     'description' => 'nullable|string',
//     'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming picture is an image file
// ];
// Validate the request data
// $validatedData = $request->validate($rules);
// if($validatedData->)
