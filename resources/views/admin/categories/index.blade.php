@extends('layouts.admin')
@section('content')
    {{-- @php
        var_dump($categories);
    @endphp --}}
    <div class="container-fluid px-4">
        <div class="my-5">
            <h3 class="my-4 d-inline">Categories</h3>
            <a href="{{ route('backend.categories.create') }}" class="btn btn-primary float-end">Add Category</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="category_tbody">
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td><img src="{{ $category->image }}" alt="" width="200" height="200"></td>
                                <td>
                                    <a href="{{ route('backend.categories.edit', $category->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <button class="btn btn-sm btn-danger delete" type="button"
                                        data-id="{{ $category->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Delete Modal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="" method="POST" id="deleteForm">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#category_tbody').on('click', '.delete', function() {
                let id = $(this).data('id');
                // console.log(id);
                $('#deleteForm').prop('action', 'categories/' + id);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection
