@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>{{ isset($product) ? 'Edit' : 'Add New' }} Product</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                    <li class="breadcrumb-item">Products</li>
                    <li class="breadcrumb-item active">{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($product) ? 'Edit Product' : 'Create New Product' }}
                <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($product))
                        @method('PUT') <!-- This is necessary for an update action -->
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Product Name Input -->
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="name" class="form-control" required
                                   value="{{ old('name', $product->name ?? '') }}">
                        </div>
                    </div>

                    <!-- Brand Dropdown -->
                    <div class="mb-3 row">
                        <label for="brand_id" class="col-sm-3 col-form-label">Brand</label>
                        <div class="col-sm-9">
                            <select name="brand_id" id="brand_id" class="form-control" required>
                                <option value="">Select a Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Category Dropdown -->
                    <div class="mb-3 row">
                        <label for="category" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <select name="category_id" id="category" class="form-control" required>
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Subcategory Dropdown -->
                    <div class="mb-3 row">
                        <label for="sub_category" class="col-sm-3 col-form-label">Subcategory</label>
                        <div class="col-sm-9">
                            <select name="subcategory_id" id="sub_category" class="form-control" required>
                                <option value="">Select a Subcategory</option>
                                <!-- Subcategories will be dynamically loaded -->
                            </select>
                        </div>
                    </div>

                    <!-- Description Textarea -->
                    <div class="mb-3 row">
                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" id="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
                        </div>
                    </div>

                    <!-- Images Upload Section -->
                    <div class="mb-3 row">
                        <label for="images" class="col-sm-3 col-form-label">Images</label>
                        <div class="col-sm-9">
                            <input type="file" name="images[]" id="images" class="form-control" multiple>
                            @if (isset($product) && $product->images)
                                <div class="mt-2">
                                    <h5>Existing Images:</h5>
                                    <!-- Existing Images Preview (Uncomment when needed) -->
                                    {{-- @foreach ($product->images as $image) --}}
                                    {{-- <img src="{{ asset('storage/'.$image) }}" alt="Product Image" class="img-thumbnail" width="100"> --}}
                                    {{-- @endforeach --}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Attributes Section -->
                    <h3>Attributes</h3>
                    <div id="attributes-container">
                        @if (isset($product) && $product->attributes->count() > 0)
                            @foreach ($product->attributes as $index => $attribute)
                                <div class="attribute mb-3" id="attribute-{{ $index }}">
                                    <label for="attributes[{{ $index }}][title]" class="form-label">Title</label>
                                    <input type="text" name="attributes[{{ $index }}][title]" class="form-control"
                                           required value="{{ old('attributes.' . $index . '.title', $attribute->title) }}">
                                    <label for="attributes[{{ $index }}][description]" class="form-label">Description</label>
                                    <textarea name="attributes[{{ $index }}][description]" class="form-control" required>{{ old('attributes.' . $index . '.description', $attribute->description) }}</textarea>
                                </div>
                            @endforeach
                        @else
                            <div class="attribute mb-3" id="attribute-0">
                                <label for="attributes[0][title]" class="form-label">Title</label>
                                <input type="text" name="attributes[0][title]" class="form-control" required>
                                <label for="attributes[0][description]" class="form-label">Description</label>
                                <textarea name="attributes[0][description]" class="form-control" required></textarea>
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add-attribute" class="btn btn-secondary">Add Attribute</button>

                    <!-- Documents Section -->
                    <h3>Documents</h3>
                    <div id="documents-container">
                        @if (isset($product) && $product->documents->count() > 0)
                            @foreach ($product->documents as $index => $document)
                                <div class="document mb-3" id="document-{{ $index }}">
                                    <label for="documents[{{ $index }}][type]" class="form-label">Type</label>
                                    <select name="documents[{{ $index }}][type]" class="form-control" required>
                                        <option value="Software"
                                            {{ old('documents.' . $index . '.type', $document->type) == 'Software' ? 'selected' : '' }}>
                                            Software</option>
                                        <option value="PDF"
                                            {{ old('documents.' . $index . '.type', $document->type) == 'PDF' ? 'selected' : '' }}>
                                            PDF</option>
                                        <option value="Driver"
                                            {{ old('documents.' . $index . '.type', $document->type) == 'Driver' ? 'selected' : '' }}>
                                            Driver</option>
                                    </select>
                                    <label for="documents[{{ $index }}][file_path]" class="form-label">File</label>
                                    <input type="file" name="documents[{{ $index }}][file_path]" class="form-control">
                                    @if ($document->file_path)
                                        <div>
                                            <h5>Existing Document:</h5>
                                            <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">View Document</a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="document mb-3" id="document-0">
                                <label for="documents[0][type]" class="form-label">Type</label>
                                <select name="documents[0][type]" class="form-control" required>
                                    <option value="Software">Software</option>
                                    <option value="PDF">PDF</option>
                                    <option value="Driver">Driver</option>
                                </select>
                                <label for="documents[0][file_path]" class="form-label">File</label>
                                <input type="file" name="documents[]" id="documents" class="form-control" multiple>
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add-document" class="btn btn-secondary">Add Document</button>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Serial Number</label>
                        <div class="col-sm-9">
                        <input type="number" class="form-control" id="serial_number" name="serial_number" value="{{ old('serial_number',$product->serial_number ?? $nextSerialNumber) }}" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success mt-3">
                            {{ isset($product) ? 'Update Product' : 'Save Product' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        let attributeCount = {{ count($product->attributes ?? []) }};
        let documentCount = {{ count($product->documents ?? []) }};

        document.getElementById('add-attribute').addEventListener('click', function() {
            const container = document.getElementById('attributes-container');
            const newAttribute = document.createElement('div');
            newAttribute.classList.add('attribute', 'mb-3');
            newAttribute.id = `attribute-${attributeCount}`;

            newAttribute.innerHTML = `
                <label for="attributes[${attributeCount}][title]" class="form-label">Title</label>
                <input type="text" name="attributes[${attributeCount}][title]" class="form-control" required>
                <label for="attributes[${attributeCount}][description]" class="form-label">Description</label>
                <textarea name="attributes[${attributeCount}][description]" class="form-control" required></textarea>
            `;

            container.appendChild(newAttribute);
            attributeCount++;
        });

        document.getElementById('add-document').addEventListener('click', function() {
            const container = document.getElementById('documents-container');
            const newDocument = document.createElement('div');
            newDocument.classList.add('document', 'mb-3');
            newDocument.id = `document-${documentCount}`;

            newDocument.innerHTML = `
                <label for="documents[${documentCount}][type]" class="form-label">Type</label>
                <select name="documents[${documentCount}][type]" class="form-control" required>
                    <option value="Software">Software</option>
                    <option value="PDF">PDF</option>
                    <option value="Driver">Driver</option>
                </select>
                <label for="documents[${documentCount}][file_path]" class="form-label">File</label>
                <input type="file" name="documents[${documentCount}][file_path]" class="form-control">
            `;

            container.appendChild(newDocument);
            documentCount++;
        });
    </script>

    <script>
     document.addEventListener('DOMContentLoaded', function() {
    var categorySelect = document.getElementById('category');
    var subcategorySelect = document.getElementById('sub_category');
    var selectedSubcategoryId = {{ old('subcategory_id', $product->subcategory_id ?? 'null') }};

    // Pre-select subcategory if category is already set
    if (categorySelect.value) {
        fetchSubcategories(categorySelect.value, selectedSubcategoryId);
    }

    categorySelect.addEventListener('change', function() {
        var categoryId = this.value;
        subcategorySelect.innerHTML = '<option value="">Select a Subcategory</option>';

        if (categoryId) {
            fetchSubcategories(categoryId);
        }
    });

    // Function to fetch subcategories and set selected subcategory if exists
    function fetchSubcategories(categoryId, selectedSubcategory = null) {
        fetch(`/admin/products/subcategories/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                if (data.subcategories) {
                    data.subcategories.forEach(function(subcategory) {
                        var option = document.createElement('option');
                        option.value = subcategory.id;
                        option.textContent = subcategory.name;

                        // Set the selected subcategory if it matches
                        if (selectedSubcategory && subcategory.id == selectedSubcategory) {
                            option.selected = true;
                        }

                        subcategorySelect.appendChild(option);
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching subcategories:', error);
            });
    }
});

    </script>
@endsection

@endsection
