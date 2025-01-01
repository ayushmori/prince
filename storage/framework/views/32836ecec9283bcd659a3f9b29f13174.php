<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Sigle Silder</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title="">                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
            <li class="breadcrumb-item">Sigle Slider</li>
            <li class="breadcrumb-item active">View Sigle Slider</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Sigle Slider
                        <a href="<?php echo e(route('admin.secondsliders.create')); ?>" class="btn btn-danger btn-sm float-end">Add New</a>
                    </h3>
                </div>
                
                <div class="card-body">
                    <?php if(session('message')): ?>
                    <div class="alert alert-success"><?php echo e(session('message')); ?></div>
                <?php endif; ?>   
        
                <?php if(session('error')): ?>
                <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                <?php endif; ?> 

                    <div class="table-responsive product-table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $secondSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($slider->id); ?></td>
                                        <td><?php echo e($slider->title); ?></td>
                                        <td>
                                            <?php if($slider->image): ?>
                                            <img src="<?php echo e(asset('/uploads/second-slider/' . $slider->image)); ?>" alt="Slider Image" style="width: 70px; height: 70px; border-radius: 50%;">
                                            <?php else: ?>
                                            <span>No Image Available</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($slider->description); ?></td>
                                        <td>
                                            <span class="badge <?php echo e($slider->status ? 'bg-danger' : 'bg-success'); ?>">
                                                <?php echo e($slider->status ? 'Hidden' : 'Visible'); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.secondsliders.edit', $slider->id)); ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="<?php echo e(route('admin.secondsliders.destroy', $slider->id)); ?>" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this slider?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <!-- Add Pagination if applicable -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group-porject\resources\views/admin/second-slider/index.blade.php ENDPATH**/ ?>