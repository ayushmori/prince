<?php $__env->startSection('title', 'News Page'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row mt-4">
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 d-flex align-items-stretch">
                        <a href="<?php echo e(route('newsview', $article->id)); ?>" class="card-link">
                            <div class="card h-100">
                                <a href="<?php echo e(route('newsview', $article->id)); ?>">
                                <img src="<?php echo e(asset($article->image)); ?>" class="card-img-top fixed-image" alt="<?php echo e($article->header); ?>">
                            </a>
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo e($article->header); ?></h3>
                                    <p class="card-text"><?php echo e(Str::limit($article->description, 150, '...')); ?></p> <!-- Adjusted limit to 150 characters -->
                                    <a href="<?php echo e(route('newsview', $article->id)); ?>" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<style>
    .fixed-image {
        height: 200px; /* Set a fixed height */
        width: 100%; /* Make the image fill the width of its container */
        object-fit: cover; /* Crop or fit the image to the specified dimensions */
    }

    .card {
        height: 100%; /* Ensure cards stretch to the same height */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-body {
        flex-grow: 1; /* Ensures body content adjusts dynamically */
    }
</style>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Project - Laravel\group-project-main\resources\views/frontend/news/index.blade.php ENDPATH**/ ?>