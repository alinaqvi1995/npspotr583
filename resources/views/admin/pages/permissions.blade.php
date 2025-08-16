@extends('admin.includes.partial.base')

@section('title', 'Permissions')

@section('content')
    <h6 class="mb-0 text-uppercase">Permissions</h6>
    <hr>

    <div class="mb-3 text-end">
        <button class="btn btn-grd-primary" data-bs-toggle="modal" data-bs-target="#permissionModal" id="addPermissionBtn">
            <i class="material-icons-outlined">add</i> Add Permission
        </button>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="order-search position-relative my-3">
                <input class="form-control rounded-5 px-5" type="text" placeholder="Search" id="searchPermission">
                <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
            </div>

            <div class="table-responsive">
                <table class="table align-middle" id="permissionTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Roles</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->slug }}</td>
                                <td>
                                    @foreach ($permission->roles as $role)
                                        <span class="badge bg-primary me-1 mb-1">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info editPermissionBtn" data-id="{{ $permission->id }}"
                                        data-name="{{ $permission->name }}" data-slug="{{ $permission->slug }}">
                                        <i class="material-icons-outlined">edit</i>
                                    </button>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="material-icons-outlined">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add/Edit Permission Modal -->
    <div class="modal fade" id="permissionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form id="permissionForm" method="POST" action="">
                @csrf
                <input type="hidden" name="_method" id="permFormMethod" value="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="permissionModalLabel">Add Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="permName" class="form-label">Name</label>
                            <input type="text" name="name" id="permName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="permSlug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="permSlug" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-grd-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {

            // Add Permission button
            $('#addPermissionBtn').click(function() {
                $('#permissionForm').attr('action', "{{ route('permissions.store') }}");
                $('#permFormMethod').val('POST');
                $('#permissionModalLabel').text('Add Permission');
                $('#permissionForm')[0].reset();
            });

            // Edit Permission buttons
            $('.editPermissionBtn').click(function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const slug = $(this).data('slug');

                $('#permissionForm').attr('action', '/permissions/' + id);
                $('#permFormMethod').val('PUT');
                $('#permissionModalLabel').text('Edit Permission');
                $('#permName').val(name);
                $('#permSlug').val(slug);

                $('#permissionModal').modal('show');
            });

            // Search filter
            $('#searchPermission').on('keyup', function() {
                const value = $(this).val().toLowerCase();
                $('#permissionTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
@endsection
