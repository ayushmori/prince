@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Brands</h1>
                        <a href="{{ route('brands.create') }}" class="btn btn-primary mb-3">Create Brand</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="table table-bordered table-striped" id="basic-1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Serial Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $brand->name }}</td>
                                            <td>
                                                @if ($brand->image)
                                                    <img src="{{ asset($brand->image) }}" class="img-thumbnail" width="50" alt="{{ $brand->name }}">
                                                @endif
                                            </td>
                                            <td>{{ \Str::limit($brand->description, 50) }}</td>
                                            <td>{{ $brand->serial_number }}</td>
                                            <td>
                                                <a href="{{ route('brands.create', $brand->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('brands.delete', $brand->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
