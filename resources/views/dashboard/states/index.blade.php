@extends('dashboard.includes.partial.base')

@section('title', 'States')

@section('content')
    <h6 class="mb-0 text-uppercase">All States</h6>
    <hr>
    <div class="card">
        <div class="card-body">

            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <h5 class="mb-0">All States</h5>
                </div>
                <a href="{{ route('add-states.create') }}" class="btn btn-grd btn-grd-primary">
                    <i class="material-icons-outlined">add</i> Add New State
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle" id="statesTable">
                    <thead>
                        <tr>
                            <th>Sr#</th>
                            <th>State Name</th>
                            <th>Slug</th>
                            <th>Short Title</th>
                            <th>Banner Image</th>

                            <th>Heading One</th>
                            <th>Description One</th>
                            <th>Image One</th>

                            <th>Heading Two</th>
                            <th>Description Two</th>
                            <th>Image Two</th>

                            <th>Heading Three</th>
                            <th>Description Three</th>
                            <th>Image Three</th>

                            <th>Heading Four</th>
                            <th>Description Four</th>
                            <th>Image Four</th>

                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($states as $state)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $state->state_name }}</td>
                                <td>{{ $state->slug }}</td>
                                <td>{{ $state->short_title ?? '—' }}</td>

                                <td>
                                    @if($state->banner_image)
                                        <img src="{{ asset($state->banner_image) }}" alt="Banner" width="70" class="rounded">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>{{ $state->heading_one ?? '—' }}</td>
                                <td>{{ Str::limit($state->description_one, 80) ?? '—' }}</td>
                                <td>
                                    @if($state->image_one)
                                        <img src="{{ asset($state->image_one) }}" alt="Image 1" width="70" class="rounded">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>{{ $state->heading_two ?? '—' }}</td>
                                <td>{{ Str::limit($state->description_two, 80) ?? '—' }}</td>
                                <td>
                                    @if($state->image_two)
                                        <img src="{{ asset($state->image_two) }}" alt="Image 2" width="70" class="rounded">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>{{ $state->heading_three ?? '—' }}</td>
                                <td>{{ Str::limit($state->description_three, 80) ?? '—' }}</td>
                                <td>
                                    @if($state->image_three)
                                        <img src="{{ asset($state->image_three) }}" alt="Image 3" width="70" class="rounded">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>{{ $state->heading_four ?? '—' }}</td>
                                <td>{{ Str::limit($state->description_four, 80) ?? '—' }}</td>
                                <td>
                                    @if($state->image_four)
                                        <img src="{{ asset($state->image_four) }}" alt="Image 4" width="70" class="rounded">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>{{ $state->created_at->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('add-states.edit', $state->id) }}" class="btn btn-sm btn-info">
                                        <i class="material-icons-outlined">edit</i>
                                    </a>
                                    <form action="{{ route('add-states.destroy', $state->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="material-icons-outlined">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="19" class="text-center">No states found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('extra_js')
    <script>
        $(document).ready(function () {
            $('#statesTable').DataTable({
                pageLength: 10,
                autoWidth: true,
                scrollX: true,
                order: [[17, 'desc']], // Sort by Created At
                columnDefs: [
                    { orderable: false, targets: [18] } // Disable sorting on Actions column
                ]
            });
        });
    </script>
@endsection
