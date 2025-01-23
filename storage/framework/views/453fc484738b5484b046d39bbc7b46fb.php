<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <!-- Left Side Filter with Checkbox -->
        <div class="col-md-3">
            <h4>Filter by Category</h4>
            <ul class="list-group">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <input type="checkbox" class="form-check-input" id="cat-<?php echo e($cat->id); ?>" onclick="filterCategory('<?php echo e(url('/category', $cat->id)); ?>')">
                        <label for="cat-<?php echo e($cat->id); ?>" class="form-check-label"><?php echo e($cat->name); ?></label>
                        <!-- Check if category has subcategories -->
                        <?php if(isset($cat->subcategories) && $cat->subcategories->count() > 0): ?>
                            <ul class="list-group mt-2">
                                <?php $__currentLoopData = $cat->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        <input type="checkbox" class="form-check-input" id="subcat-<?php echo e($subcat->id); ?>" onclick="filterCategory('<?php echo e(url('/subcategory', $subcat->id)); ?>')">
                                        <label for="subcat-<?php echo e($subcat->id); ?>" class="form-check-label"><?php echo e($subcat->name); ?></label>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="mb-3"><?php echo e($category->name); ?></h1>
                    <h3 style="color: #2561a8; padding:bottom:10px;"><?php echo e($category->description); ?></h3>
                    <p><?php echo e($category->slug); ?></p>
                    <div class="d-flex mt-3">
                        <a href="#" class="btn text-white" style="background-color: #2561a8; padding:5px 30px;"><b>Contact Sales</b></a>
                        <a href="#" class="btn" style="border: 1px solid black; margin-left:20px;"><b>Contact Support</b></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="<?php echo e(asset('uploads/category/' . $category->image)); ?>" alt="<?php echo e($category->name); ?>" style="width: 300px; margin-left:300px">
                </div>
            </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="product" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true" style="border-top:2px solid #2561a8">Product</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <main class="product-list">
                        <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product-item">
                                <?php
                                    $images = json_decode(str_replace('\\', '/', $product->images), true);
                                ?>

                                <?php if(!empty($images) && is_array($images)): ?>
                                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($image)): ?>
                                            <img src="<?php echo e(url($image)); ?>" alt="Product Image" class="img-thumbnail">
                                        <?php else: ?>
                                            <p>No image available for this entry.</p>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <p>No images available</p>
                                <?php endif; ?>

                                <p class="product-code"><?php echo e($product['serial_number']); ?></p>
                                <p class="product-desc"><b><?php echo e($product['name']); ?></b></p>
                                <a href="<?php echo e(url('/product', $product->id)); ?>" class="btn" style="border: 1px solid black; padding:5px 100px;">View Details</a>
                                <a href="" class="documents-link">Documents</a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function filterCategory(url) {
        window.location.href = url;
    }
</script>

<style>
    .list-group-item {
        border: none;
        padding: 10px 15px;
    }

    .list-group-item label {
        cursor: pointer;
        margin-left: 5px;
    }

    .list-group {
        margin-bottom: 20px;
    }
</style>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prince-project\group-project-main\resources\views/frontend/category/show.blade.php ENDPATH**/ ?>