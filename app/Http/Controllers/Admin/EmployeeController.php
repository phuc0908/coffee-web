<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = new Employee();
        $employees = $employee->showAll();
        return view('admin.employee', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create new obj
        $employee = new Employee();
        $employee->setName($request->name);
        $employee->setGender($request->gender);
        $employee->setRole($request->role);
        $employee->setPhone($request->phone);
        $employee->setAddress($request->address);
        $employee->setStatus($request->status);

        // Add new column
        $isAdded = $employee->insert();
        // Finally
        return redirect(route('admin.employee.index'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $employee = (new Employee)->get($id);

        if ($employee) {
            return response()->json($employee);
        } else {
            return response()->json(['error' => 'employee not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Create new obj
        $employee = new Employee();
        $employee->setId($request->id);
        $employee->setName($request->name);
        $employee->setGender($request->gender);
        $employee->setRole($request->role);
        $employee->setPhone($request->phone);
        $employee->setAddress($request->address);
        $employee->setStatus($request->status);

        // Update this column
        $isUpdated = $employee->edit();
        // Finally
        return redirect(route('admin.employee.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        (new Employee)->del($id);
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
        // return redirect()->back()->with('alertDelete', 'Xóa thành công');
    }
}
