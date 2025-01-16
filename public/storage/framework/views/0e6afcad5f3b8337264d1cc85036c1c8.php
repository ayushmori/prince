<div class="footer pt-5 bg-secondary text-white">
    <div class="container">
        <div class="row">
            <!-- First Column -->
            <div class="col-sm-3">
                <img src="<?php echo e(asset('assets/logoF.jpg')); ?>" class="img-fluid logo-img" alt="NeXT Solution">
                <p>
                    Founded in 2013, "NeXT SOLUTION" is an ISO certified company based in Rajkot, Gujarat.
                </p>
            </div>

            <!-- Second Column -->
            <div class="col-sm-2">
                <h3 class="text-white">Quick Links</h3>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-white">Home</a></li>
                    <li><a href="/about-us" class="text-light">About Us</a></li>
                    <li><a href="/contact-us" class="text-light">Contact Us</a></li>
                    <li><a href="/news" class="text-light">News</a></li>
                </ul>
            </div>

            <!-- Third Column (Categories) -->
            <div class="col-sm-2">
                <h3 class="text-white">Top Categories</h3>
                <ul class="list-unstyled">
                    <?php if($categories->isEmpty()): ?>
                        <!-- Nothing will display if there are no categories -->
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

            <!-- Fourth Column (Brands) -->
            <div class="col-sm-2">
                <h3 class="text-white">Top Brands</h3>
                <ul class="list-unstyled">
                    <?php if($brands->isEmpty()): ?>
                        <!-- Nothing will display if there are no brands -->
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

            <!-- Fifth Column (Contact Information) -->
            <div class="col-sm-2">
                <h3 class="text-white">Contact Us</h3>
                <ul class="address list-unstyled">
                    <li><i class="fas fa-mobile-alt text-white"></i>
                        <p>+91 82005 01951</p>
                    </li>
                    <li><i class="fas fa-envelope text-white"></i>
                        <p>support@nextgroup.in</p>
                    </li>

                    <li>
                        <p>
                            <i class="fas fa-map-marker-alt text-white"></i>
                            <span>Maruti Industrial Area,</span>
                            <span>Ramwadi 2, Rolex Road,</span>
                            <span>Near Maldhari Railway Crossing,</span>
                            <span>Rajkot-4, (Guj.-India)</span>
                        </p>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Social Media Links -->
        <div class="social-media-links text-center mt-4">
            <a href="#" class="social-icon p-0 m-0" style="text-decoration: none; margin: 0 10px;">
                <!-- Facebook Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                    viewBox="0 0 48 48">
                    <linearGradient id="Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1" x1="9.993" x2="40.615"
                        y1="9.993" y2="40.615" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#2aa4f4"></stop>
                        <stop offset="1" stop-color="#007ad9"></stop>
                    </linearGradient>
                    <path fill="url(#Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1)"
                        d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z"></path>
                    <path fill="#fff"
                        d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z">
                    </path>
                </svg>
            </a>
            <a href="#" class="social-icon p-0 m-0" style="text-decoration: none; margin: 0 10px;">
                <!-- Instagram Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                    viewBox="0 0 48 48">
                    <radialGradient id="yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1" cx="19.38" cy="42.035"
                        r="44.899" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#fd5"></stop>
                        <stop offset=".328" stop-color="#ff543f"></stop>
                        <stop offset=".348" stop-color="#fc5245"></stop>
                        <stop offset=".504" stop-color="#e64771"></stop>
                        <stop offset=".643" stop-color="#d53e91"></stop>
                        <stop offset=".761" stop-color="#cc39a4"></stop>
                        <stop offset=".841" stop-color="#c837ab"></stop>
                    </radialGradient>
                    <path fill="url(#yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1)"
                        d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20C42.014,38.383,38.417,41.986,34.017,41.99z">
                    </path>
                    <radialGradient id="yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2" cx="11.786" cy="5.54"
                        r="29.813" gradientTransform="matrix(1 0 0 .6663 0 1.849)" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#4168c9"></stop>
                        <stop offset=".999" stop-color="#4168c9" stop-opacity="0"></stop>
                    </radialGradient>
                    <path fill="url(#yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2)"
                        d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20C42.014,38.383,38.417,41.986,34.017,41.99z">
                    </path>
                    <path fill="#fff"
                        d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5 s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z">
                    </path>
                    <circle cx="31.5" cy="16.5" r="1.5" fill="#fff"></circle>
                    <path fill="#fff"
                        d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12   C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z">
                    </path>
                </svg>
            </a>
            <a href="#" class="social-icon p-0 m-0" style="text-decoration: none; margin: 0 10px;">
                <!-- Google+ Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                    viewBox="0 0 48 48">
                    <path fill="#FF3D00"
                        d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z">
                    </path>
                    <path fill="#FFF" d="M20 31L20 17 32 24z"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="copyrights">
        <div class="container">
            <div class="row">
                <p class="text-center text-primary">
                    ©<span class="cYear">2024</span> All rights reserved. Design &amp; Developed
                    by <a href="http://www.jbsoftware.co.in" target="_blank" class="text-primary">Fuerte
                        Developers</a>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    @font-face {
        font-family: 'Arial Rounded MT', Arial, sans-serif;
        src: <?php echo e(url('public/assets/fonts/ArialRoundedMT.ttf')); ?>;
        font-weight: 300;
        font-style: bold;
    }


    html {
        font-family: 'Arial Rounded MT' !important;
        font-weight: 600 !important;
        font-style: bold !important;

    }

    .footer {
        font-family: 'Arial Rounded MT', Arial, sans-serif !important;
        width: 100% !important;

    }

    .footer .container {
        padding-left: 0;
        padding-right: 0;
        width: 100% !important;
        /* Ensure the container fits within the viewport */
    }

    .footer .social-media-links {
        margin-top: 15px;
    }

    .footer .list-unstyled {
        padding-left: 0;
        /* Remove default padding */
    }

    .footer a {
        color: #0d6efd;
        /* Lighter color for links */
    }

    .footer a:hover {
        color: #fff;
        /* White hover effect for links */
    }

    .footer .text-white {
        color: #f8f9fa !important;
        /* Ensures text color is white */
    }

    .footer .address p {
        color: #bbb;
        /* Light gray text for address */
    }

    svg {
        max-height: 50px;
        max-width: 50px;
    }

    /* Make the logo semi-transparent */
    .logo-img {
        opacity: 0.8;
        /* Set logo opacity to 80% */
        transition: opacity 0.3s ease;
    }

    .logo-img:hover {
        opacity: 1;
        /* Full opacity on hover */
    }

    /* Custom Social Media Icon Styling */
    .social-icon-img {
        width: 30px;
        height: 30px;
        transition: transform 0.3s ease;
    }

    .social-icon:hover .social-icon-img {
        transform: scale(1.1);
        /* Slight zoom effect on hover */
    }

    @media (max-width: 768px) {

        .footer .col-sm-3,
        .footer .col-sm-2 {
            margin-bottom: 20px;
            /* Add spacing between columns on smaller screens */
        }
    }

    .copyrights {
        width: 100%;
        background-color: #f8f9fa;
        /* Optional: for a background color */
        padding: 20px 0;
        /* Optional: for padding */
    }

    .copyrights .row {
        justify-content: center;
    }
</style>
<?php /**PATH D:\Laravel\Project - Laravel\group-project-main\resources\views/layouts/inc/frontend/footer.blade.php ENDPATH**/ ?>