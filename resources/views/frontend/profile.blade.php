@extends('layouts.frontend')
@section('content')
    <div class="container px-4">
        <div class="card col-md-4 offset-md-4 mb-3 shadow-lg p-3 mb-5 bg-body-tertiary rounded my-5">
            <h3 class="my-4 d-inline text-center">Your Information</h3>
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

                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Change Password</label>
                    <input type="password" id="password" name="password"
                        class="form-control mb-3 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="Current Password">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <input type="password" id="password" name="password"
                        class="form-control mb-3 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="New Password">
                    <input type="password" id="password" name="password"
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="New Password Again">
                </div>

                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" type="submit">Change</button>
                </div>
            </form>
        </div>
    </div>
@endsection
