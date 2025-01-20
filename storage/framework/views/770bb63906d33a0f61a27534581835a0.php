<div class="exzoom" id="exzoom">
  <!-- Images -->
  <div class="exzoom_img_box">
    <ul class='exzoom_img_ul'>
      <div class="product-image">
        
        <?php
                        $images = json_decode(str_replace('\\', '/', $product->images), true);
                    ?>

                    <!--[if BLOCK]><![endif]--><?php if(!empty($images) && is_array($images)): ?>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!--[if BLOCK]><![endif]--><?php if(!empty($image)): ?>
                                <img src="<?php echo e(url($image)); ?>" alt="Product Image" class="img-thumbnail" width="50"
                                    height="50">
                            <?php else: ?>
                                <p>No image available for this entry.</p>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    <?php else: ?>
                        <p>No images available</p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    </ul>
  </div>
  
  <div class="exzoom_nav"></div>
  
  <p class="exzoom_btn">
      <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
      <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
  </p>
</div><?php /**PATH C:\xampp\htdocs\muskan\group-project-main\resources\views/livewire/products.blade.php ENDPATH**/ ?>