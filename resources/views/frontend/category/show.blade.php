@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- Left Side Filter with Checkbox -->
        <div class="col-md-3 mt-3">
            <div class="card mb-4">
                <h5 class="card-header text-white fw-bold" style="background-color: #0d6efd;">Categories</h5>
                <div class="card-body">
                    @foreach ($categories as $cat)
                        <div class="mb-2">
                            <input 
                                type="checkbox" 
                                class="form-check-input me-2" 
                                id="cat-{{ $cat->id }}" 
                                onclick="filterCategory('{{ url('/category', $cat->id) }}', this)" 
                                {{ request()->is('category/' . $cat->id) ? 'checked' : '' }} 
                            >
                            <label for="cat-{{ $cat->id }}" class="form-check-label">{{ $cat->name }}</label>

                            <!-- Subcategories -->
                            @if (isset($cat->subcategories) && $cat->subcategories->count() > 0)
                                <div class="ms-3">
                                    @foreach ($cat->subcategories as $subcat)
                                        <div>
                                            <input 
                                                type="checkbox" 
                                                class="form-check-input me-2" 
                                                id="subcat-{{ $subcat->id }}" 
                                                onclick="filterCategory('{{ url('/subcategory', $subcat->id) }}', this)" 
                                                {{ request()->is('subcategory/' . $subcat->id) ? 'checked' : '' }} 
                                            >
                                            <label for="subcat-{{ $subcat->id }}" class="form-check-label">{{ $subcat->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Filter by Brand -->
            <div class="card mb-4">
                <h5 class="card-header text-white fw-bold" style="background-color: #0d6efd;">Brands</h5>
                <div class="card-body">
                    @foreach ($brands as $brand)
                        <div class="mb-2">
                            <input 
                                type="checkbox" 
                                class="form-check-input me-2" 
                                id="brand-{{ $brand->id }}" 
                                onclick="filterCategory('{{ url('/brand', $brand->id) }}', this)" 
                                {{ request()->is('brand/' . $brand->id) ? 'checked' : '' }} 
                            >
                            <label for="brand-{{ $brand->id }}" class="form-check-label">{{ $brand->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            @if($category)
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="mb-3">{{ $category->name }}</h1>
                        <h3 style="color: #2561a8; padding-bottom:10px;">{{ $category->description }}</h3>
                        <p>{{ $category->slug }}</p>
                        <div class="d-flex mt-3">
                            <a href="#" class="btn text-white" style="background-color: #2561a8; padding:5px 30px;"><b>Contact Sales</b></a>
                            <a href="#" class="btn" style="border: 1px solid black; margin-left:20px;"><b>Contact Support</b></a>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <img src="{{ asset('uploads/category/' . $category->image) }}" alt="{{ $category->name }}" style="width: 300px;">
                    </div>
                </div>

                <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="product" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true" style="border-top:2px solid #2561a8">Product</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
                        <main class="product-list mt-4">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @foreach ($category->products as $product)
                                    <div class="col">
                                        <div class="card h-100">
                                            @php
                                                $images = json_decode(str_replace('\\', '/', $product->images), true);
                                            @endphp

                                            @if (!empty($images) && is_array($images))
                                                <img src="{{ url($images[0]) }}" alt="Product Image" class="card-img-top" style="object-fit: cover; height: 200px;">
                                            @else
                                                <img src="{{ asset('images/placeholder.png') }}" alt="No Image" class="card-img-top" style="object-fit: cover; height: 200px;">
                                            @endif

                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <p class="card-text">{{ $product->serial_number }}</p>
                                                <div class="mt-auto">
                                                    <a href="{{ url('/product', $product->id) }}" class="btn btn-primary mb-2">View Details</a>
                                                    <a href="#" class="btn btn-link">Documents</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </main>
                    </div>
                </div>
            @else
                <p>No category found.</p>
            @endif
        </div>
    </div>
</div>

<script>
    function filterCategory(url, checkbox) {
        window.location.href = url;
    }
</script>

@endsection