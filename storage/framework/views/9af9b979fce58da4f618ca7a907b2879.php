<!-- resources/views/admin/category/partials/category_option.blade.php -->

<!-- Display the category itself -->
<option value="<?php echo e($category->id); ?>"
    <?php if(old('parent_id', $category->id) == $category->id): ?> selected <?php endif; ?>>
    <?php
        // Indentation for each level
        $indent = str_repeat('&nbsp;', $level * 4);
    ?>
    <?php echo $indent; ?><?php echo e($category->name); ?>

</option>

<!-- Recursively display child categories if they exist -->
<?php if($category->children): ?>
    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('admin.category.partials.category_option', ['category' => $child, 'level' => $level + 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<!-- resources/views/admin/category/partials/category_option.blade.php -->

<!-- Display the category itself -->
<!-- resources/views/admin/category/partials/category_option.blade.php -->

<!-- Display the category itself -->

<?php /**PATH D:\prince\prince-gpm\group-project-main\resources\views/admin/category/partials/category_option.blade.php ENDPATH**/ ?>