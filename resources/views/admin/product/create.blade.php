@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">{{ isset($product) ? 'Edit Product' : 'Create Product' }}</h2>
        <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @isset($product)
                @method('PUT')
            @endisset

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Product Name -->
            <div class="form-group mb-4">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $product->name ?? '') }}" required>
            </div>

            <!-- Product Price -->
            <div class="form-group mb-4">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control"
                    value="{{ old('price', $product->price ?? '') }}" required>
            </div>

            <!-- Category -->
            {{-- <div class="form-group mb-4">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Subcategory -->
            <div class="form-group mb-4">
                <label for="subcategory_id">Subcategory</label>
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                    <option value="">Select Subcategory</option>
                    <!-- Subcategories will be populated dynamically here -->
                </select>
            </div> --}}

            <div class="form-group mb-4">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @if ($category->children)
                            @foreach ($category->children as $childCategory)
                                @include('admin.product.partials.category-options', [
                                    'category' => $childCategory,
                                    'level' => 1,
                                ])
                            @endforeach
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Brand -->
            <div class="form-group mb-4">
                <label for="brand_id">Brand</label>
                <select name="brand_id" id="brand_id" class="form-control">
                    <option value="">Select Brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}"
                            {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Description -->
            <div class="form-group mb-4">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            <!-- Serial Number -->
            <div class="form-group mb-4">
                <label for="serial_number">Serial Number</label>
                <input type="text" name="serial_number" id="serial_number" class="form-control"
                    value="{{ old('serial_number', $product->serial_number ?? '') }}" required>
            </div>

            <!-- Product Images -->
            <div class="form-group mb-4">
                <label for="images">Product Images</label>
                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                @if (isset($product) && $product->images)
                    <div class="mt-3">
                        <h5>Existing Images</h5>
                        <div class="d-flex flex-wrap">
                            @foreach (json_decode($product->images) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Product Image"
                                    class="img-thumbnail me-2 mb-2" width="100" height="100">
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Documents -->
            <h3 class="mt-5 mb-3">Documents</h3>
            <div id="documents-container" class="mb-4">
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
                                <div class="mt-2">
                                    <h5>Existing Document:</h5>
                                    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">View
                                        Document</a>
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
                        <input type="file" name="documents[0][file_path]" class="form-control">
                    </div>
                @endif
            </div>
            <button type="button" class="btn btn-success btn-sm text-white float-end" id="add-document">+ Add
                Document</button>

            <!-- Attributes -->
            <h3 class="mt-5 mb-3">Attributes</h3>
            <div id="attributes" class="mb-4">
                @foreach ($product->attributes ?? [] as $index => $attribute)
                    <div class="attribute-row mb-3">
                        <input type="text" name="attributes[{{ $index }}][title]" class="form-control mb-2"
                            placeholder="Attribute Title"
                            value="{{ old('attributes.' . $index . '.title', $attribute->title) }}" required>
                        <textarea name="attributes[{{ $index }}][description]" class="form-control mb-2"
                            placeholder="Attribute Description" required>{{ old('attributes.' . $index . '.description', $attribute->description) }}</textarea>
                        <button type="button" class="btn btn-danger remove-attribute">Remove</button>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-success btn-sm text-white float-end" id="add-attribute">+ Add
                Attribute</button>

            <button type="submit"
                class="btn btn-primary mt-4">{{ isset($product) ? 'Update Product' : 'Create Product' }}</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        // Add document input fields dynamically
        document.getElementById('add-document').addEventListener('click', function() {
            const documentRow = document.createElement('div');
            documentRow.classList.add('document', 'mb-3');
            const index = document.querySelectorAll('.document').length;
            documentRow.innerHTML = `
                <label for="documents[${index}][type]" class="form-label">Type</label>
                <select name="documents[${index}][type]" class="form-control" required>
                    <option value="Software">Software</option>
                    <option value="PDF">PDF</option>
                    <option value="Driver">Driver</option>
                </select>
                <label for="documents[${index}][file_path]" class="form-label">File</label>
                <input type="file" name="documents[${index}][file_path]" class="form-control">
                <button type="button" class="btn btn-danger remove-document">Remove</button>
            `;
            document.getElementById('documents-container').appendChild(documentRow);
        });

        // Remove document input fields
        document.getElementById('documents-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-document')) {
                e.target.closest('.document').remove();
            }
        });

        // Add attribute input fields dynamically
        document.getElementById('add-attribute').addEventListener('click', function() {
            const attributeRow = document.createElement('div');
            attributeRow.classList.add('attribute-row', 'mb-3');
            const index = document.querySelectorAll('.attribute-row').length;
            attributeRow.innerHTML = `
                <input type="text" name="attributes[${index}][title]" class="form-control mb-2" placeholder="Attribute Title" required>
                <textarea name="attributes[${index}][description]" class="form-control mb-2" placeholder="Attribute Description" required></textarea>
                <button type="button" class="btn btn-danger remove-attribute">Remove</button>
            `;
            document.getElementById('attributes').appendChild(attributeRow);
        });

        // Remove attribute input fields
        document.getElementById('attributes').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-attribute')) {
                e.target.closest('.attribute-row').remove();
            }
        });

        // Load subcategories based on category selection
        // document.addEventListener('DOMContentLoaded', function() {
        //     var categorySelect = document.getElementById('category_id');
        //     var subcategorySelect = document.getElementById('subcategory_id');

        //     categorySelect.addEventListener('change', function() {
        //         var categoryId = this.value;
        //         subcategorySelect.innerHTML = '<option value="">Select a Subcategory</option>';

        //         if (categoryId) {
        //             fetch(`/admin/products/subcategories/${categoryId}`)
        //                 .then(response => response.json())
        //                 .then(data => {
        //                     if (data.subcategories) {
        //                         data.subcategories.forEach(function(subcategory) {
        //                             var option = document.createElement('option');
        //                             option.value = subcategory.id;
        //                             option.textContent = subcategory.name;
        //                             subcategorySelect.appendChild(option);
        //                         });
        //                     }
        //                 })
        //                 .catch(error => {
        //                     console.error('Error fetching subcategories:', error);
        //                 });
        //         }
        //     });
        // });

        document.addEventListener('DOMContentLoaded', function() {
            const categorySelect = document.getElementById('category_id');
            const subcategoriesContainer = document.getElementById('subcategories-container');

            categorySelect.addEventListener('change', function() {
                const categoryId = this.value;

                // Clear existing subcategory dropdowns
                subcategoriesContainer.innerHTML = '';

                if (categoryId) {
                    fetchSubcategories(categoryId, null, subcategoriesContainer);
                }
            });

            function fetchSubcategories(categoryId, parentId, container) {
                fetch(`/admin/products/subcategories/${categoryId}?parent_id=${parentId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.subcategories.length > 0) {
                            const subcategoryDiv = document.createElement('div');
                            subcategoryDiv.classList.add('form-group', 'mb-4');

                            const subcategoryLabel = document.createElement('label');
                            subcategoryLabel.textContent = 'Subcategory';
                            subcategoryDiv.appendChild(subcategoryLabel);

                            const subcategorySelect = document.createElement('select');
                            subcategorySelect.name = 'subcategory_ids[]';
                            subcategorySelect.classList.add('form-control');
                            subcategorySelect.required = true;

                            const defaultOption = document.createElement('option');
                            defaultOption.value = '';
                            defaultOption.textContent = 'Select Subcategory';
                            subcategorySelect.appendChild(defaultOption);

                            data.subcategories.forEach(subcategory => {
                                const option = document.createElement('option');
                                option.value = subcategory.id;
                                option.textContent = subcategory.name;
                                subcategorySelect.appendChild(option);
                            });

                            subcategoryDiv.appendChild(subcategorySelect);
                            container.appendChild(subcategoryDiv);

                            subcategorySelect.addEventListener('change', function() {
                                // Remove subsequent dropdowns
                                const siblings = Array.from(container.children);
                                const index = siblings.indexOf(subcategoryDiv);
                                siblings.slice(index + 1).forEach(sibling => sibling.remove());

                                if (this.value) {
                                    fetchSubcategories(categoryId, this.value, container);
                                }
                            });
                        }
                    })
                    .catch(error => console.error('Error fetching subcategories:', error));
            }
        });
    </script>
@endsection
