@extends('dashboard.includes.partial.base')

@section('title', 'Users')

@section('content')
    <h6 class="mb-0 text-uppercase">All Users</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <h5 class="mb-0">Users List</h5>
                </div>
                <div class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="material-icons-outlined fs-5">more_vert</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <select id="columnSearchSelect" class="form-select">
                        <option value="">Search All Columns</option>
                        <option value="0">Name</option>
                        <option value="1">Email</option>
                        {{-- <option value="2">Roles</option>
                        <option value="3">Panel Types</option>
                        <option value="4">Created At</option>
                        <option value="5">Updated At</option> --}}
                    </select>
                </div>
                <div class="col-md-8 position-relative">
                    <input class="form-control rounded-5 px-5" type="text" placeholder="Search" id="columnSearchInput">
                    <span
                        class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle datatable" id="usersTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Panel Types</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->panelTypes as $panel)
                                        <span class="badge bg-secondary">{{ $panel->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $user->created_at_formatted }}</td>
                                <td>{{ $user->updated_at_formatted }}</td>
                                <td>
                                    @if (!$user->hasRole('admin'))
                                        @can('edit-users')
                                            <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="material-icons-outlined">edit</i>
                                            </a>
                                        @endcan
                                        @can('delete-users')
                                            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="material-icons-outlined">delete</i>
                                                </button>
                                            </form>
                                        @endcan
                                    @else
                                        <span class="">Admin - no actions</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No users found.</td>
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
            // Column-specific search
            $('#columnSearchInput').on('keyup', function() {
                var colIndex = $('#columnSearchSelect').val();
                var searchTerm = this.value;
                if (colIndex === "") {
                    // global search
                    table.search(searchTerm).draw();
                } else {
                    // search only in selected column
                    table.column(colIndex).search(searchTerm).draw();
                }
            });

            $('#columnSearchSelect').on('change', function() {
                $('#columnSearchInput').trigger('keyup'); // apply search immediately
            });
        });
    </script>
@endsection
