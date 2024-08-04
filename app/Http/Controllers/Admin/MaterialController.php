<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $material = new Material();
        $materials = $material->showAll();
        return view('admin.material', compact('materials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create new obj
        $material = new Material();
        $material->setName($request->name);
        $material->setCategory($request->category);
        $material->setImage($request->image);
        $material->setUnit($request->unit);

        // Add new column
        $isAdded = $material->insert();
        // Finally
        return redirect(route('admin.material.index'));
    }

    /**     
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $material = (new Material)->get($id);

        if ($material) {
            return response()->json($material);
        } else {
            return response()->json(['error' => 'Material not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Create new obj
        $material = new Material();
        $material->setId($id);
        $material->setName($request->name);
        $material->setCategory($request->category);
        $material->setImage($request->image);
        $material->setUnit($request->unit);

        // Update this column
        $isUpdated = $material->edit();
        // Finally
        return redirect(route('admin.material.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material = new Material();
        $material->setId($id);
        $isDeleted =  $material->del($id);
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
        // return redirect()->back()->with('alertDelete', 'Xóa thành công');
    }
}
