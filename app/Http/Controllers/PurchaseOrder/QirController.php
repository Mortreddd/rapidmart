<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PO\PurchaseOrder;
use App\Models\PO\QualityReports;
use Illuminate\Support\Facades\Validator;
use App\Mail\ReportShipmentMail;
use Illuminate\Support\Facades\Mail;
use Auth;
use Carbon\Carbon;
use DB;

class QirController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $date = $request->date;

        $PoNullInQR = PurchaseOrder::leftJoin('suppliers', 'purchase_orders.supplier_id', '=', 'suppliers.id')
            ->where('purchase_orders.status', '=', 'approved')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('quality_reports')
                    ->whereRaw('quality_reports.po_id = purchase_orders.id');
            })
            ->select('suppliers.company_name', 'purchase_orders.*')
            ->get();




        $QualityReportData = QualityReports::join('employees', 'quality_reports.inspector_id', '=', 'employees.id')
            ->selectRaw('quality_reports.*, employees.first_name, employees.last_name, DATE(quality_reports.created_at) AS report_date')
            ->whereNull('quality_reports.isEmailed_status');

        if (!empty($status)) {
            $QualityReportData = $QualityReportData->where('quality_reports.status', $status);
        }

        if (!empty($date) && $date != 'all') {
            switch ($date) {
                case 'today':
                    $QualityReportData = $QualityReportData->whereDate('quality_reports.created_at', Carbon::today());
                    break;
                case 'yesterday':
                    $QualityReportData = $QualityReportData->whereDate('quality_reports.created_at', Carbon::yesterday());
                    break;
                case 'this_week':
                    $QualityReportData = $QualityReportData->whereBetween('quality_reports.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'last_week':
                    $QualityReportData = $QualityReportData->whereBetween('quality_reports.created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]);
                    break;
                case 'this_month':
                    $QualityReportData = $QualityReportData->whereMonth('quality_reports.created_at', Carbon::now()->month);
                    break;
                case 'last_month':
                    $QualityReportData = $QualityReportData->whereMonth('quality_reports.created_at', Carbon::now()->subMonth()->month);
                    break;
                case 'this_year':
                    $QualityReportData = $QualityReportData->whereYear('quality_reports.created_at', Carbon::now()->year);
                    break;
                case 'last_year':
                    $QualityReportData = $QualityReportData->whereYear('quality_reports.created_at', Carbon::now()->subYear()->year);
                    break;
            }
        }




        $QualityReportData = $QualityReportData->orderBy('report_date', 'desc')->paginate(10);

        return view('layouts.po.Qir', compact('PoNullInQR', 'QualityReportData'));
        // return response()->json($PoNullInQR);
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

            $type = 'return';
            $description = $send->description;
            $report_path = public_path('storage/' . $send->reports_pdf_path);
            $po_path = public_path('storage/' . $send->pdf_path);
            $supplier = $send->company_name;
            Mail::to($send->email)->send(new ReportShipmentMail($description, $report_path, $po_path, $supplier, $type));
            return response()->json(['status' => 'success', 'msg' => $send]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

    }


    public function releaseOrder($id)
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

            $type = 'release';

            $description = $send->description;
            $report_path = public_path('storage/' . $send->reports_pdf_path);
            $po_path = public_path('storage/' . $send->pdf_path);
            $supplier = $send->company_name;
            Mail::to($send->email)->send(new ReportShipmentMail($description, $report_path, $po_path, $supplier, $type));
            return response()->json(['status' => 'success', 'msg' => $send]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

    }
}
