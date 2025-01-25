<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h2 class="mb-4"><?php echo e(isset($product) ? 'Edit Product' : 'Create Product'); ?></h2>
        <form action="<?php echo e(isset($product) ? route('products.update', $product->id) : route('products.store')); ?>" method="POST"
            enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($product)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Product Name -->
            <div class="form-group mb-4">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="<?php echo e(old('name', $product->name ?? '')); ?>" required>
            </div>

            <!-- Product Price -->
            <div class="form-group mb-4">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control"
                    value="<?php echo e(old('price', $product->price ?? '')); ?>" required>
            </div>

            <!-- Category -->
            

            <div class="form-group mb-4">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"
                            <?php echo e(old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                        <?php if($category->children): ?>
                            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('admin.product.partials.category-options', [
                                    'category' => $childCategory,
                                    'level' => 1,
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Brand -->
            <div class="form-group mb-4">
                <label for="brand_id">Brand</label>
                <select name="brand_id" id="brand_id" class="form-control">
                    <option value="">Select Brand</option>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($brand->id); ?>"
                            <?php echo e(old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : ''); ?>>
                            <?php echo e($brand->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Description -->
            <div class="form-group mb-4">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"><?php echo e(old('description', $product->description ?? '')); ?></textarea>
            </div>

            <!-- Serial Number -->
            <div class="form-group mb-4">
                <label for="serial_number">Serial Number</label>
                <input type="text" name="serial_number" id="serial_number" class="form-control"
                    value="<?php echo e(old('serial_number', $product->serial_number ?? '')); ?>" required>
            </div>

            <!-- Product Images -->
            <div class="form-group mb-4">
                <label for="images">Product Images</label>
                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                <?php if(isset($product) && $product->images): ?>
                    <div class="mt-3">
                        <h5>Existing Images</h5>
                        <div class="d-flex flex-wrap">
                            <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e(asset('storage/' . $image)); ?>" alt="Product Image"
                                    class="img-thumbnail me-2 mb-2" width="100" height="100">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Documents -->
            <h3 class="mt-5 mb-3">Documents</h3>
            <div id="documents-container" class="mb-4">
                <?php if(isset($product) && $product->documents->count() > 0): ?>
                    <?php $__currentLoopData = $product->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="document mb-3" id="document-<?php echo e($index); ?>">
                            <label for="documents[<?php echo e($index); ?>][type]" class="form-label">Type</label>
                            <select name="documents[<?php echo e($index); ?>][type]" class="form-control" required>
                                <option value="Software"
                                    <?php echo e(old('documents.' . $index . '.type', $document->type) == 'Software' ? 'selected' : ''); ?>>
                                    Software</option>
                                <option value="PDF"
                                    <?php echo e(old('documents.' . $index . '.type', $document->type) == 'PDF' ? 'selected' : ''); ?>>
                                    PDF</option>
                                <option value="Driver"
                                    <?php echo e(old('documents.' . $index . '.type', $document->type) == 'Driver' ? 'selected' : ''); ?>>
                                    Driver</option>
                            </select>
                            <label for="documents[<?php echo e($index); ?>][file_path]" class="form-label">File</label>
                            <input type="file" name="documents[<?php echo e($index); ?>][file_path]" class="form-control">
                            <?php if($document->file_path): ?>
                                <div class="mt-2">
                                    <h5>Existing Document:</h5>
                                    <a href="<?php echo e(asset('storage/' . $document->file_path)); ?>" target="_blank">View
                                        Document</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
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
                <?php endif; ?>
            </div>
            <button type="button" class="btn btn-success btn-sm text-white float-end" id="add-document">+ Add
                Document</button>
            



            

            <div class="container mt-5">
                <h3 class="mb-4">Attributes</h3>
                <div id="attributes" class="mb-4">
                    <?php if(!empty($product->attributes)): ?>
                        <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card attribute-row mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Attribute <?php echo e($index + 1); ?></h5>
                                    <!-- Main Attribute Inputs -->
                                    <input type="text" name="attributes[<?php echo e($index); ?>][title]"
                                        class="form-control mb-2" placeholder="Attribute Title"
                                        value="<?php echo e(old('attributes.' . $index . '.title', $attribute->title)); ?>" required>
                                    <textarea name="attributes[<?php echo e($index); ?>][description]" class="form-control mb-3"
                                        placeholder="Attribute Description" required><?php echo e(old('attributes.' . $index . '.description', $attribute->description)); ?></textarea>

                                    <!-- Short Attributes Section -->
                                    <div class="card  p-3 mb-3">
                                        <h6>Short Attributes</h6>
                                        <div class="short-attributes-container">
                                            <?php $__currentLoopData = $attribute->shortAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shortIndex => $shortAttribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row short-attribute-row mb-2">
                                                    <div class="col-md-5">
                                                        <input type="text"
                                                               name="attributes[<?php echo e($index); ?>][short_attributes][<?php echo e($shortIndex); ?>][id]"
                                                               value="<?php echo e($shortAttribute->id); ?>">
                                                        <input type="text"
                                                               name="attributes[<?php echo e($index); ?>][short_attributes][<?php echo e($shortIndex); ?>][key]"
                                                               class="form-control" placeholder="Key"
                                                               value="<?php echo e(old('attributes.' . $index . '.short_attributes.' . $shortIndex . '.key', $shortAttribute->key)); ?>"
                                                               required>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text"
                                                               name="attributes[<?php echo e($index); ?>][short_attributes][<?php echo e($shortIndex); ?>][value]"
                                                               class="form-control" placeholder="Value"
                                                               value="<?php echo e(old('attributes.' . $index . '.short_attributes.' . $shortIndex . '.value', $shortAttribute->value)); ?>"
                                                               required>
                                                    </div>
                                                    <div class="col-md-2 text-end">
                                                        <button type="button"
                                                                class="btn btn-danger remove-short-attribute">Remove</button>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                        <button type="button" class="btn btn-primary btn-sm add-short-attribute">+ Add
                                            Short Attribute</button>
                                    </div>
                                    <button type="button" class="btn btn-danger remove-attribute">Remove
                                        Attribute</button>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
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
                                          <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card attribute-row mb-3">
        <div class="card-body">
            <h5 class="card-title">Attribute <?php echo e($index + 1); ?></h5>
            <input type="text" name="attributes[<?php echo e($index); ?>][title]" class="form-control mb-2" placeholder="Attribute Title" required value="<?php echo e($attribute->title); ?>">
            <textarea name="attributes[<?php echo e($index); ?>][description]" class="form-control mb-3" placeholder="Attribute Description" required><?php echo e($attribute->description); ?></textarea>

            <div class="card bg-light p-3 mb-3">
                <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card attribute-row mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Attribute <?php echo e($index + 1); ?></h5>
                        <input type="text" name="attributes[<?php echo e($index); ?>][title]" class="form-control mb-2" placeholder="Attribute Title" required value="<?php echo e($attribute->title); ?>">
                        <textarea name="attributes[<?php echo e($index); ?>][description]" class="form-control mb-3" placeholder="Attribute Description" required><?php echo e($attribute->description); ?></textarea>

                        <div class="card bg-light p-3 mb-3">
                            <h6>Short Attributes</h6>
                            <div class="short-attributes-container">
                                <?php $__currentLoopData = $attribute->shortAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shortIndex => $shortAttribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row short-attribute-row mb-2">
                                        <div class="col-md-5">
                                            <input type="text" name="attributes[<?php echo e($index); ?>][short_attributes][<?php echo e($shortIndex); ?>][key]" class="form-control" placeholder="Key" required value="<?php echo e($shortAttribute->key); ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="attributes[<?php echo e($index); ?>][short_attributes][<?php echo e($shortIndex); ?>][value]" class="form-control" placeholder="Value" required value="<?php echo e($shortAttribute->value); ?>">
                                        </div>
                                        <div class="col-md-2 text-end">
                                            <button type="button" class="btn btn-danger remove-short-attribute">Remove</button>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm add-short-attribute">+ Add Short Attribute</button>
                        </div>
                        <button type="button" class="btn btn-danger remove-attribute">Remove Attribute</button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm add-short-attribute">+ Add Short
                                        Attribute</button>
                                </div>
                                <button type="button" class="btn btn-danger remove-attribute">Remove Attribute</button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="button" class="btn btn-success text-white float-end" id="add-attribute">+ Add
                    Attribute</button>
            </div>


            <button type="submit"
                class="btn btn-primary mt-4"><?php echo e(isset($product) ? 'Update Product' : 'Create Product'); ?></button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
            const attributeIndex = [...document.querySelectorAll('.attribute-row')].indexOf(e.target.closest('.attribute-row'));
            const shortIndex = shortAttributesContainer.querySelectorAll('.short-attribute-row').length;

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prince-project\group-project-main\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>