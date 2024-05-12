<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PO\PurchaseOrder;
use App\Models\PO\QualityReports;
use Illuminate\Support\Facades\Validator;
use App\Mail\ReturnShipmentMail;
use Illuminate\Support\Facades\Mail;
use Auth;

class QirController extends Controller
{
    public function index()
    {
        $PoNullInQR = PurchaseOrder::leftJoin('quality_reports', 'purchase_orders.id', '=', 'quality_reports.po_id')
            ->leftJoin('suppliers', 'purchase_orders.supplier_id', '=', 'suppliers.id')
            ->whereNull('quality_reports.po_id')
            ->where('purchase_orders.status', '=', 'approved')
            ->select('purchase_orders.*', 'suppliers.company_name')
            ->get();

        $QualityReportData = QualityReports::join('employees', 'quality_reports.inspector_id', '=', 'employees.id')
            ->selectRaw('quality_reports.*, employees.first_name, employees.last_name, DATE(quality_reports.created_at) AS report_date')
            ->get();


        return view('layouts.po.Qir', compact('PoNullInQR', 'QualityReportData'));
        // return response()->json($QualityReportData);
    }

    public function addQualitycheck(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'POF' => 'required',
            'status' => 'required|in:Passed,Failed',
            'pdf_path' => 'required|mimes:pdf',
            'description' => 'required|min:10',
        ], [
            'POF.required' => 'Purchase Order File is required',
            'status.required' => 'Status is required',
            'pdf_path.required' => 'Quality Inspection Report File is required',
            'description.required' => 'Short Description is required',
            'description.min' => 'Description is too short (min: 10)'
        ]);

        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validated->errors()]);
        }

        try {
            $inspector_id = Auth::user()->id;

            $pdf_path = $request->file('pdf_path')->store('QIR', 'public');

            $QP = QualityReports::create([
                'inspector_id' => $inspector_id,
                'po_id' => $request->POF,
                'reports_pdf_path' => $pdf_path,
                'status' => $request->status,
                'description' => $request->description
            ]);

            return response()->json(['status' => 'success', 'data' => $QP]);

        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }

    }

    public function download($id)
    {
        $pdf = QualityReports::select('reports_pdf_path')
            ->where('id', '=', $id)
            ->first();
        $file = public_path('storage/' . $pdf->reports_pdf_path);
        return response()->download($file);
    }

    public function getItem($id)
    {
        $qrData = QualityReports::join('purchase_orders', 'quality_reports.po_id', '=', 'purchase_orders.id')
            ->join('suppliers', 'purchase_orders.supplier_id', '=', 'suppliers.id')
            ->where('quality_reports.id', '=', $id)
            ->select('quality_reports.*', 'suppliers.company_name')
            ->get();
        return response()->json(['status' => 'success', 'data' => $qrData]);
    }

    public function updateReport(Request $request)
    {
        $qr = QualityReports::findOrFail($request->qrID);

        if (
            ($request->editPOF === null && $request->editpdf_path === null) &&
            ($qr->status === $request->editstatus && $qr->description === $request->editdescription)
        ) {
            return response()->json(['status' => 'nothing', 'message' => 'Nothing to update']);
        }

        $validated = Validator::make($request->all(), [
            'editstatus' => 'required|in:Passed,Failed',
            'editpdf_path' => 'mimes:pdf',
            'editdescription' => 'required|min:10',
        ], [
            'editstatus.required' => 'Status is required',
            'editdescription.required' => 'Short Description is required',
            'editdescription.min' => 'Description is too short (min: 10)',
            'editpdf_path.mimes' => 'File must be a PDF'
        ]);

        if ($validated->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validated->errors()]);
        }

        try {
            $inspector = Auth::user()->id;
            $updateData = [
                'inspector_id' => $inspector,
                'status' => $request->editstatus,
                'description' => $request->editdescription,
            ];

            if ($request->hasFile('editpdf_path')) {
                $pdf_path = $request->file('editpdf_path')->store('QIR', 'public');
                $updateData['reports_pdf_path'] = $pdf_path;
            }

            if (!empty($request->editPOF)) {
                $updateData['po_id'] = $request->editPOF;
            }

            $updatedDATA = QualityReports::where('id', $request->qrID)->update($updateData);

            return response()->json(['status' => 'success', 'data' => $updatedDATA]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong.']);
        }

    }

    public function deleteReport(Request $request)
    {
        try {
            $DeleteQR = QualityReports::where('id', $request->itemID)->delete();
            if ($DeleteQR) {
                return response()->json(['status' => 'success', $DeleteQR]);//just for console :)
            }

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);//just for console :)
        }
    }

    public function requestReturn($id)
    {

        try {
            QualityReports::where('id', $id)->update([
                'isEmailed_status' => 'send',
            ]);

            $send = QualityReports::join('purchase_orders', 'quality_reports.po_id', '=', 'purchase_orders.id')
                ->join('suppliers', 'purchase_orders.supplier_id', '=', 'suppliers.id')
                ->select('purchase_orders.pdf_path', 'quality_reports.*', 'suppliers.email', 'suppliers.company_name')
                ->where('quality_reports.id', '=', $id)
                ->first();

            $description = $send->description;
            $report_path = public_path('storage/' . $send->reports_pdf_path);
            $po_path = public_path('storage/' . $send->pdf_path);
            $supplier = $send->company_name;
            Mail::to($send->email)->send(new ReturnShipmentMail($description, $report_path, $po_path, $supplier));
            return response()->json(['status' => 'success', 'msg' => $send]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

    }
}
