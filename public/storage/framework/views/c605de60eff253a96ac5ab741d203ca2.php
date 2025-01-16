<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <?php if($category->children->isNotEmpty()): ?>
            <!-- Design for Category with Subcategories -->
            <div class="row">
                <div class="col-md-3">
                    <!-- Sidebar for Filters -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Filters</h5>
                        </div>
                        <div class="card-body">
                            <h6>Category Type</h6>
                            <ul class="list-unstyled">
                                <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><input type="checkbox" id="filter1"> <label
                                            for="filter1"><?php echo e($child->name); ?></label></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <h4><?php echo e($category->name); ?> - Overview</h4>
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="text-center mb-4">
                                <img src="<?php echo e(asset('uploads/category/' . $category->image)); ?>" alt="<?php echo e($category->name); ?>"
                                    class="img-fluid" style="max-width: 200px; border: 5px solid #ddd;">
                            </div>

                            <p class="text-center mb-4"><?php echo e($category->description); ?></p>

                            <h5>Subcategories</h5>
                            <div class="row">
                                <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img src="<?php echo e(asset('uploads/category/' . $child->image)); ?>"
                                                alt="<?php echo e($child->name); ?>" class="img-fluid rounded-circle mx-auto d-block"
                                                style="max-width: 100px; border: 3px solid #ddd;">
                                            <div class="card-body">
                                                <h6 class="card-title text-center"><?php echo e($child->name); ?></h6>
                                                <p class="card-text text-center" style="font-size: 14px;">
                                                    <?php echo e($child->description); ?></p>
                                                <a href="<?php echo e(route('category.show', $child->id)); ?>"
                                                    class="btn btn-sm btn-primary btn-block">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php if($category->children->isEmpty()): ?>
                                <p class="text-center">No subcategories available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5>Products</h5>
                            </div>
                            <div class="card-body">
                                <h6>Category Products</h6>
                                <ul class="list-unstyled">
                                    <?php $__empty_1 = true; $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li>
                                            <strong><?php echo e($product->name); ?></strong> -
                                            $<?php echo e(number_format($product->price, 2)); ?>

                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <li class="text-muted">No products available in this category.</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-md-6">

                        <h1 class="mb-3"><?php echo e($category->name); ?></h1>
                        <p class="text-muted mb-1"><strong>Slug:</strong> <?php echo e($category->slug); ?></p>
                        <p><?php echo e($category->description); ?></p>
                        <div class="d-flex mt-3">
                            <a href="#" class="btn btn-sm btn-primary mx-1">Contact Support</a>
                            <a href="#" class="btn btn-sm btn-secondary">Contact Sales</a>
                        </div>
                    </div>
                    <div class="col-md-3">

                        <div class="float-end">
                            <img src="<?php echo e(asset('uploads/category/' . $category->image)); ?>" alt="<?php echo e($category->name); ?>"
                                class="img-fluid rounded shadow" style="max-width: 200px;">
                        </div>
                    </div>
                </div>


                <div class="container mt-4">
                    <ul class="nav nav-tabs justify-content-center" id="actionTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="attributes-tab" data-bs-toggle="tab"
                                data-bs-target="#attributes" type="button" role="tab" aria-controls="attributes"
                                aria-selected="true">
                                Attributes
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents"
                                type="button" role="tab" aria-controls="documents" aria-selected="false">
                                Documents
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="actionTabsContent">
                        <div class="tab-pane fade show active" id="attributes" role="tabpanel" aria-labelledby="attributes-tab">
                            <h5 class="mb-4">Product Attributes</h5>
                            <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-4">
                                    <h6 class="text-primary mb-3"><?php echo e($product->name); ?> - Attributes</h6>

                                    <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card mb-3 shadow-sm">
                                            <div class="card-body">
                                                <h6 class="card-title font-weight-bold"><?php echo e($attribute->title); ?></h6>
                                                <p class="card-text mb-2"><strong>Description:</strong> <?php echo e($attribute->description); ?></p>

                                                <!-- Display Short Attributes -->
                                                <?php if($attribute->shortAttributes->isNotEmpty()): ?>
                                                    <h6 class="mt-3 mb-2 text-muted">Short Attributes</h6>
                                                    <ul class="list-group">
                                                        <?php $__currentLoopData = $attribute->shortAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shortAttribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="list-group-item d-flex justify-content-between">
                                                                <span><strong><?php echo e($shortAttribute->key); ?></strong></span>
                                                                <span><?php echo e($shortAttribute->value); ?></span>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <p class="text-muted mt-2">No short attributes available for this item.</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>





                        <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                            <h5>Documents</h5>
                            <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card mb-4 mx-3">
                                    <div class="card-header">
                                        <h3><?php echo e($product->name); ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <?php $__empty_1 = true; $__currentLoopData = $product->mainDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <h6 class="card-title"><?php echo e($document->title); ?></h6>
                                                    <p class="card-text mb-1">
                                                        <strong>Type:</strong> <?php echo e(strtoupper($document->type)); ?>

                                                    </p>


                                                    <p class="card-text mb-2" style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                        <strong>Description:</strong> <?php echo e($document->description); ?>

                                                    </p>


                                                    <a href="<?php echo e(asset($document->file_path)); ?>" target="_blank" class="btn btn-primary btn-sm">
                                                        <i class="fas fa-download"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <p class="text-muted">No main documents available for this product.</p>
                                        <?php endif; ?>
                                    </div>


                                    <?php $__empty_1 = true; $__currentLoopData = $product->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h6 class="card-title"><?php echo e($document->type); ?></h6>
                                                <a href="<?php echo e(asset($document->file_path)); ?>" target="_blank" class="btn btn-sm btn-primary btn-sm">
                                                    <i class="fas fa-download"></i> Download
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <p class="text-muted">No other documents available for this product.</p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>


                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<style>
    .card {
        margin-left: 20px;
        margin-right: 20px;
    }
</style>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Project - Laravel\group-project-main\resources\views/frontend/category/show.blade.php ENDPATH**/ ?>