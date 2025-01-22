<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Products</h1>
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($product->name); ?></h5>
                            <p class="card-text">
                                <strong>Price:</strong> $<?php echo e(number_format($product->price, 2)); ?><br>
                                
                                <strong>Category:</strong> <?php echo e($product->category->name); ?>

                            </p>
                        </div>
                        <?php
                            $images = json_decode(str_replace('\\', '/', $product->images), true);
                        ?>

                        <?php if(!empty($images) && is_array($images)): ?>
                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($image)): ?>
                                    <img src="<?php echo e(url($image)); ?>" alt="Product Image" class="img-thumbnail" width="50"
                                        height="50">
                                <?php else: ?>
                                    <p>No image available for this entry.</p>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p>No images available</p>
                        <?php endif; ?>

                        <div class="card-footer text-center">
                            <a href="<?php echo e(url('/product', $product->id)); ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <p class="text-center">No products available.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\liveProject\wetransfer_group-project-main-2-zip_2025-01-15_1212\group-project-main (2)\group-project-main\resources\views/frontend/product/index.blade.php ENDPATH**/ ?>