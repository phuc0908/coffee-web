<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Report;
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
        $report = new report();
        $reports = $report->showAll();
        return view('admin.report', compact('reports', 'materials', 'reports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $report = new Report();

        $report->setTotalPrice(1.1);
        $report->setreport($request->report);
        $report->setSupplier($request->supplier);

        $isAdded = $report->insert($request->type);
        $this->storeDetail($request);
        // Finally
        return redirect(route('admin.report.index'));
    }

    public function storeDetail(Request $request)
    {
        dd($request->materials[0]);
        $report_detail = new ReportDetail();



        $isAdded = $report_detail->insert();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
