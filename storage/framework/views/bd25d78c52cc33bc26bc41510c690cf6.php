<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3>Category: <?php echo e($category->name); ?></h3>
        <p><?php echo e($category->description); ?></p>

        <?php if($category->children->isNotEmpty()): ?>
            <h4>Subcategories</h4>
            <div class="row">
                <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-3">
                        <div class="category-item list-group-item border-0 p-2 mb-1 bg-white rounded shadow-sm">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="category-name"><?php echo e($child->name); ?></span>
                                <a href="<?php echo e(route('category.show', $child->slug)); ?>" class="btn btn-sm btn-outline-secondary">View</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group-porject\resources\views/frontend/category/show.blade.php ENDPATH**/ ?>