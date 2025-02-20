<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Main Document</h3>
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
                        <li class="breadcrumb-item">Document</li>
                        <li class="breadcrumb-item active">Document View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Document
                            <a href="<?php echo e(url('admin/main-documents/create')); ?>"
                                class="btn btn-danger btn-sm text-white float-end">Add</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product_id</th>
                                        <th>type</th>
                                        <th>title</th>
                                        <th>File-Path</th>
                                        <th>description</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($document->id); ?></td>
                                            <td><?php echo e($document->product->name); ?></td>
                                            <td><?php echo e($document->type); ?></td>
                                            <td><?php echo e($document->title); ?></td>
                                            <td><?php echo e($document->file_path); ?></td>
                                            <td>
                                                <p><?php echo e($document->description); ?></p>
                                            </td>
                                            <td><?php echo e($document->created_at); ?></td>

                                            <td>
                                                <!-- Edit Button -->
                                                <a href="<?php echo e(route('main-documents.edit', $document->id)); ?>" class="btn btn-success btn-sm">
                                                  Edit
                                              </a>


                                                    <!-- Delete Button (Form Approach) -->
                                                    <form
                                                        action="
                                                        <?php echo e(route('admin.main-documents.destroy', $document->id)); ?>

                                                         "
                                                        method="POST" style="display: inline;"
                                                        onsubmit="return confirm('Are you sure you want to delete this document?');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            Delete
                                                        </button>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prince\prince-gpm\group-project-main\resources\views/admin/document/index.blade.php ENDPATH**/ ?>