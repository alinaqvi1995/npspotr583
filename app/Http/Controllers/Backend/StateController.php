<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class StateController extends Controller
{
    public function index()
    {
        $states = State::latest()->paginate(10);
        return view('dashboard.states.index', compact('states'));
    }

    public function create()
    {
        return view('dashboard.states.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_name'       => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255|unique:states,slug',
            'short_title'      => 'nullable|string|max:255',
            'banner_image'     => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
            'heading_one'      => 'nullable|string|max:255',
            'description_one'  => 'nullable|string',
            'image_one'        => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
            'heading_two'      => 'nullable|string|max:255',
            'description_two'  => 'nullable|string',
            'image_two'        => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
            'heading_three'    => 'nullable|string|max:255',
            'description_three'=> 'nullable|string',
            'image_three'      => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
            'heading_four'     => 'nullable|string|max:255',
            'description_four' => 'nullable|string',
            'image_four'       => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
        ]);

        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->state_name);

        // Upload images
        $imageFields = ['banner_image', 'image_one', 'image_two', 'image_three', 'image_four'];
        $images = $this->handleImageUploads($request, $imageFields);

        State::create(array_merge($request->only([
            'state_name', 'short_title', 'heading_one', 'description_one',
            'heading_two', 'description_two', 'heading_three', 'description_three',
            'heading_four', 'description_four'
        ]), [
            'slug' => $slug,
        ], $images));

        return redirect()->route('states.index')->with('success', 'State added successfully.');
    }

    public function edit($id)
    {
        $state = State::findOrFail($id);
        return view('dashboard.states.edit', compact('state'));
    }

    public function update(Request $request, $id)
    {
        $state = State::findOrFail($id);

        $request->validate([
            'state_name'       => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255|unique:states,slug,' . $state->id,
            'short_title'      => 'nullable|string|max:255',
            'banner_image'     => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
            'heading_one'      => 'nullable|string|max:255',
            'description_one'  => 'nullable|string',
            'image_one'        => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
            'heading_two'      => 'nullable|string|max:255',
            'description_two'  => 'nullable|string',
            'image_two'        => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
            'heading_three'    => 'nullable|string|max:255',
            'description_three'=> 'nullable|string',
            'image_three'      => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
            'heading_four'     => 'nullable|string|max:255',
            'description_four' => 'nullable|string',
            'image_four'       => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
        ]);

        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->state_name);

        // Upload or retain existing images
        $imageFields = ['banner_image', 'image_one', 'image_two', 'image_three', 'image_four'];
        $images = $this->handleImageUploads($request, $imageFields, $state);

        $state->update(array_merge($request->only([
            'state_name', 'short_title', 'heading_one', 'description_one',
            'heading_two', 'description_two', 'heading_three', 'description_three',
            'heading_four', 'description_four'
        ]), [
            'slug' => $slug,
        ], $images));

        return redirect()->route('states.index')->with('success', 'State updated successfully.');
    }

    public function destroy($id)
    {
        $state = State::findOrFail($id);

        // Delete associated images
        $imageFields = ['banner_image', 'image_one', 'image_two', 'image_three', 'image_four'];
        foreach ($imageFields as $field) {
            if ($state->$field && File::exists(public_path($state->$field))) {
                File::delete(public_path($state->$field));
            }
        }

        $state->delete();

        return redirect()->route('states.index')->with('success', 'State deleted successfully.');
    }

    /**
     * Handle multiple image uploads and optionally replace old ones.
     */
    private function handleImageUploads(Request $request, array $fields, $model = null)
    {
        $images = [];

        foreach ($fields as $field) {
            $images[$field] = $model ? $model->$field : null;

            if ($request->hasFile($field)) {
                // Delete old file if exists
                if ($model && $model->$field && File::exists(public_path($model->$field))) {
                    File::delete(public_path($model->$field));
                }

                // Save new file
                $file = $request->file($field);
                $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('state_images'), $filename);
                $images[$field] = 'state_images/' . $filename;
            }
        }

        return $images;
    }
}
