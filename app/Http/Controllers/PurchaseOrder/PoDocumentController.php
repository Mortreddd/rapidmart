<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PO\QualityReports;
use App\Models\PO\PurchaseOrder;
use Validator;
use Illuminate\Support\Facades\Storage;

class PoDocumentController extends Controller
{
    public function index(Request $request)
    {
        $query = QualityReports::join('employees', 'quality_reports.inspector_id', '=', 'employees.id')
            ->join('purchase_orders', 'quality_reports.po_id', '=', 'purchase_orders.id')
            ->selectRaw('quality_reports.*, employees.first_name, employees.last_name, DATE(quality_reports.created_at) AS report_date, purchase_orders.total_cost')
            ->where('quality_reports.isEmailed_status', 'send');

        if ($request->has('status') && $request->filled('status')) {
            switch ($request->status) {
                case 'passed':
                    $query->where('quality_reports.status', 'passed');
                    break;
                case 'failed':
                    $query->where('quality_reports.status', 'failed');
                    break;
                default:
                    break;
            }
        }


        if ($request->has(['start_date', 'end_date']) && $request->filled(['start_date', 'end_date'])) {
            $validator = Validator::make($request->all(), [
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            $startDate = $request->start_date;
            $endDate = $request->end_date;

            $query->whereBetween('quality_reports.created_at', [$startDate, $endDate]);
        }

        $POD = $query->paginate(10);

        return view('layouts.po.PoDocumentation', compact('POD'));
    }


    public function getPODescription(Request $request)
    {
        $dataId = $request->poID;

        $qualityReports = QualityReports::join('purchase_orders', 'quality_reports.po_id', '=', 'purchase_orders.id')
            ->join('employees AS inspectors', 'quality_reports.inspector_id', '=', 'inspectors.id')
            ->join('suppliers', 'purchase_orders.supplier_id', '=', 'suppliers.id')
            ->join('employees AS creators', 'purchase_orders.creator_id', '=', 'creators.id')
            ->select(
                'quality_reports.*',
                'purchase_orders.*',
                'inspectors.first_name AS inspector_first_name',
                'inspectors.last_name AS inspector_last_name',
                'inspectors.id AS inspector_id',
                'creators.first_name AS creator_first_name',
                'creators.last_name AS creator_last_name',
                'creators.id AS creator_id',
                'suppliers.company_name'
            )
            ->where('quality_reports.id', '=', $dataId)
            ->get();


        return response()->json(['data' => $qualityReports]);
    }


    public function deleteDocument(Request $request)
    {
        $ids = $request->ids;
        $poIds = QualityReports::whereIn('id', $ids)->pluck('po_id')->toArray();
        $purchaseOrders = PurchaseOrder::whereIn('id', $poIds)->get();
        $qualityReports = QualityReports::whereIn('id', $ids)->get();

        foreach ($purchaseOrders as $PO) {
            Storage::disk('public')->delete($PO->pdf_path);
        }

        foreach ($qualityReports as $qualityReport) {
            Storage::disk('public')->delete($qualityReport->reports_pdf_path);
        }


        QualityReports::whereIn('id', $ids)->delete();
        PurchaseOrder::whereIn('id', $poIds)->delete();
        return response()->json(['status' => 'success']);

    }
}