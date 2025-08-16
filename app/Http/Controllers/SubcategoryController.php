<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class SubcategoryController extends Controller
{
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

        $subcategory = Subcategory::create($request->only([
            'category_id',
            'name',
            'description',
            'status'
        ]));

        activity('subcategory')
            ->causedBy(Auth::user())
            ->performedOn($subcategory)
            ->withProperties([
                'new_values' => $subcategory->getAttributes(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'location' => [
                    'city' => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country' => $request->header('X-Geo-Country'),
                ],
            ])
            ->log('Subcategory created');

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

        $original = $subcategory->getOriginal();

        $subcategory->update($request->only([
            'category_id',
            'name',
            'description',
            'status'
        ]));

        activity('subcategory')
            ->causedBy(Auth::user())
            ->performedOn($subcategory)
            ->withProperties([
                'old_values' => $original,
                'new_values' => $subcategory->getAttributes(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'location' => [
                    'city' => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country' => $request->header('X-Geo-Country'),
                ],
            ])
            ->log('Subcategory updated');

        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(Subcategory $subcategory)
    {
        $attributes = $subcategory->getAttributes();
        $subcategory->delete();

        activity('subcategory')
            ->causedBy(Auth::user())
            ->performedOn($subcategory)
            ->withProperties([
                'old_values' => $attributes,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'location' => [
                    'city' => request()->header('X-Geo-City'),
                    'region' => request()->header('X-Geo-Region'),
                    'country' => request()->header('X-Geo-Country'),
                ],
            ])
            ->log('Subcategory deleted');

        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
