<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PO\Supplier;
use Illuminate\Support\Facades\Validator;




class SupplierController extends Controller
{
    public function index()
    {
        $showSupplier = Supplier::orderBy('id', 'desc')->paginate(9);
        return view('layouts.po.supplier', compact('showSupplier'));
    }

    public function storeSupplier(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'company_name' => 'required|max:255',
            'address' => 'required',
            'email' => 'required|email|max:255|unique:suppliers,email',
            'description' => 'required|min:10',
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
            'description.min' => 'Company Description is to short (min:10 character)',
            'picture.image' => 'Must be an Image',
            'picture.mimes' => 'Must be an extension of (jpeg,png,jpg)',
            'picture.max' => 'Image is too Big (max upload size: 10 Mb)',

        ]);

        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validated->errors()]);
        } else {
            try {
                if ($request->hasFile('picture')) {
                    $picture_path = $request->file('picture')->store('SupplierImg', 'public');
                } else {
                    $picture_path = 'SupplierImg/default.png';
                }

                $supplier = Supplier::create([
                    'company_name' => $request->company_name,
                    'address' => $request->address,
                    'email' => $request->email,
                    'description' => $request->description,
                    'picture' => $picture_path,
                ]);
            } catch (\Exception $e) {
                // Catch any other exceptions(need to be assisted in the future...)
                return response()->json(['error' => 'Something went wrong.'], 500);//just for console :)
            }
            return response()->json(['status' => 'success', $supplier]);//just for console :)

        }


    }

    public function deleteSupplier($id)
    {
        try {
            $deleteSupplier = Supplier::where('id', $id)->delete();
            if ($deleteSupplier) {
                return response()->json(['status' => 'success', $deleteSupplier]);//just for console :)
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong.'], 500);//just for console :)
        }
    }


    public function editSupplier(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'company_name' => 'required|max:50',
            'address' => 'required',
            'description' => 'required|min:10|max:255',
            'picture' => 'image|mimes:jpeg,png,jpg|max:10240',
        ], [
            'company_name.required' => 'Name is required',
            'company_name.max' => 'Name is too long',
            'address.required' => 'Address is required',
            'description.required' => 'Company Description is required',
            'description.min' => 'Company Description is to short (min:10 character)',
            'description.max' => 'Description is to Long (max:255 character)',
            'picture.image' => 'Must be an Image',
            'picture.mimes' => 'Must be an extension of (jpeg,png,jpg)',
            'picture.max' => 'Image is too Big (max upload size: 10 Mb)',
        ]);

        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validated->errors()]);
        } else {
            try {
                if ($request->hasFile('picture')) {
                    $picture_path = $request->file('picture')->store('SupplierImg', 'public');
                }

                if (!empty($picture_path)) {
                    $Updatesupplier = Supplier::where('id', $request->id)->update([
                        'company_name' => $request->company_name,
                        'address' => $request->address,
                        'description' => $request->description,
                        'picture' => $picture_path,
                    ]);
                } else {
                    $Updatesupplier = Supplier::where('id', $request->id)->update([
                        'company_name' => $request->company_name,
                        'address' => $request->address,
                        'description' => $request->description,
                    ]);
                }



            } catch (\Exception $e) {
                // Catch any other exceptions(need to be assisted in the future...)
                return response()->json(['error' => 'Something went wrong.']);//just for console :)
            }
            return response()->json(['status' => 'success', $Updatesupplier]);//just for console :)
        }


    }
}

