<table class="table align-middle" id="usersTable">
    <thead>
        <tr>
            <th>Sr#.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Panel Types</th>
            <th>Status</th>
            <th>Timestamps</th> {{-- Single timestamps column --}}
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
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

                <td>{!! $user->status_label !!}</td>

                <td>
                    <small>Created: {{ $user->created_at_formatted }}</small><br>
                    <small>Updated: {{ $user->updated_at_formatted }}</small>
                </td>

                <td>
                    @if (!$user->hasRole('admin'))
                        <div class="dropdown d-inline">
                            <a href="javascript:;" class="dropdown-toggle btn btn-sm btn-secondary" data-bs-toggle="dropdown">
                                View Options
                            </a>
                            <ul class="dropdown-menu">
                                @can('edit-users')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('dashboard.users.edit', $user->id) }}">
                                            <i class="material-icons-outlined me-1">edit</i> Edit
                                        </a>
                                    </li>
                                @endcan
                                @can('delete-users')
                                    <li>
                                        <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')">
                                                <i class="material-icons-outlined me-1">delete</i> Delete
                                            </button>
                                        </form>
                                    </li>
                                @endcan
                                <li>
                                    <form action="{{ route('users.toggleActive', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i
                                                class="material-icons-outlined me-1">{{ $user->is_active ? 'lock' : 'lock_open' }}</i>
                                            {{ $user->is_active ? 'Freeze' : 'Activate' }}
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('users.forceLogout', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="material-icons-outlined me-1">logout</i> Force Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <span class="ms-2">Admin - no actions</span>
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
<div class="d-flex justify-content-between align-items-center mt-3">
    <div class="small text-muted">
        Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
    </div>
    <div>
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
</div>