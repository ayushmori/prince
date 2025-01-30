@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- Left Side Filter with Checkbox -->
        <div class="col-md-3 mt-3">
            <div class="card mb-4">
                <h5 class="card-header text-white fw-bold" style="background-color: #0d6efd;">Categories</h5>
                <div class="card-body">
                    <!-- Show categories with parent_id equal to the current category's ID -->
                    @if($childCategories && $childCategories->count() > 0)
                        <div class="subcategories ms-3">
                            @foreach($childCategories as $subcategory)
                                <div class="mb-2">
                                    <input type="checkbox"
                                        class="form-check-input me-2 filter-checkbox"
                                        name="category[]"
                                        id="cat-{{ $subcategory->id }}"
                                        value="{{ $subcategory->id }}"
                                        {{ request()->is('category/' . $subcategory->id) ? 'checked' : '' }}>
                                    <label for="cat-{{ $subcategory->id }}" class="form-check-label">
                                        {{ $subcategory->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Brands Filter -->
            <div class="card mb-4">
                <h5 class="card-header text-white fw-bold" style="background-color: #0d6efd;">Brands</h5>
                <div class="card-body">
                    @foreach($relatedBrands as $brand)
                        @if($brand) {{-- Check if brand exists --}}
                            <div class="mb-2">
                                <input type="checkbox"
                                    class="form-check-input me-2 filter-checkbox"
                                    name="brand[]"
                                    id="brand-{{ $brand->id }}"
                                    value="{{ $brand->id }}"
                                    {{ request()->is('brand/' . $brand->id) ? 'checked' : '' }}>
                                <label for="brand-{{ $brand->id }}" class="form-check-label">
                                    {{ $brand->name }}
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Clear Filter Button -->
            <div class="mb-4">
                <button class="btn btn-secondary w-100" id="clear-filters">Clear Filters</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            @if($category)
                <p class="product-path text-muted mt-3 ms-3">
                    Products & Services
                    @foreach ($breadcrumb as $category)
                        > <a href="{{ url('/category', $category->id) }}">{{ $category->name }}</a>
                    @endforeach
                    > {{ $category->name }}
                </p>
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
                        <button class="nav-link active" id="categories" data-bs-toggle="tab" data-bs-target="#categories-tab-pane" type="button" role="tab" aria-controls="categories-tab-pane" aria-selected="true" style="border-top:2px solid #2561a8">Subcategories</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    {{-- <div class="tab-pane fade show active" id="categories-tab-pane" role="tabpanel" aria-labelledby="categories-tab" tabindex="0">
                        <main class="category-list mt-4">
                            <div class="row row-cols-1 row-cols-md-3 g-4" id="subcategory-list">
                                @foreach ($childCategories as $subcategory)
                                    <div class="col">
                                        <div class="card h-100">
                                            <img src="{{ asset('uploads/category/' . $subcategory->image) }}" alt="{{ $subcategory->name }}" class="card-img-top" style="object-fit: cover; height: 200px;">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title">{{ $subcategory->name }}</h5>
                                                <p class="card-text">{{ $subcategory->description }}</p>
                                                <div class="mt-auto">
                                                    <a href="{{ url('/category', $subcategory->id) }}" class="btn btn-primary mb-2">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </main>
                    </div> --}}


                    <div class="tab-pane fade show active" id="categories-tab-pane" role="tabpanel" aria-labelledby="categories-tab" tabindex="0">
                        <main class="category-list mt-4">
                            <div class="row row-cols-1 row-cols-md-3 g-4" id="subcategory-list">
                                @if($childCategories->count() > 0)
                                    @foreach ($childCategories as $subcategory)
                                        <div class="col">
                                            <div class="card h-100">
                                                <img src="{{ asset('uploads/category/' . $subcategory->image) }}" alt="{{ $subcategory->name }}" class="card-img-top" style="object-fit: cover; height: 200px;">
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title">{{ $subcategory->name }}</h5>
                                                    <p class="card-text">{{ $subcategory->description }}</p>
                                                    <div class="mt-auto">
                                                        <a href="{{ url('/category', $subcategory->id) }}" class="btn btn-primary mb-2">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                    
                                {{-- If no subcategories exist, show the products of this category --}}
                                @if($childCategories->count() == 0 && $category->products->count() > 0)
                                    @foreach ($category->products as $product)
                                        <div class="col">
                                            <div class="card h-100">
                                                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top" style="object-fit: cover; height: 200px;">
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title">{{ $product->name }}</h5>
                                                    <p class="card-text">{{ $product->serial_number }}</p>
                                                    <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                                                    <div class="mt-auto">
                                                        <a href="{{ url('/product', $product->id) }}" class="btn btn-primary mb-2">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.filter-checkbox');
        const clearFiltersButton = document.getElementById('clear-filters');
        const currentCategoryId = '{{ $category->id }}';

        function updateSubcategoryDisplay() {
            const selectedCategories = Array.from(document.querySelectorAll('input[name="category[]"]:checked')).map(cb => cb.value);
            const selectedBrands = Array.from(document.querySelectorAll('input[name="brand[]"]:checked')).map(cb => cb.value);

            if (selectedCategories.length === 0 && selectedBrands.length === 0) {
                // Show original subcategories of current category
                loadSubcategoriesForCategory(currentCategoryId);
            } else {
                fetchFilteredSubcategories(selectedCategories, selectedBrands);
            }
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateSubcategoryDisplay);
        });

        clearFiltersButton.addEventListener('click', function() {
            checkboxes.forEach(checkbox => checkbox.checked = false);
            loadSubcategoriesForCategory(currentCategoryId);
        });

        function loadSubcategoriesForCategory(categoryId) {
            fetch(`/category/${categoryId}`, {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                updateSubcategoryList(data.childCategories);
            })
            .catch(error => console.error('Error:', error));
        }

        function fetchFilteredSubcategories(categories, brands) {
            const url = new URL('{{ route("categories.filter") }}');
            url.searchParams.append('categories', categories.join(','));
            url.searchParams.append('brands', brands.join(','));
            url.searchParams.append('parent_id', currentCategoryId);

            fetch(url, {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                updateSubcategoryList(data.subcategories);
            })
            .catch(error => console.error('Error:', error));
        }

        function updateSubcategoryList(subcategories) {
            const subcategoryList = document.getElementById('subcategory-list');
            subcategoryList.innerHTML = '';

            subcategories.forEach(subcategory => {
                const subcategoryCard = `
                    <div class="col">
                        <div class="card h-100">
                            <img src="/uploads/category/${subcategory.image}" alt="${subcategory.name}" class="card-img-top" style="object-fit: cover; height: 200px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">${subcategory.name}</h5>
                                <p class="card-text">${subcategory.description}</p>
                                <div class="mt-auto">
                                    <a href="/category/${subcategory.id}" class="btn btn-primary mb-2">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                subcategoryList.insertAdjacentHTML('beforeend', subcategoryCard);
            });
        }
    });
</script>

@endsection
