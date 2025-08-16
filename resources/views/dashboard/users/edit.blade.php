@extends('dashboard.includes.partial.base')

@section('title', 'Edit User')

@section('content')
<div class="card">
    <div class="card-header bg-light">
        <h6>Edit User: {{ $user->name }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password <small>(leave blank to keep current)</small></label>
                <input type="password" name="password" class="form-control">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Roles -->
            <div class="mb-3">
                <label for="roles" class="form-label">Roles</label>
                <select name="roles[]" class="select2" multiple data-placeholder="Select roles">
                    @foreach ($roles->where('slug', '!=', 'admin') as $role)
                        <option value="{{ $role->id }}"
                            {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('roles') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Panel Types -->
            <div class="mb-3">
                <label for="panel_types" class="form-label">Panel Types</label>
                <select name="panel_types[]" class="select2" multiple data-placeholder="Select panel types">
                    @foreach ($panelTypes as $panel)
                        <option value="{{ $panel->id }}"
                            {{ in_array($panel->id, old('panel_types', $user->panelTypes->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $panel->name }}
                        </option>
                    @endforeach
                </select>
                @error('panel_types') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Permissions by Role -->
            <div class="mb-3">
                <label class="form-label">Role Permissions</label>
                <div class="border rounded p-2 bg-light">
                    @foreach ($user->roles as $role)
                        <div class="mb-2">
                            <strong>{{ $role->name }}:</strong>
                            @if ($role->permissions->count())
                                @foreach ($role->permissions as $perm)
                                    <span class="badge bg-info me-1 mb-1">{{ $perm->name }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">No permissions</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Direct User Permissions -->
            <div class="mb-3">
                <label for="userPermissions" class="form-label">User-Level Permissions</label>
                <select name="permissions[]" id="userPermissions" class="select2 form-control" multiple>
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}"
                            {{ in_array($permission->id, old('permissions', $user->directPermissions->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $permission->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection

@section('extra_js')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap-5',
            width: '100%',
            allowClear: true,
        });
    });
</script>
@endsection
