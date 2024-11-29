<!-- resources/views/admin/categories/edit.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Edit Category</h2>

        <form action="{{ url('admin/category/update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- This tells Laravel to use the PUT method -->

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $category->name) }}" required>
            </div>

            <div class="form-group">
                <label for="image">Category Image</label>
                <input type="file" class="form-control" name="image" id="image">
                <img src="{{ Storage::url('public/categories/'.$category->image) }}" alt="Current Image" width="100" class="mt-2">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" required>{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="serial_number">Serial Number</label>
                <input type="text" class="form-control" name="serial_number" id="serial_number" value="{{ old('serial_number', $category->serial_number) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
@endsection
