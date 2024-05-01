<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use App\Models\PO\PurchaseOrder;
use Illuminate\Http\Request;
use App\Mail\PurchaseOrderMail;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function index()
    {
        $PR = PurchaseOrder::join('suppliers', 'purchase_orders.supplier_id', '=', 'suppliers.id')
            ->select('purchase_orders.*', 'suppliers.company_name')
            ->where('status', '=', 'onPr')
            ->get();
        return view('layouts.po.InvoiceApproval', compact('PR'));
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
