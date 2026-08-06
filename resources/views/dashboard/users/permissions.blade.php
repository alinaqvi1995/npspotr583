@extends('dashboard.includes.partial.base')

@section('title', 'Effective Permissions')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h6 class="mb-0 text-uppercase">Effective Permissions &mdash; {{ $user->name }}</h6>
        <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-secondary">
            <i class="material-icons-outlined">edit</i> Edit User
        </a>
    </div>
    <hr>

    @if ($isAdmin)
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <i class="material-icons-outlined me-2">shield</i>
            <div>
                This user has the <strong>admin</strong> role, which bypasses all permission checks.
                They have full access regardless of the grants listed below.
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-title">Roles</h6>
                    @forelse ($user->roles as $role)
                        <span class="badge bg-primary me-1 mb-1">{{ $role->name }}</span>
                    @empty
                        <span class="text-muted">None</span>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-title">Panels <small class="text-muted">(profiles)</small></h6>
                    @forelse ($user->panelTypes as $panel)
                        <span class="badge bg-info me-1 mb-1">{{ $panel->name }}</span>
                    @empty
                        <span class="text-muted">None</span>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-title">Effective Permissions</h6>
                    <h3 class="mb-0">{{ count($matrix) }}</h3>
                    <small class="text-muted">unique permissions granted</small>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p class="text-muted">
                Permissions are <strong>cumulative</strong>: a user gets the union of everything granted by their
                roles, their panels and any direct grant. A permission missing from this table is denied.
            </p>

            <div class="table-responsive">
                <table class="table align-middle datatable" id="permissionMatrix">
                    <thead>
                        <tr>
                            <th>Permission</th>
                            <th>Slug</th>
                            <th>Via Role</th>
                            <th>Via Panel</th>
                            <th>Direct</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($matrix as $row)
                            <tr>
                                <td>{{ $row['name'] }}</td>
                                <td><code>{{ $row['slug'] }}</code></td>
                                <td>
                                    @forelse (array_unique($row['roles']) as $roleName)
                                        <span class="badge bg-primary me-1 mb-1">{{ $roleName }}</span>
                                    @empty
                                        <span class="text-muted">&mdash;</span>
                                    @endforelse
                                </td>
                                <td>
                                    @forelse (array_unique($row['panels']) as $panelName)
                                        <span class="badge bg-info me-1 mb-1">{{ $panelName }}</span>
                                    @empty
                                        <span class="text-muted">&mdash;</span>
                                    @endforelse
                                </td>
                                <td>
                                    @if ($row['direct'])
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="text-muted">&mdash;</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    This user has no permissions granted.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
