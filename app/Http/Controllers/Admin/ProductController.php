<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
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
        $product = new Product();
        $products = $product->showAll();
        return view('admin.product', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create new obj
        $product = new Product();
        $product->setName($request->name);
        $product->setCategory($request->category);
        $product->setPrice($request->price);
        $product->setImage($request->image);
        $product->setDescription($request->description);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('products', $imageName, 'public');
            $product->setImage($imageName);
        }

        // Add new column
        $isAdded = $product->insert();
        // Finally
        return redirect(route('admin.product.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $product = (new Product)->get($id);

        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['error' => 'product not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->id === $id) {
            // Create new obj
            $product = new Product();
            $product->setId($id);
            $product->setName($request->name);
            $product->setCategory($request->category);
            $product->setPrice($request->price);
            $product->setImage($request->image);
            $product->setDescription($request->description);

            // Update this column
            $isUpdated = $product->edit();
        } else {
            dd("update ProductController error");
        }
        // Finally
        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        (new Product)->del($id);
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}
