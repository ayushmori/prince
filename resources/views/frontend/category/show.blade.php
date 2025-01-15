@extends('layouts.app')

@section('content')
    <div class="container my-5">
        @if ($category->children->isNotEmpty())
            <!-- Design for Category with Subcategories -->
            <div class="row">
                <div class="col-md-3">
                    <!-- Sidebar for Filters -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Filters</h5>
                        </div>
                        <div class="card-body">
                            <h6>Category Type</h6>
                            <ul class="list-unstyled">
                                @foreach ($category->children as $child)
                                    <li><input type="checkbox" id="filter1"> <label
                                            for="filter1">{{ $child->name }}</label></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <h4>{{ $category->name }} - Overview</h4>
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="text-center mb-4">
                                <img src="{{ asset('uploads/category/' . $category->image) }}" alt="{{ $category->name }}"
                                    class="img-fluid" style="max-width: 200px; border: 5px solid #ddd;">
                            </div>

                            <p class="text-center mb-4">{{ $category->description }}</p>

                            <h5>Subcategories</h5>
                            <div class="row">
                                @foreach ($category->children as $child)
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img src="{{ asset('uploads/category/' . $child->image) }}"
                                                alt="{{ $child->name }}" class="img-fluid rounded-circle mx-auto d-block"
                                                style="max-width: 100px; border: 3px solid #ddd;">
                                            <div class="card-body">
                                                <h6 class="card-title text-center">{{ $child->name }}</h6>
                                                <p class="card-text text-center" style="font-size: 14px;">
                                                    {{ $child->description }}</p>
                                                <a href="{{ route('category.show', $child->id) }}"
                                                    class="btn btn-sm btn-primary btn-block">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if ($category->children->isEmpty())
                                <p class="text-center">No subcategories available.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5>Products</h5>
                            </div>
                            <div class="card-body">
                                <h6>Category Products</h6>
                                <ul class="list-unstyled">
                                    @forelse($category->products as $product)
                                        <li>
                                            <strong>{{ $product->name }}</strong> -
                                            ${{ number_format($product->price, 2) }}
                                        </li>
                                    @empty
                                        <li class="text-muted">No products available in this category.</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-md-6">

                        <h1 class="mb-3">{{ $category->name }}</h1>
                        <p class="text-muted mb-1"><strong>Slug:</strong> {{ $category->slug }}</p>
                        <p>{{ $category->description }}</p>
                        <div class="d-flex mt-3">
                            <a href="#" class="btn btn-sm btn-primary mx-1">Contact Support</a>
                            <a href="#" class="btn btn-sm btn-secondary">Contact Sales</a>
                        </div>
                    </div>
                    <div class="col-md-3">

                        <div class="float-end">
                            <img src="{{ asset('uploads/category/' . $category->image) }}" alt="{{ $category->name }}"
                                class="img-fluid rounded shadow" style="max-width: 200px;">
                        </div>
                    </div>
                </div>


                <div class="container mt-4">
                    <ul class="nav nav-tabs justify-content-center" id="actionTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="attributes-tab" data-bs-toggle="tab"
                                data-bs-target="#attributes" type="button" role="tab" aria-controls="attributes"
                                aria-selected="true">
                                Attributes
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents"
                                type="button" role="tab" aria-controls="documents" aria-selected="false">
                                Documents
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="actionTabsContent">
                        <div class="tab-pane fade show active" id="attributes" role="tabpanel" aria-labelledby="attributes-tab">
                            <h5 class="mb-4">Product Attributes</h5>
                            @foreach ($category->products as $product)
                                <div class="mb-4">
                                    <h6 class="text-primary mb-3">{{ $product->name }} - Attributes</h6>

                                    @foreach ($product->attributes as $attribute)
                                        <div class="card mb-3 shadow-sm">
                                            <div class="card-body">
                                                <h6 class="card-title font-weight-bold">{{ $attribute->title }}</h6>
                                                <p class="card-text mb-2"><strong>Description:</strong> {{ $attribute->description }}</p>

                                                <!-- Display Short Attributes -->
                                                @if($attribute->shortAttributes->isNotEmpty())
                                                    <h6 class="mt-3 mb-2 text-muted">Short Attributes</h6>
                                                    <ul class="list-group">
                                                        @foreach ($attribute->shortAttributes as $shortAttribute)
                                                            <li class="list-group-item d-flex justify-content-between">
                                                                <span><strong>{{ $shortAttribute->key }}</strong></span>
                                                                <span>{{ $shortAttribute->value }}</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p class="text-muted mt-2">No short attributes available for this item.</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>





                        <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                            <h5>Documents</h5>
                            @foreach ($category->products as $product)
                                <div class="card mb-4 mx-3">
                                    <div class="card-header">
                                        <h3>{{ $product->name }}</h3>
                                    </div>
                                    <div class="card-body">
                                        @forelse($product->mainDocuments as $document)
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <h6 class="card-title">{{ $document->title }}</h6>
                                                    <p class="card-text mb-1">
                                                        <strong>Type:</strong> {{ strtoupper($document->type) }}
                                                    </p>


                                                    <p class="card-text mb-2" style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                        <strong>Description:</strong> {{ $document->description }}
                                                    </p>


                                                    <a href="{{ asset($document->file_path) }}" target="_blank" class="btn btn-primary btn-sm">
                                                        <i class="fas fa-download"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-muted">No main documents available for this product.</p>
                                        @endforelse
                                    </div>


                                    @forelse($product->documents as $document)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $document->type }}</h6>
                                                <a href="{{ asset($document->file_path) }}" target="_blank" class="btn btn-sm btn-primary btn-sm">
                                                    <i class="fas fa-download"></i> Download
                                                </a>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-muted">No other documents available for this product.</p>
                                    @endforelse
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
<style>
    .card {
        margin-left: 20px;
        margin-right: 20px;
    }
</style>
