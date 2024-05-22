<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use App\Models\PO\PurchaseOrder;
use Illuminate\Http\Request;
use App\Mail\PurchaseOrderMail;
use Illuminate\Support\Facades\Mail;
use Validator;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->supplier !== null || $request->datasearch !== null) {

            $validator = Validator::make($request->query(), [
                'supplier' => 'nullable|numeric|min:1',
                'datasearch' => 'nullable|numeric|min:1',
            ], [
                'supplier.min' => 'Must be a Valid Supplier',
                'datasearch' => 'Must be a Valid ID'

            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
        }

        $PRQuery = PurchaseOrder::join('suppliers', 'purchase_orders.supplier_id', '=', 'suppliers.id')
            ->select('purchase_orders.*', 'suppliers.company_name')
            ->where('status', '=', 'onPr')
            ->when($request->supplier !== null, function ($query) use ($request) {
                return $query->where('purchase_orders.supplier_id', $request->supplier);
            })
            ->when($request->datasearch !== null, function ($query) use ($request) {
                return $query->where('purchase_orders.id', $request->datasearch);
            });

        $PR = $PRQuery->paginate(10);

        $SuppliersOnPR = PurchaseOrder::join('suppliers', 'purchase_orders.supplier_id', '=', 'suppliers.id')
            ->select('suppliers.company_name', 'suppliers.id')
            ->where('status', 'onPr')
            ->distinct('purchase_orders.supplier_id')
            ->get();

        $muvar = 3006;
        return view('layouts.po.InvoiceApproval', compact('PR', 'SuppliersOnPR', 'muvar'));
    }

    public function sendmail($id)
    {
        try {
            PurchaseOrder::where('id', $id)->update([
                'status' => 'approved',
            ]);

            $send = PurchaseOrder::join('suppliers', 'purchase_orders.supplier_id', '=', 'suppliers.id')
                ->select('purchase_orders.*', 'suppliers.*')
                ->where('purchase_orders.id', '=', $id)
                ->first();

            $subject = $send->subject;
            $path = public_path('storage/' . $send->pdf_path);
            $supplier = $send->company_name;
            Mail::to($send->email)->send(new PurchaseOrderMail($subject, $path, $supplier));
            return response()->json(['status' => 'success', 'msg' => $send]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

    }
}
