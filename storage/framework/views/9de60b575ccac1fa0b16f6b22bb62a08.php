<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <!-- Left Side Filter with Checkbox -->
        <div class="col-md-3 mt-3">
            <div class="card mb-4">
                <h5 class="card-header text-white fw-bold" style="background-color: #0d6efd;">Categories</h5>
                <div class="card-body">
                    <!-- Show categories with parent_id equal to the current category's ID -->
                    <?php if($childCategories && $childCategories->count() > 0): ?>
                        <div class="subcategories ms-3">
                            <?php $__currentLoopData = $childCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-2">
                                    <input type="checkbox"
                                        class="form-check-input me-2 filter-checkbox"
                                        name="category[]"
                                        id="cat-<?php echo e($subcategory->id); ?>"
                                        value="<?php echo e($subcategory->id); ?>"
                                        <?php echo e(request()->is('category/' . $subcategory->id) ? 'checked' : ''); ?>>
                                    <label for="cat-<?php echo e($subcategory->id); ?>" class="form-check-label">
                                        <?php echo e($subcategory->name); ?>

                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Brands Filter -->
            <div class="card mb-4">
                <h5 class="card-header text-white fw-bold" style="background-color: #0d6efd;">Brands</h5>
                <div class="card-body">
                    <?php $__currentLoopData = $relatedBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($brand): ?> 
                            <div class="mb-2">
                                <input type="checkbox"
                                    class="form-check-input me-2 filter-checkbox"
                                    name="brand[]"
                                    id="brand-<?php echo e($brand->id); ?>"
                                    value="<?php echo e($brand->id); ?>"
                                    <?php echo e(request()->is('brand/' . $brand->id) ? 'checked' : ''); ?>>
                                <label for="brand-<?php echo e($brand->id); ?>" class="form-check-label">
                                    <?php echo e($brand->name); ?>

                                </label>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Clear Filter Button -->
            <div class="mb-4">
                <button class="btn btn-secondary w-100" id="clear-filters">Clear Filters</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <?php if($category): ?>
                <p class="product-path text-muted mt-3 ms-3">
                    Products & Services
                    <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        > <a href="<?php echo e(url('/category', $category->id)); ?>"><?php echo e($category->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    > <?php echo e($category->name); ?>

                </p>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="mb-3"><?php echo e($category->name); ?></h1>
                        <h3 style="color: #2561a8; padding-bottom:10px;"><?php echo e($category->description); ?></h3>
                        <p><?php echo e($category->slug); ?></p>
                        <div class="d-flex mt-3">
                            <a href="#" class="btn text-white" style="background-color: #2561a8; padding:5px 30px;"><b>Contact Sales</b></a>
                            <a href="#" class="btn" style="border: 1px solid black; margin-left:20px;"><b>Contact Support</b></a>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <img src="<?php echo e(asset('uploads/category/' . $category->image)); ?>" alt="<?php echo e($category->name); ?>" style="width: 300px;">
                    </div>
                </div>

                <!-- Tabs -->
                <ul class="nav nav-tabs mt-4" id="categoryTabs">
                    <?php if($childCategories->count() > 0): ?>
                        <li class="nav-item">
                            <button class="nav-link active" id="subcategories-tab" data-bs-toggle="tab" data-bs-target="#subcategories-pane" type="button">Subcategories</button>
                        </li>
                    <?php endif; ?>

                    <?php if($category->products->count() > 0): ?>
                        <li class="nav-item">
                            <button class="nav-link <?php echo e($childCategories->count() == 0 ? 'active' : ''); ?>" id="products-tab" data-bs-toggle="tab" data-bs-target="#products-pane" type="button">Products</button>
                        </li>
                    <?php endif; ?>
                </ul>

                <div class="tab-content">
                    <!-- Subcategories Tab -->
                    <?php if($childCategories->count() > 0): ?>
                    <div class="tab-pane fade show active" id="subcategories-pane">
                        <main class="category-list mt-4">
                            <div class="row row-cols-1 row-cols-md-3 g-4" id="subcategory-list">
                                <?php $__currentLoopData = $childCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col">
                                        <div class="card h-100 shadow-sm d-flex flex-column">
                                            <img src="<?php echo e(asset('uploads/category/' . $subcategory->image)); ?>" alt="<?php echo e($subcategory->name); ?>" class="card-img-top" style="object-fit: cover; height: 200px;">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title text-primary text-truncate"><?php echo e($subcategory->name); ?></h5>
                                                <p class="card-text text-muted text-truncate"><?php echo e($subcategory->description); ?></p>
                                                <div class="mt-auto">
                                                    <a href="<?php echo e(url('/category', $subcategory->id)); ?>" class="btn btn-primary mb-2">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </main>
                    </div>
                    <?php endif; ?>

                    <!-- Products Tab -->
                    <?php if($category->products->count() > 0): ?>
                    <div class="tab-pane fade <?php echo e($childCategories->count() == 0 ? 'show active' : ''); ?>" id="products-pane">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mt-3">
                            <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col">
                                    <div class="card">
                                        <?php
                                            $images = json_decode(str_replace('\\', '/', $product->images), true);
                                        ?>
                
                                        <div class="card-img-top">
                                            <?php if(!empty($images) && is_array($images)): ?>
                                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!empty($image)): ?>
                                                        <img src="<?php echo e(url($image)); ?>" alt="Product Image" class="img-fluid" />
                                                    <?php else: ?>
                                                        <p>No image available for this entry.</p>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <p>No images available</p>
                                            <?php endif; ?>
                                        </div>
                
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-primary text-truncate"><?php echo e($product->name); ?></h5>
                                            <p class="card-text text-muted text-truncate"><?php echo e($product->serial_number); ?></p>
                                            <p class="card-text"><strong>Price:</strong> $<?php echo e(number_format($product->price, 2)); ?></p>
                                            <div class="mt-auto">
                                                <a href="<?php echo e(url('/product', $product->id)); ?>" class="btn btn-primary mb-2">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                </div>

            <?php else: ?>
                <p>No category found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.filter-checkbox');
        const clearFiltersButton = document.getElementById('clear-filters');
        const currentCategoryId = '<?php echo e($category->id); ?>';

        // Function to update the display based on selected filters
        function updateDisplay() {
            const selectedCategories = Array.from(document.querySelectorAll('input[name="category[]"]:checked')).map(cb => cb.value);
            const selectedBrands = Array.from(document.querySelectorAll('input[name="brand[]"]:checked')).map(cb => cb.value);

            console.log('Selected Categories:', selectedCategories);
            console.log('Selected Brands:', selectedBrands);

            if (selectedCategories.length === 0 && selectedBrands.length === 0) {
                loadSubcategoriesAndProducts(currentCategoryId);
            } else {
                fetchFilteredData(selectedCategories, selectedBrands);
            }
        }

        // Add event listeners to checkboxes
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateDisplay);
        });

        // Clear filters button
        clearFiltersButton.addEventListener('click', function () {
            checkboxes.forEach(checkbox => checkbox.checked = false);
            loadSubcategoriesAndProducts(currentCategoryId);
        });

        // Load subcategories and products for the current category
        function loadSubcategoriesAndProducts(categoryId) {
            fetch(`/category/${categoryId}`, {
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                updateSubcategoryList(data.childCategories);
                updateProductList(data.products);
            })
            .catch(error => console.error('Error:', error));
        }

        // Fetch filtered data based on selected categories and brands
        function fetchFilteredData(categories, brands) {
            const url = new URL('<?php echo e(route("categories.filter")); ?>');

            if (categories.length > 0) {
                url.searchParams.set('categories', categories.join(','));
            }
            // else {
            //     url.searchParams.delete('categories');
            // }

            if (brands.length > 0) {
                url.searchParams.set('brands', brands.join(',')); // Ensure brand filter is added
            }
            // else {
            //     url.searchParams.delete('brands');
            // }

            url.searchParams.set('parent_id', currentCategoryId);

            console.log('Fetching URL:', url.toString()); // Debugging line

            fetch(url, {
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Filtered Data:', data); // Debugging line
                updateSubcategoryList(data.subcategories);
                updateProductList(data.products);


                // If brand filters are applied, update the product list
                if (brands.length > 0) {
                    updateProductList(data.products);
                } else {
                    updateSubcategoryList(data.subcategories);
                    updateProductList(data.products);
                }


            })
            .catch(error => console.error('Error:', error));
        }

        // Update subcategory list in the UI
        function updateSubcategoryList(subcategories) {
            const subcategoryList = document.getElementById('subcategory-list');
            subcategoryList.innerHTML = '';

            subcategories.forEach(subcategory => {
                const subcategoryCard = `
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="/uploads/category/${subcategory.image}" alt="${subcategory.name}" class="card-img-top" style="object-fit: cover; height: 200px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-primary text-truncate">${subcategory.name}</h5>
                                <p class="card-text text-muted text-truncate">${subcategory.description}</p>
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

        // Update product list in the UI
        function updateProductList(products) {
            const productList = document.querySelector('#products-pane .row');
            productList.innerHTML = ''; // Clear previous products

            if (products.length === 0) {
                productList.innerHTML = '<p class="text-center text-muted">No products found.</p>';
                return;
            }

            products.forEach(product => {
                const productCard = `
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="/uploads/products/${product.image}" alt="${product.name}" class="card-img-top" style="object-fit: cover; height: 200px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-primary text-truncate">${product.name}</h5>
                                <p class="card-text text-muted text-truncate">${product.serial_number}</p>
                                <p class="card-text"><strong>Price:</strong> $${product.price.toFixed(2)}</p>
                                <div class="mt-auto">
                                    <a href="/product/${product.id}" class="btn btn-primary mb-2">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                productList.insertAdjacentHTML('beforeend', productCard);
            });
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prince\prince-gpm\group-project-main\resources\views/frontend/category/show.blade.php ENDPATH**/ ?>