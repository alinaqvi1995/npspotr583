@extends('dashboard.includes.partial.base')

@section('title', 'Edit Profile')

@section('content')
    <div class="container">
        <h6 class="mb-4">Edit Profile</h6>

        @if (session('status') === 'profile-updated')
            <div class="alert alert-success">Profile updated successfully.</div>
        @endif

        <div class="row">
            <!-- Profile Card -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        {{-- <img src="{{ asset('admin/images/avatar.png') }}" alt="User Avatar" class="rounded-circle mb-3"
                            width="100" height="100"> --}}
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="text-muted mb-1">{{ $user->email }}</p>
                        <hr>
                        <h6 class="mb-1">Roles</h6>
                        @forelse($user->roles as $role)
                            <span class="badge bg-primary">{{ $role->name }}</span>
                        @empty
                            <span class="text-muted">No roles assigned</span>
                        @endforelse

                        <h6 class="mt-3 mb-1">Panel Types</h6>
                        @forelse($user->panelTypes as $panel)
                            <span class="badge bg-info">{{ $panel->name }}</span>
                        @empty
                            <span class="text-muted">None</span>
                        @endforelse

                        <h6 class="mt-3 mb-1">Permissions</h6>
                        @forelse($user->allPermissions() as $perm)
                            <span class="badge bg-success">{{ $perm->name }}</span>
                        @empty
                            <span class="text-muted">No permissions</span>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Edit Form -->
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">New Password <small>(leave blank to keep
                                        current)</small></label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control">
                            </div>

                            <button type="submit" class="btn btn-grd btn-grd-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
