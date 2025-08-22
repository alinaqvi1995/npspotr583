@extends('dashboard.includes.partial.base')
@section('title', 'Edit Service')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Service</li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data"
        id="serviceForm">
        @csrf
        @method('PUT')

        @php
            $descTwoFields = [
                'one' => 'description_two_one',
                'two' => 'description_two_two',
                'three' => 'description_two_three',
                'four' => 'description_two_four',
                'five' => 'description_two_five',
                'six' => 'description_two_six',
                'seven' => 'description_two_seven',
            ];

            $qaFields = [
                'one' => ['ques_one', 'ans_one'],
                'two' => ['ques_two', 'ans_two'],
                'three' => ['ques_three', 'ans_three'],
                'four' => ['ques_four', 'ans_four'],
                'five' => ['ques_five', 'ans_five'],
            ];
        @endphp

        <div class="row">
            <!-- Service Main Information -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Service Details</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{ old('title', $service->title) }}"
                                    class="form-control" placeholder="Enter service title" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Sections -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Content Sections</h5>
                        <div class="row g-3">
                            <!-- Section One -->
                            <div class="col-md-6">
                                <label class="form-label">Heading One</label>
                                <input type="text" name="heading_one" class="form-control"
                                    value="{{ old('heading_one', $service->heading_one) }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description One</label>
                                <textarea name="description_one" class="form-control" rows="4">{{ old('description_one', $service->description_one) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Image One</label>
                                <input type="file" name="image_one" class="form-control">
                                @if ($service->image_one)
                                    <img src="{{ asset($service->image_one) }}" alt="Image One" class="mt-2"
                                        width="100">
                                @endif
                            </div>

                            <hr class="mt-3">

                            <!-- Section Two -->
                            <div class="col-md-6">
                                <label class="form-label">Heading Two</label>
                                <input type="text" name="heading_two" class="form-control"
                                    value="{{ old('heading_two', $service->heading_two) }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description Two</label>
                                <textarea name="description_two" class="form-control" rows="4">{{ old('description_two', $service->description_two) }}</textarea>
                            </div>

                            <!-- Extra Descriptions -->
                            @foreach ($descTwoFields as $label => $field)
                                <div class="col-md-12">
                                    <label class="form-label">Extra Description {{ ucfirst($label) }}</label>
                                    <textarea name="{{ $field }}" class="form-control" rows="2">{{ old($field, $service->$field ?? '') }}</textarea>
                                </div>
                            @endforeach

                            <div class="col-md-6">
                                <label class="form-label">Image Two</label>
                                <input type="file" name="image_two" class="form-control">
                                @if ($service->image_two)
                                    <img src="{{ asset($service->image_two) }}" alt="Image Two" class="mt-2"
                                        width="100">
                                @endif
                            </div>

                            <hr class="mt-3">

                            <!-- Section Three -->
                            <div class="col-md-6">
                                <label class="form-label">Heading Three</label>
                                <input type="text" name="heading_three" class="form-control"
                                    value="{{ old('heading_three', $service->heading_three) }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description Three</label>
                                <textarea name="description_three" class="form-control" rows="4">{{ old('description_three', $service->description_three) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Image Three</label>
                                <input type="file" name="image_three" class="form-control">
                                @if ($service->image_three)
                                    <img src="{{ asset($service->image_three) }}" alt="Image Three" class="mt-2"
                                        width="100">
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Image Four</label>
                                <input type="file" name="image_four" class="form-control">
                                @if ($service->image_four)
                                    <img src="{{ asset($service->image_four) }}" alt="Image Four" class="mt-2"
                                        width="100">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Questions & Answers -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Questions & Answers</h5>
                        <div class="row g-3">
                            @foreach ($qaFields as $label => $fields)
                                <div class="col-md-6">
                                    <label class="form-label">Question {{ ucfirst($label) }}</label>
                                    <input type="text" name="{{ $fields[0] }}" class="form-control"
                                        value="{{ old($fields[0], $service->{$fields[0]} ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Answer {{ ucfirst($label) }}</label>
                                    <input type="text" name="{{ $fields[1] }}" class="form-control"
                                        value="{{ old($fields[1], $service->{$fields[1]} ?? '') }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categories & Meta Info -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Categories & Meta Info</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-select">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Subcategory</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-select">
                                    <option value="">-- Select Subcategory --</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}"
                                            {{ old('subcategory_id', $service->subcategory_id) == $subcategory->id ? 'selected' : '' }}>
                                            {{ $subcategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{ old('status', $service->status) == 1 ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="0" {{ old('status', $service->status) == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-end">
                        <button type="submit" class="btn btn-primary px-4">Update Service</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {
            $('#category_id').on('change', function() {
                var categoryId = $(this).val();
                $('#subcategory_id').html('<option value="">Loading...</option>');

                if (categoryId) {
                    var url = '{{ route('subcategories.by.category', ':id') }}';
                    url = url.replace(':id', categoryId);

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(data) {
                            $('#subcategory_id').empty().append(
                                '<option value="">-- Select Subcategory --</option>');
                            $.each(data, function(key, subcategory) {
                                $('#subcategory_id').append('<option value="' +
                                    subcategory.id + '">' + subcategory.name +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#subcategory_id').html('<option value="">-- Select Subcategory --</option>');
                }
            });
        });
    </script>
@endsection
