<?php $__env->startSection('content'); ?>

<div class="row mt-4">
                           
                            <div class="col-md-2">
                                <h4>Parent Categories</h4>
                                <div class="category-container">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div id="category-<?php echo e($category->id); ?>"      >
                                            <?php echo e($category->name); ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\muskan\group-project-main\resources\views/frontend/category/show.blade.php ENDPATH**/ ?>