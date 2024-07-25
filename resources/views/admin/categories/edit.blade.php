@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="my-5">
            <h3 class="my-4 d-inline">Categories Edit</h3>
            <a href="{{ route('backend.categories.index') }}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <div class="card">
            <form action="{{ route('backend.categories.update', $category->id) }}" method="POST" class="m-5"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('put') }}

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                        name="name" value="{{ $category->name }}">
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
                            <img src="{{ $category->image }}" alt="" class="w-25 h25 my-3">
                            <input type="hidden" name="old_image" id="" value="{{ $category->image }}">
                        </div>
                        <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab"
                            tabindex="0">
                            <input type="file" accept="image/*" class="form-control my-3" id="image" name="new_image"
                                value="">
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
