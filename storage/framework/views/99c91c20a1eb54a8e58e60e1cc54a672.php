<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Product Details</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg></a></li>
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item active">Product View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Product Attributes Card -->
                <div class="card">
                    <div class="card-header">
                        <h3>Product Attributes</h3>
                    </div>
                    <div class="card-body">
                        <ul class="attribute-list">
                            <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="attribute-item">
                                    <strong class="attribute-title"><?php echo e($attribute->title); ?>:</strong>
                                    <span class="attribute-description"><?php echo e($attribute->description); ?></span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <!-- Product Documents Card -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>Product Documents</h3>
                    </div>
                    <div class="card-body">
                        <ul class="document-list">
                            <?php $__currentLoopData = $product->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="document-item">
                                    <strong class="document-type">Type:</strong> <span><?php echo e($document->type); ?></span> <br>
                                    <a href="<?php echo e(asset($document->file_path)); ?>" target="_blank" class="document-link">Download</a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <!-- Add New Product Button -->
                <div class="d-flex justify-content-end my-3">
                    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary btn-sm text-white">
                        Add New Product
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<style>
    /* General Section Styling */
    .card {
        margin-bottom: 30px;
    }

    .card-header {
        background-color: #f1f1f1;
        font-size: 1.25em;
        padding: 10px;
        color: #333;
        border-bottom: 1px solid #ddd;
    }

    .card-body {
        padding: 15px;
        background-color: #fff;
    }

    /* Attributes Section */
    .attribute-list {
        list-style-type: none;
        padding: 0;
    }

    .attribute-item {
        margin-bottom: 8px;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .attribute-item:hover {
        background-color: #f1f1f1;
    }

    .attribute-title {
        font-weight: bold;
        color: #007bff;
    }

    .attribute-description {
        font-size: 1em;
        color: #555;
    }

    /* Documents Section */
    .document-list {
        list-style-type: none;
        padding: 0;
    }

    .document-item {
        margin-bottom: 10px;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .document-item:hover {
        background-color: #f1f1f1;
    }

    .document-type {
        font-weight: bold;
        color: #007bff;
    }

    .document-link {
        display: inline-block;
        margin-top: 5px;
        padding: 8px 15px;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
    }

    .document-link:hover {
        background-color: #0056b3;
    }
</style>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group-porject\resources\views/admin/product/show.blade.php ENDPATH**/ ?>