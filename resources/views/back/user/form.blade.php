@extends("back.template")

@section("title")
{{ $user->exists ? 'Edit User' : 'Create User' }}
@endsection

@section("body")
<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('back.user.save', $user->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}"
                required
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}"
                required
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select
                id="role"
                name="role"
                class="form-select @error('role') is-invalid @enderror"
                required
            >
                <option value="user" {{ old('role', $user->role ?? 'user') === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ $user->exists ? 'Change Password' : 'Password' }}</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                {{ $user->exists ? '' : 'required' }}
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if($user->exists)
                <small class="form-text text-muted">Leave blank to keep current password</small>
            @endif
        </div>

        <button type="submit" class="btn btn-secondary">{{ $user->exists ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection
