<?php $__env->startSection('title', 'News Page'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- News Article Card -->
            <div class="col-md-8">
                <div class="card shadow-lg border-light">
                    <!-- Image -->
                    <img src="<?php echo e(asset($article->image)); ?>" class="card-img-top rounded-3"
                        alt="<?php echo e($article->header); ?>" style="height: 400px; object-fit: cover;">

                    <div class="card-body">
                        <!-- Article Header -->
                        <h3 class="card-title font-weight-bold"><?php echo e($article->header); ?></h3>

                        <!-- Main Description -->
                        <p class="card-text text-muted mb-4"><?php echo e($article->description); ?></p>

                        <!-- Short Details Section -->
                        <div class="short-details mt-4">
                            <h5 class="font-weight-bold">Details Information</h5>
                            <?php $__currentLoopData = $article->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="detail-box mb-4 border p-3 rounded shadow-sm">
                                    <!-- Short Image in Full Width -->
                                    <div class="mb-3">
                                        <?php if($detail->short_image): ?>
                                            <center>
                                                <img src="<?php echo e(asset($detail->short_image)); ?>"
                                                    alt="<?php echo e($detail->short_title); ?>" class="img-fluid rounded"
                                                    style="max-height: 200px; object-fit: cover;">
                                            </center>
                                            <hr>
                                        <?php else: ?>
                                           
                                        <?php endif; ?>
                                    </div>

                                    <!-- Short Title -->
                                    <h3 class="font-weight-bold"><?php echo e($detail->short_title); ?></h3 >

                                    <!-- Short Description -->
                                    <p class="text-muted"><?php echo e($detail->short_description); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Project - Laravel\group-project-main\resources\views/frontend/news/newsview.blade.php ENDPATH**/ ?>