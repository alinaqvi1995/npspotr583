<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $permissions = [
            'index'   => 'view-categories',
            'store'   => 'create-categories',
            'update'  => 'edit-categories',
            'destroy' => 'delete-categories',
        ];

        foreach ($permissions as $method => $permission) {
            $this->middleware("permission:{$permission}")->only($method);
        }
    }

    public function index()
    {
        $categories = Category::with('subcategories', 'creator', 'editor')->get();
        return view('dashboard.pages.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        $category = Category::create($request->only(['name', 'description', 'status']));

        Activity::create([
            'log_name'     => 'category',
            'description'  => 'Category created',
            'causer_type'  => Auth::user()::class,
            'causer_id'    => Auth::id(),
            'subject_type' => $category::class,
            'subject_id'   => $category->id,
            'properties'   => [
                'new_values' => $category->getAttributes(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'location'   => [
                    'city'   => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country'=> $request->header('X-Geo-Country'),
                ],
            ],
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        $original = $category->getOriginal();

        $category->update($request->only(['name', 'description', 'status']));

        Activity::create([
            'log_name'     => 'category',
            'description'  => 'Category updated',
            'causer_type'  => Auth::user()::class,
            'causer_id'    => Auth::id(),
            'subject_type' => $category::class,
            'subject_id'   => $category->id,
            'properties'   => [
                'old_values' => $original,
                'new_values' => $category->getAttributes(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'location'   => [
                    'city'   => $request->header('X-Geo-City'),
                    'region' => $request->header('X-Geo-Region'),
                    'country'=> $request->header('X-Geo-Country'),
                ],
            ],
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $attributes = $category->getAttributes();
        $category->subcategories()->delete();
        $category->delete();

        Activity::create([
            'log_name'     => 'category',
            'description'  => 'Category deleted',
            'causer_type'  => Auth::user()::class,
            'causer_id'    => Auth::id(),
            'subject_type' => $category::class,
            'subject_id'   => $category->id,
            'properties'   => [
                'old_values' => $attributes,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'location'   => [
                    'city'   => request()->header('X-Geo-City'),
                    'region' => request()->header('X-Geo-Region'),
                    'country'=> request()->header('X-Geo-Country'),
                ],
            ],
        ]);

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
