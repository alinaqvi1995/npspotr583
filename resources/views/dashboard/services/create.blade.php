@extends('dashboard.includes.partial.base')
@section('title', 'Create Service')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Service</li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data" id="serviceForm">
        @csrf
        <div class="row">

            <!-- Service Details -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Service Details</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                    placeholder="Enter service title" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Sections -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Content Sections</h5>
                        <div class="row g-3">

                            <!-- Section One -->
                            <div class="col-md-6">
                                <label class="form-label">Heading One</label>
                                <input type="text" name="heading_one" class="form-control"
                                    value="{{ old('heading_one') }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description One</label>
                                <textarea name="description_one" class="form-control" rows="4">{{ old('description_one') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Image One</label>
                                <input type="file" name="image_one" class="form-control">
                            </div>

                            <hr class="mt-3">

                            <!-- Section Two -->
                            <div class="col-md-6">
                                <label class="form-label">Heading Two</label>
                                <input type="text" name="heading_two" class="form-control"
                                    value="{{ old('heading_two') }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description Two</label>
                                <textarea name="description_two" class="form-control" rows="4">{{ old('description_two') }}</textarea>
                            </div>

                            @for ($i = 1; $i <= 7; $i++)
                                <div class="col-md-12">
                                    <label class="form-label">Extra Description {{ $i }}</label>
                                    <textarea name="description_two_{{ $i }}" class="form-control" rows="2">{{ old('description_two_' . $i) }}</textarea>
                                </div>
                            @endfor

                            <div class="col-md-6">
                                <label class="form-label">Image Two</label>
                                <input type="file" name="image_two" class="form-control">
                            </div>

                            <hr class="mt-3">

                            <!-- Section Three -->
                            <div class="col-md-6">
                                <label class="form-label">Heading Three</label>
                                <input type="text" name="heading_three" class="form-control"
                                    value="{{ old('heading_three') }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description Three</label>
                                <textarea name="description_three" class="form-control" rows="4">{{ old('description_three') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Image Three</label>
                                <input type="file" name="image_three" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Image Four</label>
                                <input type="file" name="image_four" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Questions & Answers -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">FAQ / Q&A</h5>
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Question {{ $i }}</label>
                                    <input type="text" name="ques_{{ $i }}" class="form-control"
                                        value="{{ old('ques_' . $i) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Answer {{ $i }}</label>
                                    <textarea name="ans_{{ $i }}" class="form-control" rows="2">{{ old('ans_' . $i) }}</textarea>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Categories & Status -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Categories & Status</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-select">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Subcategory</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-select">
                                    <option value="">-- Select Subcategory --</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
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
                        <button type="submit" class="btn btn-primary px-4">Create Service</button>
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
