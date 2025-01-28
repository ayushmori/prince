<div class="footer pt-5 bg-secondary text-white">
    <div class="container">
        <div class="row">
            <!-- First Column: About Us -->
            <div class="col-md-3">
                <img src="<?php echo e(asset('assets/logoF.jpg')); ?>" class="img-fluid logo-img" alt="NeXT Solution">
                <p>
                    Founded in 2013, "NeXT SOLUTION" is an ISO-certified company based in Rajkot, Gujarat.
                </p>
            </div>

            <!-- Second Column: Quick Links -->
            <div class="col-md-2 text-center ">
                <h5 class="text-white">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-white">Home</a></li>
                    <li><a href="/about-us" class="text-light">About Us</a></li>
                    <li><a href="/contact-us" class="text-light">Contact Us</a></li>
                    <li><a href="/news" class="text-light">News</a></li>
                </ul>
            </div>

            <!-- Third Column: Categories -->
            <div class="col-md-2 text-center">
                <h5 class="text-white">Top Categories</h5>
                <ul class="list-unstyled">
                    <?php if($categories->isEmpty()): ?>
                        <li>No categories available.</li>
                    <?php else: ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(url('/category/' . $categoryItem->slug)); ?>" class="text-light">
                                    <?php echo e($categoryItem->name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Fourth Column: Brands -->
            <div class="col-md-2 text-center">
                <h5 class="text-white">Top Brands</h5>
                <ul class="list-unstyled">
                    <?php if($brands->isEmpty()): ?>
                        <li>No brands available.</li>
                    <?php else: ?>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(url('/brand/' . $brand->slug)); ?>" class="text-light">
                                    <?php echo e($brand->name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Fifth Column: Contact Information -->
            <div class="col-md-3 text-center">
                <h5 class="text-white">Contact Us</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-mobile-alt"></i> +91 82005 01951</li>
                    <li><i class="fas fa-envelope"></i> support@nextgroup.in</li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        Maruti Industrial Area,<br>
                        Ramwadi 2, Rolex Road,<br>
                        Near Maldhari Railway Crossing,<br>
                        Rajkot-4, (Guj.-India)
                    </li>
                </ul>
            </div>
        </div>

        <!-- Social Media Links -->
        <div class="text-center mt-4 float-end" >
            <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
            <a href="#" class="text-light me-3"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="#" class="text-light"><i class="fab fa-google fa-lg"></i></a>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="bg-light text-center py-3">
        <p class="mb-0 text-dark">
            © <span class="cYear">2024</span> All rights reserved. Design & Developed by
            <a href="http://www.jbsoftware.co.in" target="_blank" class="text-primary">Fuerte Developers</a>.
        </p>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\group-project-main\resources\views/layouts/inc/frontend/footer.blade.php ENDPATH**/ ?>