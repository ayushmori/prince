<?php $__env->startSection('title', 'Home Page'); ?>

<?php $__env->startSection('content'); ?>


<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                <?php if($sliderItem->image): ?>
                    <img src="<?php echo e(asset('/uploads/slider/' . $sliderItem->image)); ?>" class="d-block w-100" alt="Image">
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php if(isset($brand) && $brand->count() > 0): ?>
    <div id="imageCarousel" class="carousel slide mx-auto" data-bs-ride="carousel" data-bs-interval="2000" data-bs-wrap="true">
        <div class="carousel-inner">
            <?php
                $totalImages = $brand->count();
                $slidesToShow = ceil($totalImages / 2);
            ?>

            <?php for($i = 0; $i < $slidesToShow; $i++): ?>
                <div class="carousel-item <?php echo e($i === 0 ? 'active' : ''); ?>">
                    <div class="container">
                        <div class="row justify-content-center">
                            <?php for($j = 0; $j < 2; $j++): ?>
                                <?php
                                    $imageIndex = $i * 2 + $j;
                                ?>
                                <?php if($imageIndex < $totalImages): ?>
                                    <div class="col-6">
                                        <img src="<?php echo e(asset($brand[$imageIndex]->image)); ?>" alt="Image <?php echo e($imageIndex + 1); ?>" class="img-fluid w-100" style="object-fit: contain; height:350px; border-radius: 5px;">
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
<?php else: ?>
    <div class="text-center py-5">
        <h5 class="text-muted">No images available</h5>
    </div>
<?php endif; ?>

<div class="container">
    <h2 class="text-center mb-4">Categories</h2>
    <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
                $totalCategories = $category->count();
                $slidesToShow = ceil($totalCategories / 6);
            ?>

            <?php for($i = 0; $i < $slidesToShow; $i++): ?>
                <div class="carousel-item <?php echo e($i === 0 ? 'active' : ''); ?>">
                    <div class="container">
                        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">
                            <?php for($j = 0; $j < 6; $j++): ?>
                                <?php
                                    $categoryIndex = $i * 6 + $j;
                                ?>
                                <?php if(isset($category[$categoryIndex])): ?>
                                    <div class="col">
                                        <div class="category-item text-center">
                                            <div class="icon-container">
                                                <a href="<?php echo e(route('subcategory', ['category_id' => $category[$categoryIndex]->id])); ?>">
                                                    <img src="<?php echo e(asset('uploads/category/' . $category[$categoryIndex]->image)); ?>" alt="<?php echo e($category[$categoryIndex]->name); ?>" class="img-fluid rounded-circle mx-2" style="width: 800px; border:8px dotted #000">
                                                </a>
                                            </div>
                                            <h5><?php echo e($category[$categoryIndex]->name); ?></h5>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>

<div id="Controls" class="carousel slide mx-auto mt-4" style="max-hight: 100px;" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        <?php $__currentLoopData = $secondSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                <?php if($sliderItem->image): ?>
                    <img src="<?php echo e(asset('/uploads/second-slider/' . $sliderItem->image)); ?>" class="d-block w-100" alt="Image" style="height: 350px">
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div id="image" class="carousel slide mx-auto" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        <?php
            $totalImages = $minislider->count();
            $slidesToShow = 5;
        ?>

        <?php for($i = 0; $i < $slidesToShow; $i++): ?>
            <div class="carousel-item <?php echo e($i === 0 ? 'active' : ''); ?>">
                <div class="container">
                    <div class="row">
                        <?php for($j = 0; $j < 3; $j++): ?>
                            <?php
                                $imageIndex = ($i * 3 + $j) % $totalImages;
                            ?>
                            <div class="col-4">
                                <img src="<?php echo e(asset('uploads/mini-slider/' . $minislider[$imageIndex]->image)); ?>" alt="Image <?php echo e($imageIndex + 1); ?>" class="img-fluid w-100" style="object-fit: contain; height:350px; border-radius: 5px;">
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>


