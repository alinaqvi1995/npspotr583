@extends('dashboard.includes.partial.base')

@section('title', 'Panels')

@section('content')
    <h6 class="mb-0 text-uppercase">Panels</h6>
    <hr>

    <div class="alert alert-info d-flex align-items-center" role="alert">
        <i class="material-icons-outlined me-2">info</i>
        <div>
            A panel works as a <strong>permission profile</strong>. Every user assigned to a panel automatically
            inherits all permissions granted here, on top of their role and direct permissions.
        </div>
    </div>

    @can('create-panels')
        <div class="mb-3 text-end">
            <button class="btn btn-grd btn-grd-primary" data-bs-toggle="modal" data-bs-target="#panelModal" id="addPanelBtn">
                <i class="material-icons-outlined">add</i> Add Panel
            </button>
        </div>
    @endcan

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle datatable" id="panelTable">
                    <thead>
                        <tr>
                            <th>Sr#.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Users</th>
                            <th>Permissions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($panels as $panel)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $panel->name }}</td>
                                <td>{{ $panel->description ?: '-' }}</td>
                                <td><span class="badge bg-secondary">{{ $panel->users_count }}</span></td>
                                <td>
                                    @forelse ($panel->permissions as $perm)
                                        <span class="badge bg-primary me-1 mb-1">{{ $perm->name }}</span>
                                    @empty
                                        <span class="text-muted">No permissions</span>
                                    @endforelse
                                </td>
                                <td>
                                    @can('edit-panels')
                                        <button class="btn btn-sm btn-info editPanelBtn" data-id="{{ $panel->id }}"
                                            data-name="{{ $panel->name }}" data-description="{{ $panel->description }}"
                                            data-users="{{ $panel->users_count }}"
                                            data-permissions='@json($panel->permissions->pluck('id'))'>
                                            <i class="material-icons-outlined">edit</i>
                                        </button>
                                    @endcan
                                    @can('create-panels')
                                        <form action="{{ route('panels.duplicate', $panel->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-secondary" title="Duplicate this panel">
                                                <i class="material-icons-outlined">content_copy</i>
                                            </button>
                                        </form>
                                    @endcan
                                    @can('delete-panels')
                                        @if ($panel->users_count > 0)
                                            {{-- A panel with members cannot be deleted: it would silently
                                                 strip access from every user in it --}}
                                            <button class="btn btn-sm btn-danger" disabled
                                                title="{{ $panel->users_count }} user(s) are assigned. Move them to another panel first.">
                                                <i class="material-icons-outlined">delete</i>
                                            </button>
                                        @else
                                            <form action="{{ route('panels.destroy', $panel->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="material-icons-outlined">delete</i>
                                                </button>
                                            </form>
                                        @endif
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add/Edit Panel Modal -->
    <div class="modal fade" id="panelModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form id="panelForm" method="POST" action="">
                @csrf
                <input type="hidden" name="_method" id="panelFormMethod" value="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="panelModalLabel">Add Panel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning d-none" id="panelBlastRadius"></div>
                        <div class="mb-3">
                            <label for="panelName" class="form-label">Name</label>
                            <input type="text" name="name" id="panelName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="panelDescription" class="form-label">Description</label>
                            <textarea name="description" id="panelDescription" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="panelPermissions" class="form-label">Permissions</label>
                            <select name="permissions[]" id="panelPermissions" class="select2 form-control" multiple>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-grd btn-grd-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('extra_js')
    <script>
        $(document).ready(function () {
            $('#panelPermissions').select2({
                theme: 'bootstrap-5',
                width: '100%',
                allowClear: true,
                dropdownParent: $('#panelModal')
            });

            // Add Panel
            $('#addPanelBtn').click(function () {
                $('#panelForm').attr('action', "{{ route('panels.store') }}");
                $('#panelFormMethod').val('POST');
                $('#panelModalLabel').text('Add Panel');
                $('#panelForm')[0].reset();
                $('#panelPermissions').val(null).trigger('change');
                $('#panelBlastRadius').addClass('d-none').text('');
            });

            // Edit Panel
            $('.editPanelBtn').click(function () {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const description = $(this).data('description');
                const permissions = $(this).data('permissions');

                $('#panelForm').attr('action', "{{ url('panels') }}/" + id);
                $('#panelFormMethod').val('PUT');
                $('#panelModalLabel').text('Edit Panel');
                $('#panelName').val(name);
                $('#panelDescription').val(description);

                // Blast radius: make the reach of the change obvious before saving
                const users = parseInt($(this).data('users'), 10) || 0;
                const $warn = $('#panelBlastRadius');

                if (users > 0) {
                    $warn.removeClass('d-none').text(
                        users + ' user(s) are assigned to this panel. Saving will change their access immediately.'
                    );
                } else {
                    $warn.addClass('d-none').text('');
                }

                $('#panelModal').data('permissions', permissions).modal('show');
            });

            // Set permissions when modal is shown
            $('#panelModal').on('shown.bs.modal', function () {
                const permissions = $(this).data('permissions');
                if (permissions) {
                    $('#panelPermissions').val(permissions).trigger('change');
                    $(this).removeData('permissions');
                }
            });

        });
    </script>
@endsection
