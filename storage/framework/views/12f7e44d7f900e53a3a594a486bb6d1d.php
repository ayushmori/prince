<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Document Type</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title=""><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg></a></li>
                        <li class="breadcrumb-item">Document Type</li>
                        <li class="breadcrumb-item active">Document Type View</li>
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
                        <h3>Document Type
                            <a href="<?php echo e(route('admin.documents-type.create')); ?>"
                                class="btn btn-primary btn-sm text-white float-end">Create Document Type</a>
                        </h3>
                    </div>

                    <div class="card-body">
                        <?php if(session('message')): ?>
                            <div class="alert alert-success"><?php echo e(session('message')); ?></div>
                        <?php endif; ?>

                        <?php if(session('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo e(session('error')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <div class="table-responsive product-table">
                            <table class="display dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Serial Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $documenttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documenttype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($documenttype->name); ?></td>
                                            <td>
                                                <?php if($documenttype->image): ?>
                                                    <img src="<?php echo e(asset($documenttype->image)); ?>" class="img-thumbnail"
                                                        style="width: 70px; height: 70px; border-radius: 50%;"
                                                        alt="<?php echo e($documenttype->name); ?>">
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(\Str::limit($documenttype->description, 50)); ?></td>
                                            <td><?php echo e($documenttype->serial_number); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.documents-type.form', $documenttype->id)); ?>"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <form
                                                    action="<?php echo e(route('admin.document-types.destroy', $documenttype->id)); ?>"
                                                    method="POST" style="display:inline-block;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prince\prince-gpm\group-project-main\resources\views/admin/document-type/index.blade.php ENDPATH**/ ?>