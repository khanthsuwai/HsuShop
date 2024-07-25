@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="my-5">
            <h3 class="my-4 d-inline">Users Edit</h3>
            <a href="{{ route('backend.users.index') }}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <div class="card">
            <form action="{{ route('backend.users.update', $user->id) }}" method="POST" class="m-5">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                        name="name" value="{{ $user->name }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        id="email" name="email" value="{{ $user->email }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="number" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                        id="phone" name="phone" value="{{ $user->phone }}">
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address" name="address"
                        rows="3">{{ $user->address }}</textarea>
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" value="{{ $user->password }}"
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select {{ $errors->has('role') ? 'is-invalid' : '' }}" name="role">
                        <option value="">Choose Role</option>
                        <option value="Super Admin" {{ $user->role == 'Super Admin' ? 'selected' : '' }}>Super Admin
                        </option>
                        <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                    </select>
                    @if ($errors->has('role'))
                        <div class="invalid-feedback">
                            {{ $errors->first('role') }}
                        </div>
                    @endif
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
