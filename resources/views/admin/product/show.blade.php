@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Product Details</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg></a></li>
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item active">Product View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Product Attributes Card -->
                <div class="card">
                    <div class="card-header">
                        <h3>Product Attributes</h3>
                    </div>
                    <div class="card-body">
                        <ul class="attribute-list">
                            @foreach ($product->attributes as $attribute)
                                <li class="attribute-item">
                                    <strong class="attribute-title">{{ $attribute->title }}:</strong>
                                    <span class="attribute-description">{{ $attribute->description }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Product Documents Card -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>Product Documents</h3>
                    </div>
                    <div class="card-body">
                        <ul class="document-list">
                            @foreach ($product->documents as $document)
                                <li class="document-item">
                                    <strong class="document-type">Type:</strong> <span>{{ $document->type }}</span> <br>
                                    <a href="{{ asset($document->file_path) }}" target="_blank" class="document-link">Download</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Add New Product Button -->
                <div class="d-flex justify-content-end my-3">
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm text-white">
                        Add New Product
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    /* General Section Styling */
    .card {
        margin-bottom: 30px;
    }

    .card-header {
        background-color: #f1f1f1;
        font-size: 1.25em;
        padding: 10px;
        color: #333;
        border-bottom: 1px solid #ddd;
    }

    .card-body {
        padding: 15px;
        background-color: #fff;
    }

    /* Attributes Section */
    .attribute-list {
        list-style-type: none;
        padding: 0;
    }

    .attribute-item {
        margin-bottom: 8px;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .attribute-item:hover {
        background-color: #f1f1f1;
    }

    .attribute-title {
        font-weight: bold;
        color: #007bff;
    }

    .attribute-description {
        font-size: 1em;
        color: #555;
    }

    /* Documents Section */
    .document-list {
        list-style-type: none;
        padding: 0;
    }

    .document-item {
        margin-bottom: 10px;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .document-item:hover {
        background-color: #f1f1f1;
    }

    .document-type {
        font-weight: bold;
        color: #007bff;
    }

    .document-link {
        display: inline-block;
        margin-top: 5px;
        padding: 8px 15px;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
    }

    .document-link:hover {
        background-color: #0056b3;
    }
</style>
