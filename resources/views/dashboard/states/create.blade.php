@extends('dashboard.includes.partial.base')
@section('title', 'Create State')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('add-states.index') }}">States</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create State</li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('add-states.store') }}" method="POST" enctype="multipart/form-data" id="stateForm">
        @csrf
        <div class="row">

            <!-- Basic Info -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">State Information</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">State Name <span class="text-danger">*</span></label>
                                <input type="text" name="state_name" value="{{ old('state_name') }}" class="form-control"
                                    placeholder="Enter state name" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" value="{{ old('slug') }}" class="form-control"
                                    placeholder="Auto-generate if empty">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Short Description</label>
                                <input type="text" name="short_title" value="{{ old('short_title') }}"
                                    class="form-control" placeholder="Enter short title">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Banner Image</label>
                                <input type="file" name="banner_image" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section One -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Section One</h5>
                        <div class="row g-3">
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Two -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Section Two</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Heading Two</label>
                                <input type="text" name="heading_two" class="form-control"
                                    value="{{ old('heading_two') }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description Two</label>
                                <textarea name="description_two" class="form-control" rows="4">{{ old('description_two') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Image Two</label>
                                <input type="file" name="image_two" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Three -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Section Three</h5>
                        <div class="row g-3">
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Four -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Section Four</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Heading Four</label>
                                <input type="text" name="heading_four" class="form-control"
                                    value="{{ old('heading_four') }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description Four</label>
                                <textarea name="description_four" class="form-control" rows="4">{{ old('description_four') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Image Four</label>
                                <input type="file" name="image_four" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-end">
                        <button type="submit" class="btn btn-primary px-4">Save State</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
