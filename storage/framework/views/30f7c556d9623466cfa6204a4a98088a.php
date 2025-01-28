<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('assets/css/product.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/exzoom/jquery.exzoom.css')); ?>" rel="stylesheet">

<p class="product-path text-muted mt-3 ms-3">
    Products & Services
    <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        > <a href="<?php echo e(url('/category', $category->id)); ?>"><?php echo e($category->name); ?></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    > <?php echo e($product->name); ?>

</p>

<main class="product-page">
    <div class="py-4">
        <div class="container">
            <div class="row">

                <!-- Product Image Section -->
                <div class="col-md-5 mt-3">
                    <div class="product-images bg-white border">
                        <?php if($product->images): ?>
                            <div class="exzoom" id="exzoom">
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        <?php
                                            $images = json_decode(str_replace('\\', '/', $product->images), true);
                                        ?>
                                        <?php $__currentLoopData = $images ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($image)): ?>
                                                <li><img class="w-100 h-100" src="<?php echo e(asset($image)); ?>" alt="Product Image" /></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn">&lt;</a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn">&gt;</a>
                                </p>
                            </div>
                        <?php else: ?>
                            <div class="text-center p-4">
                                No Image Available
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Product Details Section -->
                <div class="col-md-7 mt-3">
                    <div class="product-details">
                        <h2 class="product-name"><?php echo e($product->name); ?></h2>
                        <hr>

                        <!-- Pricing Section -->
                        <div class="mb-3">
                            <?php if(isset($product->price)): ?>
                                <h3 class="text-primary">Price: ₹<?php echo e($product->price); ?></h3>
                            <?php else: ?>
                                <h3 class="text-primary">Price not available</h3>
                            <?php endif; ?>
                        </div>

                        <!-- Stock Status -->
                        <div class="mb-3">
                            <?php if($product->stock > 0): ?>
                                <span class="badge bg-success">In Stock</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Out of Stock</span>
                            <?php endif; ?>
                        </div>

                        <!-- Product Description -->
                        <div class="mb-4">
                            <h5 class="mb-2">Description</h5>
                            <p><?php echo $product->description; ?></p>
                        </div>

                        <!-- Product Serial Number -->
                        <div class="mb-3">
                            <h6>Serial Number</h6>
                            <p><?php echo e($product->serial_number); ?></p>
                        </div>

                        <!-- Actions -->
                        <div class="actions mt-4">
                            <a href="#" class="btn btn-primary me-3">Add to My Products</a>
                            <input type="checkbox" class="form-check-input ms-3" id="compareCheck">
                            <label class="form-check-label" for="compareCheck">Compare</label>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-outline-primary w-100">Buy Online</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo e(asset('assets/exzoom/jquery.exzoom.js')); ?>"></script>
<style>
ul {
    list-style-type: none;
}
</style>
<script>
    $(document).ready(function() {
        if ($("#exzoom").length) {
            $("#exzoom").exzoom({
                navWidth: 60,
                navHeight: 60,
                navItemNum: 5,
                navItemMargin: 7,
                navBorder: 1,
                autoPlay: true,
                autoPlayTimeout: 2000,
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group-project-main\resources\views/frontend/product/show.blade.php ENDPATH**/ ?>