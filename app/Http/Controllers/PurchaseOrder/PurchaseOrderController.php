<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use App\Models\PO\PurchaseOrder;
use App\Models\PO\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class PurchaseOrderController extends Controller
{
    public function index()
    {
        $selectSupplier = Supplier::all();
        return view('layouts.po.PurchaseOrder', compact('selectSupplier'));
    }

    public function create(Request $request)
    {
        // return response()->json(['MSG' => $request->all()]);
        $validation = Validator::make(
            $request->all(),
            [
                'subject' => 'required|string|max:1000|min:10',
                'supplier' => 'required|integer',
                'pdf_path' => 'required|mimes:pdf'
            ],
            [
                'subject.required' => 'Email Subject is required',
                'subject.string' => 'Email Subject must be a Word',
                'subject.max' => 'Email Subject is too long (max: 1000)',
                'subject.min' => 'Email Subject is too short (min: 10)',
                'supplier.required' => 'Please choose a Supplier...',
                'supplier.integer' => 'Must be an INT',
                'pdf_path.required' => 'File is required'
            ],
        );

        if ($validation->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validation->errors()]);
        } else {
            try {

                $supplier = (int) request()->get('supplier');
                $pdf_path = $request->file('pdf_path')->store('PurchaseOrderPDF', 'public');
                $status = 'onPr';

                $PO = PurchaseOrder::create([
                    'subject' => $request->subject,
                    'supplier_id' => $supplier,
                    'pdf_path' => $pdf_path,
                    'status' => $status,
                ]);

            } catch (\Exception $e) {
                return response()->json([$e->getMessage()]);
            }
            return response()->json(['status' => 'success', $PO]);


        }
    }

    public function showPR()
    {
        $pr = PurchaseOrder::join('suppliers', 'purchase_orders.supplier_id', '=', 'suppliers.id')
            ->select('purchase_orders.*', 'suppliers.company_name')
            ->where('status', '=', 'onPr')
            ->get();
        return response()->json(['PR' => $pr]);
    }

    public function download($id)
    {
        $pdf = PurchaseOrder::join('suppliers', 'purchase_orders.supplier_id', '=', 'suppliers.id')
            ->select('purchase_orders.*', 'suppliers.company_name')
            ->where('purchase_orders.id', '=', $id)
            ->first();
        $file = public_path('storage/' . $pdf->pdf_path);
        return response()->download($file);
    }
    public function deletePO($id)
    {
        try {
            $deleteSupplier = PurchaseOrder::where('id', $id)->delete();
            if ($deleteSupplier) {
                return response()->json(['status' => 'success', $deleteSupplier]);//just for console :)
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e]);//just for console :)
        }
    }
}
