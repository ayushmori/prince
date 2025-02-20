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
                                <img src="{{ asset('' . $image) }}" alt="Product Image"
                                    class="img-thumbnail me-2 mb-2" width="100" height="100">
                            @endforeach
                        </div>

                    </div>
                @endif

            </div>

            <!-- Documents -->
            <h3 class="mt-5 mb-3">Documents</h3>
            {{-- <div id="documents-container" class="mb-4">
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
            <button type="button" class="btn btn-success btn-sm text-white float-end" id="add-document">
                + AddDocument
            </button> --}}


            {{-- NEW --}}
            <div id="documents-container" class="mb-4">
                @if (isset($product) && $product->documents->count() > 0)
                    @foreach ($product->documents as $index => $document)
                        <div class="document mb-3" id="document-{{ $index }}">
                            <label for="documents[{{ $index }}][type]" class="form-label">Type</label>
                            <select name="documents[{{ $index }}][type]" class="form-control" required>
                                <option value="Software" {{ $document->type == 'Software' ? 'selected' : '' }}>Software</option>
                                <option value="PDF" {{ $document->type == 'PDF' ? 'selected' : '' }}>PDF</option>
                                <option value="Driver" {{ $document->type == 'Driver' ? 'selected' : '' }}>Driver</option>
                            </select>
                            <label for="documents[{{ $index }}][file_path]" class="form-label">File</label>
                            <input type="file" name="documents[{{ $index }}][file_path]" class="form-control">
                            @if ($document->file_path)
                                <div class="mt-2">
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
                        <input type="file" name="documents[0][file_path]" class="form-control">
                    </div>
                @endif
            </div>
            <button type="button" class="btn btn-success btn-sm text-white float-end" id="add-document">
                + Add Document
            </button>


            {{-- Attributes --}}
            <div class="container mt-5">
                <h3 class="mb-4">Attributes</h3>
                <div id="attributes" class="mb-4">
                    @if (!empty($product->attributes))
                        @foreach ($product->attributes as $index => $attribute)
                            <div class="card attribute-row mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Attribute {{ $index + 1 }}</h5>
                                    <!-- Main Attribute Inputs -->
                                    <input type="text" name="attributes[{{ $index }}][title]"
                                        class="form-control mb-2" placeholder="Attribute Title"
                                        value="{{ old('attributes.' . $index . '.title', $attribute->title) }}" required>
                                    <textarea name="attributes[{{ $index }}][description]" class="form-control mb-3"
                                        placeholder="Attribute Description" required>{{ old('attributes.' . $index . '.description', $attribute->description) }}</textarea>

                                    <!-- Short Attributes Section -->
                                    <div class="card  p-3 mb-3">
                                        <h6>Short Attributes</h6>
                                        <div class="short-attributes-container">
                                            @foreach ($attribute->shortAttributes as $shortIndex => $shortAttribute)
                                                <div class="row short-attribute-row mb-2">
                                                    <div class="col-md-5">
                                                        <input type="text"
                                                            name="attributes[{{ $index }}][short_attributes][{{ $shortIndex }}][id]"
                                                            value="{{ $shortAttribute->id }}">
                                                        <input type="text"
                                                            name="attributes[{{ $index }}][short_attributes][{{ $shortIndex }}][key]"
                                                            class="form-control" placeholder="Key"
                                                            value="{{ old('attributes.' . $index . '.short_attributes.' . $shortIndex . '.key', $shortAttribute->key) }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text"
                                                            name="attributes[{{ $index }}][short_attributes][{{ $shortIndex }}][value]"
                                                            class="form-control" placeholder="Value"
                                                            value="{{ old('attributes.' . $index . '.short_attributes.' . $shortIndex . '.value', $shortAttribute->value) }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-2 text-end">
                                                        <button type="button"
                                                            class="btn btn-danger remove-short-attribute">Remove</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <button type="button" class="btn btn-primary btn-sm add-short-attribute">+ Add
                                            Short Attribute</button>
                                    </div>
                                    <button type="button" class="btn btn-danger remove-attribute">Remove
                                        Attribute</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default empty row if no attributes exist -->
                        <div class="card attribute-row mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Attribute 1</h5>
                                <input type="text" name="attributes[0][title]" class="form-control mb-2"
                                    placeholder="Attribute Title" required>
                                <textarea name="attributes[0][description]" class="form-control mb-3" placeholder="Attribute Description" required></textarea>
                                <div class="card bg-light p-3 mb-3">
                                    <h6>Short Attributes</h6>
                                    <div class="short-attributes-container">
                                        <div class="row short-attribute-row mb-2">
                                            @foreach ($product->attributes as $index => $attribute)
                                                <div class="card attribute-row mb-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Attribute {{ $index + 1 }}</h5>
                                                        <input type="text"
                                                            name="attributes[{{ $index }}][title]"
                                                            class="form-control mb-2" placeholder="Attribute Title"
                                                            required value="{{ $attribute->title }}">
                                                        <textarea name="attributes[{{ $index }}][description]" class="form-control mb-3"
                                                            placeholder="Attribute Description" required>{{ $attribute->description }}</textarea>

                                                        <div class="card bg-light p-3 mb-3">
                                                            @foreach ($product->attributes as $index => $attribute)
                                                                <div class="card attribute-row mb-3">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Attribute
                                                                            {{ $index + 1 }}</h5>
                                                                        <input type="text"
                                                                            name="attributes[{{ $index }}][title]"
                                                                            class="form-control mb-2"
                                                                            placeholder="Attribute Title" required
                                                                            value="{{ $attribute->title }}">
                                                                        <textarea name="attributes[{{ $index }}][description]" class="form-control mb-3"
                                                                            placeholder="Attribute Description" required>{{ $attribute->description }}</textarea>

                                                                        <div class="card bg-light p-3 mb-3">
                                                                            <h6>Short Attributes</h6>
                                                                            <div class="short-attributes-container">
                                                                                @foreach ($attribute->shortAttributes as $shortIndex => $shortAttribute)
                                                                                    <div
                                                                                        class="row short-attribute-row mb-2">
                                                                                        <div class="col-md-5">
                                                                                            <input type="text"
                                                                                                name="attributes[{{ $index }}][short_attributes][{{ $shortIndex }}][key]"
                                                                                                class="form-control"
                                                                                                placeholder="Key" required
                                                                                                value="{{ $shortAttribute->key }}">
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <input type="text"
                                                                                                name="attributes[{{ $index }}][short_attributes][{{ $shortIndex }}][value]"
                                                                                                class="form-control"
                                                                                                placeholder="Value"
                                                                                                required
                                                                                                value="{{ $shortAttribute->value }}">
                                                                                        </div>
                                                                                        <div class="col-md-2 text-end">
                                                                                            <button type="button"
                                                                                                class="btn btn-danger remove-short-attribute">Remove</button>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-sm add-short-attribute">+
                                                                                Add Short Attribute</button>
                                                                        </div>
                                                                        <button type="button"
                                                                            class="btn btn-danger remove-attribute">Remove
                                                                            Attribute</button>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm add-short-attribute">+ Add Short
                                        Attribute</button>
                                </div>
                                <button type="button" class="btn btn-danger remove-attribute">Remove Attribute</button>
                            </div>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-success text-white float-end" id="add-attribute">+ Add
                    Attribute</button>
            </div>


            <button type="submit"
                class="btn btn-primary mb-4">{{ isset($product) ? 'Update Product' : 'Create Product' }}</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        // Add document input fields dynamically
        // document.getElementById('add-document').addEventListener('click', function() {
        //     const documentRow = document.createElement('div');
        //     documentRow.classList.add('document', 'mb-3');
        //     const index = document.querySelectorAll('.document').length;
        //     documentRow.innerHTML = `
        //         <label for="documents[${index}][type]" class="form-label">Type</label>
        //         <select name="documents[${index}][type]" class="form-control" required>
        //             <option value="Software">Software</option>
        //             <option value="PDF">PDF</option>
        //             <option value="Driver">Driver</option>
        //         </select>
        //         <label for="documents[${index}][file_path]" class="form-label">File</label>
        //         <input type="file" name="documents[${index}][file_path]" class="form-control">
        //         <button type="button" class="btn btn-danger remove-document mt-3">Remove</button>
        //     `;
        //     document.getElementById('documents-container').appendChild(documentRow);
        // });

        // // Remove document input fields
        // document.getElementById('documents-container').addEventListener('click', function(e) {
        //     if (e.target.classList.contains('remove-document')) {
        //         e.target.closest('.document').remove();
        //     }
        // });


        // NEW
        document.addEventListener('DOMContentLoaded', function() {
            // Add document input fields dynamically
            document.getElementById('add-document').addEventListener('click', function() {
                const documentsContainer = document.getElementById('documents-container');
                const index = documentsContainer.querySelectorAll('.document').length; // Get the current number of documents

                // Create a new document row
                const documentRow = document.createElement('div');
                documentRow.classList.add('document', 'mb-3');
                documentRow.innerHTML = `
                    <label for="documents[${index}][type]" class="form-label">Type</label>
                    <select name="documents[${index}][type]" class="form-control" required>
                        <option value="Software">Software</option>
                        <option value="PDF">PDF</option>
                        <option value="Driver">Driver</option>
                    </select>
                    <label for="documents[${index}][file_path]" class="form-label">File</label>
                    <input type="file" name="documents[${index}][file_path]" class="form-control">
                    <button type="button" class="btn btn-danger remove-document mt-3">Remove</button>
                `;

                // Append the new document row to the container
                documentsContainer.appendChild(documentRow);
            });

            // Remove document input fields
            document.getElementById('documents-container').addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-document')) {
                    e.target.closest('.document').remove(); // Remove the closest document row
                }
            });
        });



        document.addEventListener('DOMContentLoaded', function() {
            // Add new attribute row
            document.getElementById('add-attribute').addEventListener('click', function() {
                const index = document.querySelectorAll('.attribute-row').length;
                const attributeRow = document.createElement('div');
                attributeRow.classList.add('card', 'attribute-row', 'mb-3');
                attributeRow.innerHTML = `
            <div class="card-body">
                <h5 class="card-title">Attribute ${index + 1}</h5>
                <input type="text" name="attributes[${index}][title]" class="form-control mb-2" placeholder="Attribute Title" required>
                <textarea name="attributes[${index}][description]" class="form-control mb-3" placeholder="Attribute Description" required></textarea>

                <div class="card bg-light p-3 mb-3">
                    <h6>Short Attributes</h6>
                    <div class="short-attributes-container">
                        <div class="row short-attribute-row mb-2">
                            <div class="col-md-5">
                                <input type="text" name="attributes[${index}][short_attributes][0][key]" class="form-control" placeholder="Key" required>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="attributes[${index}][short_attributes][0][value]" class="form-control" placeholder="Value" required>
                            </div>
                            <div class="col-md-2 text-end">
                                <button type="button" class="btn btn-danger remove-short-attribute">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm add-short-attribute">+ Add Short Attribute</button>
                </div>
                <button type="button" class="btn btn-danger remove-attribute">Remove Attribute</button>
            </div>
        `;
                document.getElementById('attributes').appendChild(attributeRow);
            });

            // Delegate events to dynamically manage short attributes and attributes
            document.getElementById('attributes').addEventListener('click', function(e) {
                // Remove an attribute row
                if (e.target.classList.contains('remove-attribute')) {
                    e.target.closest('.attribute-row').remove();
                }

                // Add short attribute row dynamically
                if (e.target.classList.contains('add-short-attribute')) {
                    const shortAttributesContainer = e.target.previousElementSibling;
                    const attributeIndex = [...document.querySelectorAll('.attribute-row')].indexOf(e.target
                        .closest('.attribute-row'));
                    const shortIndex = shortAttributesContainer.querySelectorAll('.short-attribute-row')
                        .length;

                    const shortAttributeRow = document.createElement('div');
                    shortAttributeRow.classList.add('row', 'short-attribute-row', 'mb-2');
                    shortAttributeRow.innerHTML = `
                <div class="col-md-5">
                    <input type="text" name="attributes[${attributeIndex}][short_attributes][${shortIndex}][key]" class="form-control" placeholder="Key" required>
                </div>
                <div class="col-md-5">
                    <input type="text" name="attributes[${attributeIndex}][short_attributes][${shortIndex}][value]" class="form-control" placeholder="Value" required>
                </div>
                <div class="col-md-2 text-end">
                    <button type="button" class="btn btn-danger remove-short-attribute">Remove</button>
                </div>
            `;
                    shortAttributesContainer.appendChild(shortAttributeRow);
                }

                // Remove a short attribute row
                if (e.target.classList.contains('remove-short-attribute')) {
                    e.target.closest('.short-attribute-row').remove();
                }
            });
        });

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
