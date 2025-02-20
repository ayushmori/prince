<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                    src="<?php echo e(asset('admin\images\logo\logo.png')); ?>" alt=""><img class="img-fluid for-dark"
                    src="<?php echo e(asset('admin/logo/logo_dark.png')); ?>" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                    src="<?php echo e(asset('admin/images/logo/logo-icon.png')); ?>" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="#"><img class="img-fluid"
                                src="<?php echo e(asset('admin/images/logo/logo-icon.png')); ?>" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">General</h6>
                            <p class="lan-2">Dashboards,widgets & layout.</p>
                        </div>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link" href="<?php echo e(route('admin.dashboard')); ?>">
                            <i data-feather="home"></i><span class="lan-3">Dashboard</span>
                        </a>
                    </li>


                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                                data-feather="airplay"></i><span>Brands</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo e(url('admin/brands/create')); ?>">Add Brand</a></li>
                            <li><a href="<?php echo e(url('admin/brands')); ?>">View Brand</a></li>
                        </ul>
                    </li>



                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                                data-feather="layout"></i><span>Category</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo e(url('admin/categories/create')); ?>">Add Category</a></li>
                            <li><a href="<?php echo e(url('admin/categories')); ?>">View Category</a></li>
                        </ul>
                    </li>


                    

                    





                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i data-feather="book"></i><span>News</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo e(route('admin.news.create')); ?>">Add News</a></li>
                            <li><a href="<?php echo e(route('admin.news')); ?>">View News</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i data-feather="book"></i><span>Product</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo e(url('admin/products/create')); ?>">Add Product</a></li>
                            <li><a href="<?php echo e(url('/admin/products')); ?>">View Product</a></li>
                        </ul>
                    </li>



                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                                data-feather="airplay"></i><span>Documents Type</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo e(route('document-types.create')); ?>">Add Document Type</a></li>
                            <li><a href="<?php echo e(route('document-types.index')); ?>">View Document Type</a></li>
                        </ul>
                    </li>


                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                            data-feather="airplay"></i><span>Documents Category</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo e(url('admin/document-category/create')); ?>">Add Document Category</a></li>
                            <li><a href="<?php echo e(url('admin/document-category')); ?>">View Document Category</a></li>
                        </ul>
                    </li>



                    

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"
                            data-bs-original-title="" title="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-airplay">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                            </svg>
                            <span>Setting</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: none;">
                            <li><a href="<?php echo e(url('admin/settings/about-us')); ?>">About-Us</a></li>
                            <li><a href="<?php echo e(url('admin/contact-us')); ?>">Contact-Us</a></li>
                            <li><a class="submenu-title" href="#" data-bs-original-title="" title="">Slider
                                    Setting<span class="sub-arrow"><i class="fa fa-angle-right"></i></span>
                                    <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                </a>
                                <ul class="nav-sub-childmenu submenu-content" style="display: none;">
                                    <li><a href="<?php echo e(url('admin/all-slider/create')); ?>">Add Slider</a></li>
                                    <li><a href="<?php echo e(url('admin/all-slider')); ?>">View Sliders</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>


                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                                data-feather="airplay"></i><span>Documents</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo e(url('admin/main-documents/create')); ?>">Document-Add</a></li>
                            <li><a href="<?php echo e(url('admin/main-documents')); ?>">Document-View</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->
<?php /**PATH D:\prince\prince-gpm\group-project-main\resources\views/layouts/inc/admin/sidebar.blade.php ENDPATH**/ ?>