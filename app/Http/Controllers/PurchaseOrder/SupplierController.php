<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\CreateSupplierRequest;
use App\Http\Requests\Supplier\EditSupplierRequest;
use Illuminate\Http\Request;
use App\Models\PO\Supplier;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    public function index()
    {
        $showSupplier = Supplier::orderBy('id', 'desc')->paginate(9);
        return view('layouts.po.supplier', compact('showSupplier'));
    }


    // * SEPERATE THE VALIDATION METHOD FOR READABLITIY
    // * CREATED A CUSTOM REQUEST FOR VALIDATION
    // * TRY GUARD CLAUSE APPROACH FOR THIS METHOD
    // * CREATING A CUSTOM REQUEST FOR VALIDATION WILL AUTOMATICALLY RESPONSE A JSON
    public function store(CreateSupplierRequest $request)
    {
        // * NO NEED TO MAKE AN ELSE STATEMENT FOR THIS CONDITION
        $picture_path = $request->file('picture')->store('SupplierImg', 'public');

        return Response::json(['status' => 'success',
                    Supplier::create([
                        'company_name' => $request->company_name,
                        'address' => $request->address,
                        'email' => $request->email,
                        'description' => $request->description,
                        'picture' => $picture_path ?? 'SupplierImg/default.png',
                    ])
                ], status: 200);

        // * BY DEFAULT UNSUCCESFULL REQUEST WILL RETURN AN STATUS CODE 500
        // * NO NEED FOR TRY, CATCH BLOCK  
    }

    public function delete($id)
    {
        // * ALSO DELETE THE PICTURE ALONG WITH THE SUPPLIER
        // * example: Storage::delete('public/'.$supplier->picture); THE DIRECTORY OF THE IMAGE


        return Response::json(['status' => 'success', 
                        Supplier::find($id)->delete()
                    ], 
                status: 200);
    }



    // * SEPERATE THE VALIDATION METHOD FOR READABLITIY
    // * CREATED A CUSTOM REQUEST FOR VALIDATION
    // * TRY GUARD CLAUSE APPROACH FOR THIS METHOD
    // * CREATING A CUSTOM REQUEST FOR VALIDATION WILL AUTOMATICALLY RESPONSE A JSON
    public function edit(EditSupplierRequest $request)
    {

        // ? ALSO DELETE THE OLD PICTURE IF THE PICTURE IS UPDATED

        $picture_path = $request->file('picture')->store('SupplierImg', 'public');

        return Response::json(['status' => 'success', 
                        Supplier::find($request->id)
                            ->update([
                                'company_name' => $request->company_name,
                                'address' => $request->address,
                                'description' => $request->description,
                                'picture' => $picture_path ?? 'SupplierImg/default.png',
                            ])
                    ], status: 200);
    }
}