<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use App\Models\PO\PurchaseOrder;
use App\Models\PO\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Storage;


class PurchaseOrderController extends Controller
{
    public function index()
    {
        $selectSupplier = Supplier::orderBy('company_name', 'asc')->get();
        return view('layouts.po.PurchaseOrder', compact('selectSupplier'));
    }

    public function create(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'subject' => 'required|string|max:1000|min:10',
                'supplier' => 'required|integer',
                'pdf_path' => 'required|mimes:pdf',
                'total_cost' => 'required|numeric|min:0.01',
            ],
            [
                'subject.required' => 'Email Subject is required',
                'subject.string' => 'Email Subject must be a Word',
                'subject.max' => 'Email Subject is too long (max: 1000)',
                'subject.min' => 'Email Subject is too short (min: 10)',
                'supplier.required' => 'Please choose a Supplier...',
                'supplier.integer' => 'Must be an INT',
                'pdf_path.required' => 'File is required',
                'total_cost.required' => 'Total Cost of the Order is required',
                'total_cost.numeric' => 'Must be a numeric value..',
                'total_cost.min' => 'Minimum Value is 1 cent..',
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
                    'creator_id' => Auth::user()->id,
                    'subject' => $request->subject,
                    'supplier_id' => $supplier,
                    'pdf_path' => $pdf_path,
                    'status' => $status,
                    'total_cost' => $request->total_cost,
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
            ->where('creator_id', '=', Auth::user()->id)
            ->get();
        return response()->json(['PR' => $pr]);
    }

    public function download($id)
    {
        $pdf = PurchaseOrder::select('pdf_path')
            ->where('id', '=', $id)
            ->first();
        $file = public_path('storage/' . $pdf->pdf_path);
        return response()->download($file);
    }
    public function deletePO($id)
    {
        try {
            $deleteFile = PurchaseOrder::find($id, ['pdf_path']);
            Storage::disk('public')->delete($deleteFile->pdf_path);
            $deleteSupplier = PurchaseOrder::where('id', $id)->delete();
            if ($deleteSupplier) {
                return response()->json(['status' => 'success', $deleteSupplier]);//just for console :)
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e]);//just for console :)
        }
    }
}