<div class="container rounded mx-auto mt-5">
    <h1 class="text-center">Authorized Brands</h1>
    <div class="slider">
        <div class="logos">
            <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <i class="fab fa-4x" style="">
                    <img src="<?php echo e(asset($b->image)); ?>" alt="<?php echo e($b->name); ?>" style="width: 100px; height: 100px;border-radius: 50%;">
                </i>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="logos">
            <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <i class="fab  fa-4x">
                    <img src="<?php echo e(asset($b->image)); ?>" alt="<?php echo e($b->name); ?>" style="width: 100px; height: 100px;border-radius: 50%;">
                </i>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>





    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <!-- Card 1 -->
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 100%;">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video"
                                    allowfullscreen></iframe>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger"
                                    style="font-size: 1.5rem; text-decoration: none;">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-primary btn-sm"
                                    target="_blank">Watch</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 100%;">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video"
                                    allowfullscreen></iframe>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger"
                                    style="font-size: 1.5rem; text-decoration: none;">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-primary btn-sm"
                                    target="_blank">Watch</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4 mb-0">
                        <div class="card" style="width: 100%;">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video"
                                    allowfullscreen></iframe>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger"
                                    style="font-size: 1.5rem; text-decoration: none;">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-primary btn-sm"
                                    target="_blank">Watch</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            
            <div class="container mt-1">
                <div class="row justify-content-center">
                    <h2 class="text-center mb-4">Our Happy Customers</h2>

                    <!-- Card 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 100%; text-align: center;">
                            <div class="card-body">
                                <img src="<?php echo e(asset('uploads/customer.jpg')); ?>" alt="" class="rounded-circle"
                                    style="width: 120px; height: 120px;">
                                <h5 class="card-title mt-3">Our Mission</h5>
                                <p class="card-text">
                                    Vashi Integrated Solutions (Formerly Vashi Electricals) has a very transparent business
                                    policy and we have been working with them for our electrical needs.
                                </p>
                                <b>Siddharth Shah - Reliance</b>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 100%; text-align: center;">
                            <div class="card-body">
                                <img src="<?php echo e(asset('uploads/c2.jpg')); ?>" class="rounded-circle"
                                    style="width: 120px; height: 120px;">
                                <h5 class="card-title mt-3">Our Vision</h5>
                                <p class="card-text">
                                    Vashi Integrated Solutions (Formerly Vashi Electricals) is not just a vendor but a
                                    valued business partner. We are very happy to associate with Vashi Electricals.
                                </p>
                                <b>Kiran Pawaskar - Sun Pharma</b>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 100%; text-align: center;">
                            <div class="card-body">
                                <img src="<?php echo e(asset('uploads/c3.jpg')); ?>" class="rounded-circle"
                                    style="width: 120px; height: 120px;">
                                <h5 class="card-title mt-3">Our Values</h5>
                                <p class="card-text">
                                    We are very much satisfied with Vashi Integrated Solutions (Formerly Vashi Electricals)
                                    because of their swift service & commissioning of ABB Drives.
                                </p>
                                <b>Pradeep Pancholi - Swastik Techno Pack</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="silder" class="carousel slide mx-auto" data-bs-ride="carousel" data-bs-interval="5000">


                <!-- Slides -->
                <div class="carousel-inner">
                    <!-- First Slide -->
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-2">
                                    <img src="<?php echo e(asset('uploads/janral/a.png')); ?>" alt="Image 1"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="<?php echo e(asset('uploads/janral/b.png')); ?>" alt="Image 2"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="<?php echo e(asset('uploads/janral/c.png')); ?>" alt="Image 3"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="<?php echo e(asset('uploads/janral/d.png')); ?>" alt="Image 4"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="<?php echo e(asset('uploads/janral/e.png')); ?>" alt="Image 5"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="<?php echo e(asset('uploads/janral/f.png')); ?>" alt="Image 6"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Slide -->
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-2">
                                    <img src="<?php echo e(asset('uploads/janral/i.png')); ?>" alt="Image 4"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="<?php echo e(asset('uploads/janral/j.png')); ?>" alt="Image 5"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="<?php echo e(asset('uploads/janral/e.png')); ?>" alt="Image 6"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="<?php echo e(asset('uploads/janral/a.png')); ?>" alt="Image 1"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="<?php echo e(asset('uploads/janral/b.png')); ?>" alt="Image 2"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="<?php echo e(asset('uploads/janral/d.png')); ?>" alt="Image 3"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>



    <?php $__env->stopSection(); ?>


    <style>
        .carousel-control-prev {
            display: none;
        }
    </style>

    

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var carousels = document.querySelectorAll('.carousel');

            // Loop through each carousel and manage autoplay
            carousels.forEach((carousel, index) => {
                var interval = 5000; // Time between slide transitions
                var direction = index % 2 === 0 ? 'next' : 'prev'; // Alternate directions

                // Function to simulate clicking next/prev based on alternating direction
                setInterval(() => {
                    var action = carousel.querySelector(`.carousel-control-${direction}`);
                    if (action) {
                        action.click(); // Trigger the slide change action
                    }
                }, interval);
            });
        });

        // Initialize the first Bootstrap Carousel with autoplay functionality
        var myCarousel = document.getElementById('carouselExampleControls');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000, // Autoplay interval in milliseconds
            ride: 'carousel', // Auto-rotate the carousel
            wrap: true // Ensure carousel loops back around
        });

        // Initialize the second Bootstrap Carousel with autoplay functionality
        var imageCarousel = document.getElementById('imageCarousel');
        var carouselInstance = new bootstrap.Carousel(imageCarousel, {
            interval: 5000, // Autoplay interval in milliseconds
            ride: 'carousel', // Auto-rotate the carousel
            wrap: true // Ensure carousel loops back around
        });
    </script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Project - Laravel\group-project-main\resources\views/index.blade.php ENDPATH**/ ?>