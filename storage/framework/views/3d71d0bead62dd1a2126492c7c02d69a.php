<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Category</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(url('admin')); ?>" data-bs-original-title="" title="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Category</li>
                        <li class="breadcrumb-item active">Category Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <?php if(session('message')): ?>
                <div class="alert alert-success mb-3"><?php echo e(session('message')); ?></div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h3>Add Category
                        <a href="<?php echo e(url('admin/categories')); ?>" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.categories.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!-- Name -->
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="name" required>
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Slug</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="slug" required>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="description" required>
                            </div>
                        </div>

                        <!-- Serial Number -->
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Serial Number</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="serial_number" required>
                            </div>
                        </div>

                        <!-- Parent Category -->
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Parent Categories</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="parent_id">
                                    <option value="">None</option>
                                    <?php $__currentLoopData = $parentCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <!-- Display category and recursively display its children -->
                                        <?php echo $__env->make('admin.category.partials.category_option', ['category' => $category, 'level' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>




                        <!-- Image -->
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group-porject\resources\views/admin/category/create.blade.php ENDPATH**/ ?>