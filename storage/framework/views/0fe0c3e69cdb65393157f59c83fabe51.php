


<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('assets/css/product.css')); ?>" rel="stylesheet">
<p class="product-path" style="margin:10px 150px;">
                        Home / <?php echo e($product->category->name); ?> / <?php echo e($product->name); ?>

</p>


<main class="product-page">

        <div class="product-image">
        
            <?php
                            $images = json_decode(str_replace('\\', '/', $product->images), true);
                        ?>

                        <?php if(!empty($images) && is_array($images)): ?>
                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($image)): ?>
                                    <img src="<?php echo e(url($image)); ?>" alt="Product Image" class="img-thumbnail" width="50"
                                        height="50">
                                <?php else: ?>
                                    <p>No image available for this entry.</p>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p>No images available</p>
                        <?php endif; ?>
        </div>


        
        <div class="product-details">
            <h1 class="name"><b><?php echo e($product->name); ?></b></h1>
            <p style="margin:20px 0px;"><?php echo e($product->serial_number); ?></p>
            <a href="#" style="color:blue; padding-bottom:5px;">Add to My Products</a>
            
          
          
    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="margin-left:20px;">
    <label class="form-check-label" for="exampleCheck1" >Compare</label>

    <div class="environmental__top_block__wrapper">
                    

                <button href="#" class="btn" style="border: 1px solid black; padding:5px 100px; margin-top:20px;">Buy Online</buton>
            </div>
           
        </div>
    </main>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<script>
    $(function(){

$("#exzoom").exzoom({

  // thumbnail nav options
  "navWidth": 60,
  "navHeight": 60,
  "navItemNum": 5,
  "navItemMargin": 7,
  "navBorder": 1,

 
  "autoPlay": false,

 
  "autoPlayTimeout": 2000
  
});

});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\muskan\group-project-main\resources\views/frontend/product/show.blade.php ENDPATH**/ ?>