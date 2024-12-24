@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-5">
        <!-- Page Title and Breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Product List</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}" title=""><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg></a></li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item active">Product List</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Add New Product Button -->
        <div class="mb-4 text-right">
            <a href="{{ route('products.create') }}" class="btn btn-primary">+ Add New Product</a>
        </div>

        <!-- Product Table -->
        <div class="card">
            <div class="card-body">
                <!-- Success/Error Message -->
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Product Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Serial Number</th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                    <td>{{ $product->brand->name ?? 'N/A' }}</td>
                                    <td>{{ $product->serial_number }}</td>
                                    <td>
                                        @php
                                            $images = json_decode(str_replace('\\', '/', $product->images), true);
                                        @endphp

                                        @if (!empty($images) && is_array($images))
                                            @foreach ($images as $image)
                                                @if (!empty($image))
                                                    <img src="{{ url($image) }}" alt="Product Image"
                                                        class="img-thumbnail" width="50" height="50">
                                                @else
                                                    <p>No image available for this entry.</p>
                                                @endif
                                            @endforeach
                                        @else
                                            <p>No images available</p>
                                        @endif




                                    </td>
                                    <td>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm"
                                            data-bs-toggle="tooltip" title="View">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm"
                                            data-bs-toggle="tooltip" title="Edit">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this product?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
