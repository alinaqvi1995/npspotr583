@extends('dashboard.includes.partial.base')
@section('title', 'Edit State')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('states.index') }}">States</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit State</li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('states.update', $state->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            <!-- Basic Info -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">State Information</h5>
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">State Name <span class="text-danger">*</span></label>
                                <input type="text" name="state_name" value="{{ $state->state_name }}" class="form-control"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" value="{{ $state->slug }}" class="form-control"
                                    placeholder="Auto-generate if empty">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Short Description</label>
                                <input type="text" name="short_title" value="{{ $state->short_title }}"
                                    class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Banner Image</label>
                                <input type="file" name="banner_image" class="form-control">
                                @if ($state->banner_image)
                                    <div class="mt-2">
                                        <img src="{{ asset($state->banner_image) }}" alt="Banner Image"
                                            class="rounded border" width="150">
                                    </div>
                                @endif
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
                                    value="{{ $state->heading_one }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Image One</label>
                                <input type="file" name="image_one" class="form-control">
                                @if ($state->image_one)
                                    <div class="mt-2">
                                        <img src="{{ asset($state->image_one) }}" alt="Image One"
                                            class="rounded border" width="120">
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Description One</label>
                                <textarea name="description_one" class="form-control" rows="4">{{ $state->description_one }}</textarea>
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
                                    value="{{ $state->heading_two }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Image Two</label>
                                <input type="file" name="image_two" class="form-control">
                                @if ($state->image_two)
                                    <div class="mt-2">
                                        <img src="{{ asset($state->image_two) }}" alt="Image Two"
                                            class="rounded border" width="120">
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Description Two</label>
                                <textarea name="description_two" class="form-control" rows="4">{{ $state->description_two }}</textarea>
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
                                    value="{{ $state->heading_three }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Image Three</label>
                                <input type="file" name="image_three" class="form-control">
                                @if ($state->image_three)
                                    <div class="mt-2">
                                        <img src="{{ asset($state->image_three) }}" alt="Image Three"
                                            class="rounded border" width="120">
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Description Three</label>
                                <textarea name="description_three" class="form-control" rows="4">{{ $state->description_three }}</textarea>
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
                                    value="{{ $state->heading_four }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Image Four</label>
                                <input type="file" name="image_four" class="form-control">
                                @if ($state->image_four)
                                    <div class="mt-2">
                                        <img src="{{ asset($state->image_four) }}" alt="Image Four"
                                            class="rounded border" width="120">
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Description Four</label>
                                <textarea name="description_four" class="form-control" rows="4">{{ $state->description_four }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-end">
                        <button type="submit" class="btn btn-primary px-4">Update State</button>
                        <a href="{{ route('states.index') }}" class="btn btn-secondary px-4">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
