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
                                        onclick="filterCategory('<?php echo e(url('/category', $subcategory->id)); ?>', this)"
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
                                    onclick="filterCategory('<?php echo e(url('/brand', $brand->id)); ?>', this)"
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
                        <button class="nav-link active" id="product" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true" style="border-top:2px solid #2561a8">Product</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
                        <main class="product-list mt-4">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col">
                                        <div class="card h-100">
                                            <?php
                                                $images = json_decode(str_replace('\\', '/', $product->images), true);
                                            ?>

                                            <?php if(!empty($images) && is_array($images)): ?>
                                                <img src="<?php echo e(url($images[0])); ?>" alt="Product Image" class="card-img-top" style="object-fit: cover; height: 200px;">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('images/placeholder.png')); ?>" alt="No Image" class="card-img-top" style="object-fit: cover; height: 200px;">
                                            <?php endif; ?>

                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                                <p class="card-text"><?php echo e($product->serial_number); ?></p>
                                                <div class="mt-auto">
                                                    <a href="<?php echo e(url('/product', $product->id)); ?>" class="btn btn-primary mb-2">View Details</a>
                                                    <a href="#" class="btn btn-link">Documents</a>
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
    function filterCategory(url, checkbox) {
        window.location.href = url;
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group-project-main\resources\views/frontend/category/show.blade.php ENDPATH**/ ?>