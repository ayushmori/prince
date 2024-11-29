<!-- resources/views/admin/categories/create.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Create Category</h2>

        <form action="{{ url('admin/category/create') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="image">Category Image</label>
                <input type="file" class="form-control" name="image" id="image" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="serial_number">Serial Number</label>
                <input type="text" class="form-control" name="serial_number" id="serial_number" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Category</button>
        </form>
    </div>
@endsection
