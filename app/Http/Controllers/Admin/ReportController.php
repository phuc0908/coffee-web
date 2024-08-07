<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Report;
use App\Models\Employee;
use App\Models\ReportDetail;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $report = new Report();
        $reports = $report->showAll();
        $material = new Material();
        $materials = $material->showAll();
        $employee = new Employee();
        $employees = $employee->showAll();
        return view('admin.report', compact('reports', 'materials', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $report = new Report();

        $report->setTotalPrice(1.1);
        $report->setEmployee($request->employee);
        $report->setSupplier($request->supplier);

        $isAdded = $report->insert($request->type);

        // REPORT DETAIL
        $id_report = $report->getIdNewest($request->type)[0]->id;
        $this->storeDetail($id_report, $request);
        // Finally
        return redirect(route('admin.report.index'));
    }

    public function storeDetail($id_report, Request $request)
    {
        $report_detail = new ReportDetail();

        $materials = $request->materials;
        $prices = $request->prices;
        $numberOfUnits = $request->numberOfUnits;

        foreach ($materials as $key => $material) {
            $price = $prices[$key];
            $numberOfUnit = $numberOfUnits[$key];

            $report_detail->setIdMaterial($material);
            $report_detail->setPrice($price);
            $report_detail->setNumberOfUnit($numberOfUnit);
            $report_detail->setIdReport($id_report);
            $report_detail->setType($request->type);
            // insert
            $isAdded = $report_detail->insert();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $report = (new Report)->get($id, $type);

        if ($report) {
            return response()->json($report);
        } else {
            return response()->json(['error' => 'report not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->id === $id) {
            $type = $request->type;
            // Create new obj
            $report = new Report();
            $report->setId($id);
            $report->setTotalPrice($request->total_price);
            $report->setEmployee($request->employee);
            $report->setSupplier($request->supplier);

            // Update this column
            $isUpdated = $report->edit($type);
        } else {
            dd("update reportController error");
        }
        // Finally
        return redirect(route('admin.report.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $type)
    {
        $report = new Report();
        $report->setId($id);
        $isDeleted = $report->del($type);
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}
