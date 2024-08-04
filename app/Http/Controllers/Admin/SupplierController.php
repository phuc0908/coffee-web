<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
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
        $supplier = new Supplier();
        $suppliers = $supplier->showAll();
        return view('admin.supplier', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create new obj
        $supplier = new Supplier();
        $supplier->setName($request->name);
        $supplier->setGmail($request->gmail);
        $supplier->setPhone($request->phone);
        $supplier->setAddress($request->address);
        
        // Add new column
        $isAdded = $supplier->insert();
        // Finally
        return redirect(route('admin.supplier.index'));
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
    public function destroy(string $id)
    {
        //
    }
}
