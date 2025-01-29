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

                <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="categories" data-bs-toggle="tab" data-bs-target="#categories-tab-pane" type="button" role="tab" aria-controls="categories-tab-pane" aria-selected="true" style="border-top:2px solid #2561a8">Subcategories</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="categories-tab-pane" role="tabpanel" aria-labelledby="categories-tab" tabindex="0">
                        <main class="category-list mt-4">
                            <div class="row row-cols-1 row-cols-md-3 g-4" id="subcategory-list">
                                <?php $__currentLoopData = $childCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col">
                                        <div class="card h-100">
                                            <img src="<?php echo e(asset('uploads/category/' . $subcategory->image)); ?>" alt="<?php echo e($subcategory->name); ?>" class="card-img-top" style="object-fit: cover; height: 200px;">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title"><?php echo e($subcategory->name); ?></h5>
                                                <p class="card-text"><?php echo e($subcategory->description); ?></p>
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
                </div>
            <?php else: ?>
                <p>No category found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.filter-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selectedCategories = Array.from(document.querySelectorAll('input[name="category[]"]:checked')).map(cb => cb.value);
                const selectedBrands = Array.from(document.querySelectorAll('input[name="brand[]"]:checked')).map(cb => cb.value);

                fetchFilteredSubcategories(selectedCategories, selectedBrands);
            });
        });
    });

    function fetchFilteredSubcategories(categories, brands) {
        const url = new URL('<?php echo e(route("categories.filter")); ?>');
        url.searchParams.append('categories', categories.join(','));
        url.searchParams.append('brands', brands.join(','));

        fetch(url, {
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            }
        })
        .then(response => response.json())
        .then(data => {
            const subcategoryList = document.getElementById('subcategory-list');
            subcategoryList.innerHTML = '';

            data.subcategories.forEach(subcategory => {
                const subcategoryCard = `
                    <div class="col">
                        <div class="card h-100">
                            <img src="${subcategory.image}" alt="${subcategory.name}" class="card-img-top" style="object-fit: cover; height: 200px;">
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
        })
        .catch(error => console.error('Error fetching filtered subcategories:', error));
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group-project-main\resources\views/frontend/category/show.blade.php ENDPATH**/ ?>