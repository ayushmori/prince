@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Product Details</h2>
        <div class="product-details">
            <p><strong>Name:</strong> {{ $product->name }}</p>
            <p><strong>Price:</strong> {{ $product->price }}</p>
            <p><strong>Category:</strong> {{ $product->category->name }}</p>
            <p><strong>Subcategory:</strong> {{ $product->subcategory->name }}</p>
            <p><strong>Serial Number:</strong> {{ $product->serial_number }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>

            <!-- Attributes -->
            <h4>Attributes</h4>
            <ul>
                @foreach($product->attributes as $attribute)
                    <li>{{ $attribute->title }}: {{ $attribute->description }}</li>
                @endforeach
            </ul>

            <!-- Documents -->
            <h4>Documents</h4>
            <ul>
                @foreach($product->documents as $document)
                    <li><a href="{{ asset($document->file_path) }}" target="_blank">{{ $document->type }}</a></li>
                @endforeach
            </ul>

            <!-- Images -->
            <h4>Images</h4>
            <div class="images">
                @foreach(json_decode($product->images) as $image)
                    <img src="{{ asset($image) }}" alt="Product Image" width="100">
                @endforeach
            </div>
        </div>
    </div>
@endsection
