<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\xampp\htdocs\group-project-main\resources\views/frontend/category/partials/product_list.blade.php ENDPATH**/ ?>