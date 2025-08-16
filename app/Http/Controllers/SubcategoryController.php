<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view-subcategories')->only(['index']);
    //     $this->middleware('permission:create-subcategories')->only(['store']);
    //     $this->middleware('permission:edit-subcategories')->only(['update']);
    //     $this->middleware('permission:delete-subcategories')->only(['destroy']);
    // }

    public function index()
    {
        $subcategories = Subcategory::with(['category', 'creator', 'editor'])->get();
        return view('admin.pages.subcategories', compact('subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:subcategories,name',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Subcategory::create($request->only([
            'category_id',
            'name',
            'description',
            'status'
        ]));

        return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:subcategories,name,' . $subcategory->id,
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $subcategory->update($request->only([
            'category_id',
            'name',
            'description',
            'status'
        ]));

        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
