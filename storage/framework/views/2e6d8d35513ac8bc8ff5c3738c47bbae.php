<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col">
        <div class="card h-100">
            <img src="<?php echo e(asset('uploads/product/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="card-img-top" style="object-fit: cover; height: 200px;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo e($product->name); ?></h5>
                <p class="card-text"><?php echo e($product->description); ?></p>
                <div class="mt-auto">
                    <a href="<?php echo e(url('/product', $product->id)); ?>" class="btn btn-primary mb-2">View Details</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\group-project-main\resources\views/partials/product-list.blade.php ENDPATH**/ ?>