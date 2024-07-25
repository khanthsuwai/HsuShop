@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="my-5">
            <h3 class="my-4 d-inline">Items Edit</h3>
            <a href="{{ route('backend.items.index') }}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <div class="card">
            <form action="{{ route('backend.items.update', $item->id) }}" method="POST" class="m-5"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="mb-3">
                    <label for="codeNo" class="form-label">Code No</label>
                    <input type="number" class="form-control {{ $errors->has('codeNo') ? 'is-invalid' : '' }}"
                        id="codeNo" name="codeNo" value="{{ $item->codeNo }}">
                    @if ($errors->has('codeNo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('codeNo') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                        name="name" value="{{ $item->name }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="old_image-tab" data-bs-toggle="tab"
                                data-bs-target="#old_image-tab-pane" type="button" role="tab"
                                aria-controls="old_image-tab-pane" aria-selected="true">Old Image</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="new_image-tab" data-bs-toggle="tab"
                                data-bs-target="#new_image-tab-pane" type="button" role="tab"
                                aria-controls="new_image-tab-pane" aria-selected="false">New Image</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="old_image-tab-pane" role="tabpanel"
                            aria-labelledby="old_image-tab" tabindex="0">
                            <img src="{{ $item->image }}" alt="" class="w-25 h25 my-3">
                            <input type="hidden" name="old_image" id="" value="{{ $item->image }}">
                        </div>
                        <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab"
                            tabindex="0">
                            <input type="file" accept="image/*" class="form-control my-3" id="image"
                                name="new_image">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                        id="price" name="price" value="{{ $item->price }}">
                    @if ($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="number" class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}"
                        id="discount" name="discount" value="{{ $item->discount }}">
                    @if ($errors->has('discount'))
                        <div class="invalid-feedback">
                            {{ $errors->first('discount') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inStock" class="form-label">InStock</label>
                    <select class="form-select {{ $errors->has('inStock') ? 'is-invalid' : '' }}" name="inStock">
                        <option value="1" {{ $item->inStock == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $item->inStock == 0 ? 'selected' : '' }}>No</option>
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
                        <option value="">Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                        name="description" rows="3">{{ $item->description }}</textarea>
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
