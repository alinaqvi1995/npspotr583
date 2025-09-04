@extends('dashboard.includes.partial.base')

@section('title', 'Services')

@section('content')
    <h6 class="mb-0 text-uppercase">All Services</h6>
    <hr>
    <div class="card">
        <div class="card-body">

            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <h5 class="mb-0">Recent Services</h5>
                </div>
                <a href="{{ route('services.create') }}" class="btn btn-grd btn-grd-primary">
                    <i class="material-icons-outlined">add</i> Add New Service
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle" id="servicesTable">
                    <thead>
                        <tr>
                            <th>Sr#.</th>
                            <th>Title</th>
                            <th>Heading One</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->heading_one }}</td>
                                <td>{!! $service->statusLabel !!}</td>
                                <td>{{ $service->creator ? $service->creator->name : '-' }}</td>
                                <td>{{ $service->created_at_formatted }}</td>
                                <td>
                                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-info">
                                        <i class="material-icons-outlined">edit</i>
                                    </a>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="material-icons-outlined">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No services found.</td>
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
        $(document).ready(function() {
            $('#servicesTable').DataTable({
                pageLength: 10,
                autoWidth: false,
                order: [
                    [6, 'desc']
                ],
                columnDefs: [{
                        orderable: false,
                        targets: [5]
                    }
                ]
            });
        });
    </script>
@endsection
