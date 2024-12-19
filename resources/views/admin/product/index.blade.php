@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Page Title and Breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Products</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item active">Product View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Product List</h3>
                        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm text-white">Add New Product</a>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        @if(session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Error Message -->
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive product-table">
                            <table class="table table-bordered table-striped dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Attributes</th>
                                        <th>Documents</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->brand ? $product->brand->name : 'N/A' }}</td>
                                            <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                                            <td>{{ $product->subcategory ? $product->subcategory->name : 'N/A' }}</td>
                                            <td>
                                                @if($product->attributes->isNotEmpty())
                                                    @foreach ($product->attributes as $attribute)
                                                        <div><strong>{{ $attribute->title }}:</strong> {{ $attribute->description }}</div>
                                                    @endforeach
                                                @else
                                                    <span class="text-muted">No attributes added</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->documents->isNotEmpty())
                                                    @foreach ($product->documents as $document)
                                                        <div><strong>{{ $document->type }}:</strong>
                                                            <a href="{{ asset($document->file_path) }}" target="_blank" class="btn btn-link btn-sm">Download</a>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <span class="text-muted">No documents uploaded</span>
                                                @endif
                                            </td>
                                            <td style="white-space: nowrap;">
                                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" title="View Product">
                                                    <i class="bi bi-eye"></i> View
                                                </a>
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Edit Product">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Delete Product" onclick="return confirm('Are you sure you want to delete this product?')">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
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
