@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="my-5">
            <h3 class="my-4 d-inline">Items Create</h3>
            <a href="{{ route('backend.items.index') }}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <div class="card">
            <form action="{{ route('backend.items.store') }}" method="POST" class="m-5" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="codeNo" class="form-label">Code No</label>
                    <input type="number" class="form-control {{ $errors->has('codeNo') ? 'is-invalid' : '' }}"
                        id="codeNo" name="codeNo">
                    @if ($errors->has('codeNo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('codeNo') }}
                        </div>
                    @endif
                </div>
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
                    <input type="file" accept="image/*"
                        class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image" name="image">
                    @if ($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                        id="price" name="price">
                    @if ($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="number" class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}"
                        id="discount" name="discount">
                    @if ($errors->has('discount'))
                        <div class="invalid-feedback">
                            {{ $errors->first('discount') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inStock" class="form-label">InStock</label>
                    <select class="form-select {{ $errors->has('inStock') ? 'is-invalid' : '' }}" name="inStock">
                        <option selected value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    @if ($errors->has('inStock'))
                        <div class="invalid-feedback">
                            {{ $errors->first('inStock') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id">
                        <option selected value="">Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('category_id') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description"
                        name="description" rows="3"></textarea>
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
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
