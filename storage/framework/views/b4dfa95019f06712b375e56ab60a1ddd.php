

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Contact-Us</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Contact Us</li>
                    <li class="breadcrumb-item active">Contact-Us View</li>
                </ol>
            </div>
        </div>
    </div>
</div>



<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">List of Contact Form Submissions</h4>
        </div>
        <div class="card-body">
            <?php if($submissions->isEmpty()): ?>
                <div class="alert alert-warning" role="alert">
                    No form submissions available.
                </div>
            <?php else: ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($submission->name); ?></td>
                                <td><?php echo e($submission->email); ?></td>
                                <td><?php echo e($submission->phone); ?></td>
                                <td><?php echo e($submission->message); ?></td>
                                <td><?php echo e($submission->created_at->format('d M Y, h:i A')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group-porject\resources\views/admin/contact-us/index.blade.php ENDPATH**/ ?>