@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="my-5">
            <h3 class="my-4 d-inline">Payments Create</h3>
            <a href="{{ route('backend.payments.index') }}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <div class="card">
            <form action="{{ route('backend.payments.store') }}" method="POST" enctype="multipart/form-data" class="m-5">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                        name="name">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                        id="image" name="image">
                    @if ($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
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
