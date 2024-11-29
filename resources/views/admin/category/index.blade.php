<!-- resources/views/admin/categories/index.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Categories</h2>
        <a href="{{ url('admin/category/create') }}" class="btn btn-success">Create New Category</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Serial Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td><img src="{{ Storage::url('public/categories/'.$category->image) }}" alt="Image" width="50"></td>
                        <td>{{ Str::limit($category->description, 50) }}</td>
                        <td>{{ $category->serial_number }}</td>
                        <td>
                            <a href="{{ url('admin/category/edit', $category->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{ url('admin/category/destroy', $category->id) }}"class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
