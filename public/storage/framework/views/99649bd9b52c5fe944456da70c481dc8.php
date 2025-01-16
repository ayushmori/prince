<?php $__env->startSection('title', 'About Us'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h4 class="display-4">About Us</h4>
            <div class="underline mx-auto mb-4"></div>
        </div>
    </div>

    <!-- About Us Section 1 -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <img src="<?php echo e(asset($aboutSettings->about_us_image_1)); ?>" alt="<?php echo e($aboutSettings->about_us_title_1); ?>" class="img-fluid rounded shadow mb-3">
        </div>
        <div class="col-md-6">
            <h2 class="text-primary"><?php echo e($aboutSettings->about_us_title_1); ?></h2>
            <p class="text-muted"><?php echo e($aboutSettings->about_us_description_1); ?></p>
        </div>
    </div>

    <!-- About Us Section 2 -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-6 order-md-2">
            <img src="<?php echo e(asset($aboutSettings->about_us_image_2)); ?>" alt="<?php echo e($aboutSettings->about_us_title_2); ?>" class="img-fluid rounded shadow mb-3">
        </div>
        <div class="col-md-6">
            <h2 class="text-primary"><?php echo e($aboutSettings->about_us_title_2); ?></h2>
            <p class="text-muted"><?php echo e($aboutSettings->about_us_description_2); ?></p>
        </div>
    </div>

    <!-- About Us Section 3 -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <img src="<?php echo e(asset($aboutSettings->about_us_image_3)); ?>" alt="<?php echo e($aboutSettings->about_us_title_3); ?>" class="img-fluid rounded shadow mb-3">
        </div>
        <div class="col-md-6">
            <h2 class="text-primary"><?php echo e($aboutSettings->about_us_title_3); ?></h2>
            <p class="text-muted"><?php echo e($aboutSettings->about_us_description_3); ?></p>
        </div>
    </div>

    <!-- Mission, Vision, and Goals Section -->
    <h2 class="text-center mb-4">Our Mission, Vision, and Goals</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="d-flex justify-content-center">
                    <img src="<?php echo e(asset($aboutSettings->mission_image)); ?>" class="card-img-top" alt="<?php echo e($aboutSettings->mission_title); ?>" style="max-width: 100%; height: auto;">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center text-primary"><?php echo e($aboutSettings->mission_title); ?></h5>
                    <p class="card-text text-muted"><?php echo e($aboutSettings->mission_description); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="d-flex justify-content-center">
                    <img src="<?php echo e(asset($aboutSettings->vision_image)); ?>" class="card-img-top" alt="<?php echo e($aboutSettings->vision_title); ?>" style="max-width: 100%; height: auto;">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center text-primary"><?php echo e($aboutSettings->vision_title); ?></h5>
                    <p class="card-text text-muted"><?php echo e($aboutSettings->vision_description); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="d-flex justify-content-center">
                    <img src="<?php echo e(asset($aboutSettings->goals_image)); ?>" class="card-img-top" alt="<?php echo e($aboutSettings->goals_title); ?>" style="max-width: 100%; height: auto;">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center text-primary"><?php echo e($aboutSettings->goals_title); ?></h5>
                    <p class="card-text text-muted"><?php echo e($aboutSettings->goals_description); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Project - Laravel\group-project-main\resources\views/frontend/pages/about-us.blade.php ENDPATH**/ ?>