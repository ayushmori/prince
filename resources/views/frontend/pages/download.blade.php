@extends('layouts.app')

@section('title', 'Download')

@section('content')
    <div class="container py-4">
        <h2 class="mb-3">Download Documents</h2>

        <div class="row">
            <!-- Filters (Left Side) -->
            <div class="col-md-3">
                <div class="p-3 bg-white shadow rounded">
                    <h5>Filter by</h5>

                    <!-- Search Bar -->
                    <div class="mb-3">
                        <input type="text" class="form-control" id="searchProduct" placeholder="Search product">
                    </div>

                    <!-- Category Filter -->
                    <div class="mb-3">
                        <label class="fw-bold">Category</label>
                        <ul class="list-unstyled">
                            @foreach ($categories as $category)
                                <li>
                                    <label class="d-flex align-items-center">
                                        <input type="checkbox" name="category[]" value="{{ $category->id }}" class="filter-checkbox category-checkbox me-2">
                                        <span>{{ $category->name }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Subcategory Filter (Dynamic) -->
                    <div class="mb-3">
                        <label class="fw-bold">Subcategory</label>
                        <ul id="subcategory-list" class="list-unstyled">
                            <p>Select a category to see subcategories.</p>
                        </ul>
                    </div>

                    <!-- Brand Filter -->
                    <div class="mb-3">
                        <label class="fw-bold">Brand</label>
                        <ul class="list-unstyled">
                            @foreach ($brands as $brand)
                                <li>
                                    <label class="d-flex align-items-center">
                                        <input type="checkbox" name="brand[]" value="{{ $brand->id }}" class="filter-checkbox me-2">
                                        <span>{{ $brand->name }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <button class="btn btn-primary w-100" id="applyFilters">Apply Filters</button>
                    <button class="btn btn-outline-secondary w-100 mt-2" id="resetFilters">Reset All</button>
                </div>
            </div>

            <!-- Documents (Right Side) -->
            <div class="col-md-9">
                <div class="row" id="documentsList">
                    @foreach ($documents as $document)
                        <div class="col-md-6 mb-3">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $document->title }}</h5>
                                    <p class="text-muted">{{ $document->category->name ?? 'N/A' }} | {{ $document->brand->name ?? 'N/A' }}</p>
                                    <a href="{{ $document->file_path }}" class="btn btn-sm btn-primary">Download</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/js/jquery-1.12.4.min.js') }}"></script>

    <script>
      $(document).ready(function() {
    function applyFilters() {
        let selectedCategories = [];
        let selectedSubcategories = [];
        let selectedBrands = [];
        let searchQuery = $('#searchProduct').val();

        $('input[name="category[]"]:checked').each(function() {
            selectedCategories.push($(this).val());
        });

        $('input[name="subcategory[]"]:checked').each(function() {
            selectedSubcategories.push($(this).val());
        });

        $('input[name="brand[]"]:checked').each(function() {
            selectedBrands.push($(this).val());
        });

        $.ajax({
            url: "{{ route('download.page') }}",
            method: "GET",
            data: {
                category: selectedCategories,
                subcategory: selectedSubcategories,
                brand: selectedBrands,
                search: searchQuery
            },
            success: function(response) {
                let documentsList = $('#documentsList');
                documentsList.empty();

                if (response.documents.length > 0) {
                    response.documents.forEach(document => {
                        documentsList.append(`
                            <div class="col-md-6 mb-3">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title">${document.title}</h5>
                                        <p class="text-muted">${document.category?.name ?? 'N/A'} | ${document.brand?.name ?? 'N/A'}</p>
                                        <a href="${document.file_path}" class="btn btn-sm btn-primary">Download</a>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                } else {
                    documentsList.html('<p class="text-center">No documents found.</p>');
                }
            }
        });
    }

    // Automatically apply filters when filters are changed
    $('.filter-checkbox, #searchProduct').on('input change', function() {
        applyFilters();
    });

    // Reset filters
    $('#resetFilters').on('click', function() {
        $('.filter-checkbox').prop('checked', false);
        $('#searchProduct').val('');
        $('#subcategory-list').html('<p>Select a category to see subcategories.</p>');
        applyFilters();
    });

    // Search functionality
    $('#searchButton').on('click', function() {
        applyFilters();
    });
});

    </script>
@endsection
