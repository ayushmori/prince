<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt-5">
        <!-- Page Title and Breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Product List</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>" title=""><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg></a></li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item active">Product List</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Add New Product Button -->
        <div class="mb-4 text-right">
            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">+ Add New Product</a>
        </div>

        <!-- Product Table -->
        <div class="card">
            <div class="card-header">
                <h5>Individual column searching (text inputs) </h5><span>The searching functionality provided by DataTables
                    is useful for quickly search through the information in the table - however the search is global, and
                    you may wish to present controls that search on specific columns.</span>
            </div>
            <div class="card-body">
                <!-- Success/Error Message -->
                <?php if(session('message')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('message')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo e(session('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="table-responsive product-table">
                    <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                        <table class="display dataTable no-footer" id="basic-1" role="grid"
                            aria-describedby="basic-1_info">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Serial Number</th>
                                    <th>Images</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($product->id); ?></td>
                                        <td><?php echo e($product->name); ?></td>
                                        <td>$<?php echo e(number_format($product->price, 2)); ?></td>
                                        <td><?php echo e($product->category->name ?? 'N/A'); ?></td>
                                        <td><?php echo e($product->brand->name ?? 'N/A'); ?></td>
                                        <td><?php echo e($product->serial_number); ?></td>
                                        <td>
                                            <?php
                                                $images = json_decode(str_replace('\\', '/', $product->images), true);
                                            ?>

                                            <?php if(!empty($images) && is_array($images)): ?>
                                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!empty($image)): ?>
                                                        <img src="<?php echo e(url($image)); ?>" alt="Product Image"
                                                            class="img-thumbnail" width="50" height="50">
                                                    <?php else: ?>
                                                        <p>No image available for this entry.</p>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <p>No images available</p>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('products.show', $product->id)); ?>"
                                                class="btn btn-info btn-sm" data-bs-toggle="tooltip" title="View">
                                                <i class="bi bi-eye"></i> View
                                            </a>
                                            <a href="<?php echo e(route('products.edit', $product->id)); ?>"
                                                class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Edit">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST"
                                                style="display:inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="tooltip" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div class="dataTables_paginate paging_simple_numbers">
                            <?php echo e($products->links()); ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Project - Laravel\group-project-main\resources\views/admin/product/index.blade.php ENDPATH**/ ?>