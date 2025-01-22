<?php $__env->startSection('content'); ?>

<div class="container">
<div class="row align-items-center">
                        <div class="col-md-6">

                            <h1 class="mb-3"><?php echo e($category->name); ?></h1>

                            <h3 style="color: #2561a8; padding:bottom:10px;"><?php echo e($category->description); ?></h3>
                            <p><?php echo e($category->slug); ?></p>
                            <div class="d-flex mt-3">
                            <a href="#" class="btn text-white" style="background-color: #2561a8; padding:5px 30px;"><b>Contact Sales</b></a>
                                <a href="#" class="btn" style="border: 1px solid black; margin-left:20px;" ><b>Contact Support</b></a>

                            </div
                            >
                        </div>
                        <div class="col-md-3" >


                                <img src="<?php echo e(asset('uploads/category/' . $category->image)); ?>" alt="<?php echo e($category->name); ?>"
                                  style="width: 300px; margin-left:300px">

                        </div>
                    </div>

</div>
</div>



<div class="container">


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="product" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true" style="border-top:2px solid #2561a8">Product</button>
  </li>

</ul>




<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">




  <main class="product-list">

        <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="product-item">
<?php
            $images = json_decode(str_replace('\\', '/', $product->images), true);
        ?>

        <?php if(!empty($images) && is_array($images)): ?>
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!empty($image)): ?>
                    <img src="<?php echo e(url($image)); ?>" alt="Product Image" class="img-thumbnail">
                <?php else: ?>
                    <p>No image available for this entry.</p>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p>No images available</p>
        <?php endif; ?>

<p class="product-code"><?php echo e($product['serial_number']); ?></p>
<p class="product-desc"><b><?php echo e($product['name']); ?></b></p>
<a href="<?php echo e(url('/product', $product->id)); ?>" class="btn" style="border: 1px solid black; padding:5px 100px;">View Details</a>
<a href="" class="documents-link">Documents</a>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </main>


  </div>

</div>


    </div>
<?php $__env->stopSection(); ?>
<style>
    .card {
        margin-left: 20px;
        margin-right: 20px;
    }
</style>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\liveProject\wetransfer_group-project-main-2-zip_2025-01-15_1212\group-project-main (2)\group-project-main\resources\views/frontend/category/show.blade.php ENDPATH**/ ?>