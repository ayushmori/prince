<tr>
    <td><?php echo e($category->id); ?></td>
    <td><?php echo str_repeat('&nbsp;', $level * 4); ?><?php echo e($category->name); ?></td> <!-- Indented based on the level -->
    <td><?php echo e($category->parentCategory ? $category->parentCategory->name : 'None'); ?></td>
    <td>
        <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
        <form action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="POST" style="display:inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
    </td>
</tr>
<?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('admin.category.category_item', ['category' => $child, 'level' => $level + 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\Laravel\Project - Laravel\group-project-main\resources\views/admin/category/category_item.blade.php ENDPATH**/ ?>