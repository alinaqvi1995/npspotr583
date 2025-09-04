<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $permissions = [
            'index'   => 'view-services',
            'store'   => 'create-services',
            'update'  => 'edit-services',
            'destroy' => 'delete-services',
        ];

        foreach ($permissions as $method => $permission) {
            $this->middleware("permission:{$permission}")->only($method);
        }
    }

    public function index()
    {
        $services = Service::latest()->get();
        return view('dashboard.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('dashboard.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'heading_one'     => 'required|string|max:255',
            'description_one' => 'required|string',
            'category_id'     => 'nullable|exists:categories,id',
            'subcategory_id'  => 'nullable|exists:subcategories,id',
            'image_one'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_two'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_three'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_four'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageFields = ['image_one', 'image_two', 'image_three', 'image_four'];
        $images = [];

        foreach ($imageFields as $field) {
            $images[$field] = null;
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('service_images'), $filename);
                $images[$field] = 'service_images/' . $filename;
            }
        }

        Service::create([
            'title'                 => $request->title,
            'heading_one'           => $request->heading_one,
            'description_one'       => $request->description_one,
            'image_one'             => $images['image_one'],
            'heading_two'           => $request->heading_two,
            'description_two'       => $request->description_two,
            'description_two_one'   => $request->description_two_1,
            'description_two_two'   => $request->description_two_2,
            'description_two_three' => $request->description_two_3,
            'description_two_four'  => $request->description_two_4,
            'description_two_five'  => $request->description_two_5,
            'description_two_six'   => $request->description_two_6,
            'description_two_seven' => $request->description_two_7,
            'image_two'             => $images['image_two'],
            'heading_three'         => $request->heading_three,
            'description_three'     => $request->description_three,
            'image_three'           => $images['image_three'],
            'image_four'            => $images['image_four'],
            'category_id'           => $request->category_id,
            'subcategory_id'        => $request->subcategory_id,
            'created_by'            => Auth::id(),
            'status'                => $request->status ?? 1,
            'ques_one'              => $request->ques_1,
            'ans_one'               => $request->ans_1,
            'ques_two'              => $request->ques_2,
            'ans_two'               => $request->ans_2,
            'ques_three'            => $request->ques_3,
            'ans_three'             => $request->ans_3,
            'ques_four'             => $request->ques_4,
            'ans_four'              => $request->ans_4,
            'ques_five'             => $request->ques_5,
            'ans_five'              => $request->ans_5,
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        $subcategories = Subcategory::where('category_id', $service->category_id)->get();

        return view('dashboard.services.edit', compact('service', 'categories', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title'           => 'required|string|max:255',
            'heading_one'     => 'required|string|max:255',
            'description_one' => 'required|string',
            'category_id'     => 'nullable|exists:categories,id',
            'subcategory_id'  => 'nullable|exists:subcategories,id',
            'image_one'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_two'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_three'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_four'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageFields = ['image_one', 'image_two', 'image_three', 'image_four'];
        $images = [];

        foreach ($imageFields as $field) {
            $images[$field] = $service->$field;
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('service_images'), $filename);
                $images[$field] = 'service_images/' . $filename;
            }
        }

        $service->update([
            'title'                 => $request->title,
            'heading_one'           => $request->heading_one,
            'description_one'       => $request->description_one,
            'image_one'             => $images['image_one'],
            'heading_two'           => $request->heading_two,
            'description_two'       => $request->description_two,
            'description_two_one'   => $request->description_two_one,
            'description_two_two'   => $request->description_two_two,
            'description_two_three' => $request->description_two_three,
            'description_two_four'  => $request->description_two_four,
            'description_two_five'  => $request->description_two_five,
            'description_two_six'   => $request->description_two_six,
            'description_two_seven' => $request->description_two_seven,
            'image_two'             => $images['image_two'],
            'heading_three'         => $request->heading_three,
            'description_three'     => $request->description_three,
            'image_three'           => $images['image_three'],
            'image_four'            => $images['image_four'],
            'category_id'           => $request->category_id,
            'subcategory_id'        => $request->subcategory_id,
            'status'                => $request->status ?? 1,
            'ques_one'              => $request->ques_one,
            'ans_one'               => $request->ans_one,
            'ques_two'              => $request->ques_two,
            'ans_two'               => $request->ans_two,
            'ques_three'            => $request->ques_three,
            'ans_three'             => $request->ans_three,
            'ques_four'             => $request->ques_four,
            'ans_four'              => $request->ans_four,
            'ques_five'             => $request->ques_five,
            'ans_five'              => $request->ans_five,
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
