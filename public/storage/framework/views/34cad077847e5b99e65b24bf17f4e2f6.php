<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="mb-4">Product Details</h2>

        <!-- Product Basic Details -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Basic Details</h4>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> <?php echo e($product->name); ?></p>
                <p><strong>Price:</strong> $<?php echo e(number_format($product->price, 2)); ?></p>
                <p><strong>Category:</strong> <?php echo e($product->category->name ?? 'N/A'); ?></p>
                <p><strong>Subcategory:</strong> <?php echo e($product->subcategory->name ?? 'N/A'); ?></p>
                <p><strong>Serial Number:</strong> <?php echo e($product->serial_number); ?></p>
                <p><strong>Description:</strong> <?php echo e($product->description ?? 'No description provided.'); ?></p>
            </div>
        </div>

        <!-- Attributes Section -->
        <?php $__currentLoopData = $product->attributes ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">
                    <h4><?php echo e($attribute->title); ?></h4>
                </div>
                <div class="card-body">
                    

                    <!-- Short Attributes Table -->
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Key</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $attribute->short_attributes ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shortAttribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($shortAttribute['key'] ?? 'N/A'); ?></td>
                                    <td><?php echo e($shortAttribute['value'] ?? 'N/A'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <!-- Display message if no short attributes are available -->
                    <?php if(empty($attribute->short_attributes)): ?>
                        <p><strong>No short attributes available for this attribute.</strong></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- If no attributes available, show this message -->
        <?php if(empty($product->attributes)): ?>
            <p><strong>Attributes:</strong> No attributes available.</p>
        <?php endif; ?>

        <!-- Documents Section -->
        <?php $__currentLoopData = $product->documents ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h4>Documents</h4>
                </div>
                <div class="card-body">
                    <ul>
                        <li>
                            <a href="<?php echo e(asset($document->file_path)); ?>" target="_blank" class="btn btn-link">
                                <?php echo e($document->type ?? 'Document'); ?>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- If no documents available, show this message -->
        <?php if(empty($product->documents)): ?>
            <p><strong>Documents:</strong> No documents available.</p>
        <?php endif; ?>

        <!-- Images Section -->
        <?php $__currentLoopData = json_decode($product->images, true) ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h4>Images</h4>
                </div>
                <div class="card-body">
                    <img src="<?php echo e(asset($image)); ?>" alt="Product Image" class="img-fluid rounded">
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- If no images available, show this message -->
        <?php if(empty($product->images) || json_decode($product->images, true) == null): ?>
            <p><strong>Images:</strong> No images available.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Project - Laravel\group-project-main\resources\views/admin/product/show.blade.php ENDPATH**/ ?>