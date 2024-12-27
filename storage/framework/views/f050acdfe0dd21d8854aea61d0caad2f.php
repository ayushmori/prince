<option value="<?php echo e($category->id); ?>"
    <?php echo e(old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : ''); ?>>
    <?php echo e(str_repeat('--', $level)); ?> <?php echo e($category->name); ?>

</option>
<?php if($category->children): ?>
    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('admin.product.partials.category-options', ['category' => $childCategory, 'level' => $level + 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\group-porject\resources\views/admin/product/partials/category-options.blade.php ENDPATH**/ ?>