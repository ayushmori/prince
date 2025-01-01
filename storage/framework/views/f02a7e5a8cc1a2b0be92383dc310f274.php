<!-- Include Font Awesome (for icons) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Include Material Design Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.css"
    rel="stylesheet">

<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">

        <!-- Logo (Left-aligned) -->
        <a href="#">
            <img class="navbar-brand navbar-logo w-5" src="<?php echo e(asset('assets/silder/logo.jpg')); ?>" alt="">
        </a>

        <!-- Search Bar (Centered) -->
        <div class="search-container px-3">
            <form class="d-flex w-100" role="search">
                <input class="form-control me-2 w-100" type="search" placeholder="Search" aria-label="Search">
                <span class="material-icons d-flex">search</span> <!-- Search Icon -->
            </form>
        </div>

        <!-- Admin and Dropdown (Right Side) -->
        <div class="d-flex">
            <!-- Admin -->
            <div class="dropdown me-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#2973B9">
                    <i class="fa-solid fa-user"></i>
                    <?php if(auth()->guard()->guest()): ?>
                        Log In
                    <?php else: ?>
                        <?php echo e(Auth::user()->name); ?>

                    <?php endif; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php if(auth()->guard()->guest()): ?>
                        <li><a href="<?php echo e(route('login')); ?>" class="dropdown-item">Login</a></li>
                        <li><a href="<?php echo e(route('register')); ?>" class="dropdown-item">Register</a></li>
                    <?php else: ?>
                        <li><a href="#" class="dropdown-item"><?php echo e(Auth::user()->name); ?></a></li>
                        <li>
                            <a href="<?php echo e(route('logout')); ?>" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>

        <!-- Language Dropdown with Flag Icon -->
        <div class="dropdown me-3">
            <button class="btn" type="button" style="background-color:#2973B9; color:white;">
                <img src="<?php echo e(asset('uploads/flag.png')); ?>" height="20px" width="25px" style="margin-right: 10px"
                    alt=""></i>INDIA
            </button>
        </div>


        <!-- Download Button -->
        <a href="#" class="btn" style="background-color:#2973B9; color:white;">Download</a>


    </div>
    </div>
</nav>


<!-- Sub Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2973B9">
    <div class="container-fluid">
        <!-- Brand on New Line -->
        <a class="navbar-brand w-100" href="#">Brand</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav w-100">
                <div class="left-group">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal"
                            data-bs-target="#categoryModal">Category</a>
                    </li>
                </div>
                <div class="right-group d-flex">
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('news')); ?>">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about-us">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact-us">Contact Us</a></li>
                </div>
            </ul>
        </div>
    </div>
</nav>

<!-- Categories Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Categories Layout -->
                <div class="row mt-4">
                    <!-- Parent Categories Section -->
                    <div class="col-md-4">
                        <h4>Categories</h4>
                        <div class="category-container" id="parent-container"></div>
                    </div>
                    <!-- Dynamic Subcategories Section -->
                    <div class="col-md-8">
                        <h4 id="dynamic-category-heading"></h4>
                        <div id="dynamic-category-sections" class="d-flex"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function initializeCategories() {
        const response = await fetch('/api/categories');
        const data = await response.json();
        const categories = data.categories;

        const parentContainer = document.getElementById('parent-container');
        parentContainer.innerHTML = ''; // Clear previous data

        categories.forEach(category => {
            appendToContainer(
                parentContainer,
                category.id,
                category.name,
                () => handleCategoryClick(category, 0), // Level 0 for top-level categories
                category.has_children
            );
        });
    }

    async function handleCategoryClick(category, level) {
        const dynamicSections = document.getElementById('dynamic-category-sections');

        const existingSection = document.getElementById(`subcategory-section-${category.id}`);
        if (existingSection) {
            removeChildSections(level);
            return;
        }

        removeChildSections(level + 1);

        renderSubcategories(category, level + 1);
    }

    async function renderSubcategories(category, level) {
        const dynamicSections = document.getElementById('dynamic-category-sections');

        const newSection = document.createElement('div');
        newSection.className = 'subcategory-container';
        newSection.id = `subcategory-section-${category.id}`;
        newSection.dataset.level = level;

        const title = document.createElement('h5');
        title.innerText = `${category.name}`;

        const container = document.createElement('div');
        container.className = 'subcategory-items';

        newSection.appendChild(title);
        newSection.appendChild(container);
        dynamicSections.appendChild(newSection);

        const response = await fetch(`/api/categories/${category.id}/children`);
        const data = await response.json();

        data.children.forEach(subcategory => {
            appendToContainer(
                container,
                subcategory.id,
                subcategory.name,
                () => handleCategoryClick(subcategory, level),
                subcategory.has_children
            );
        });
    }

    function removeChildSections(level) {
        const dynamicSections = document.getElementById('dynamic-category-sections');
        Array.from(dynamicSections.children).forEach(section => {
            if (parseInt(section.dataset.level) >= level) {
                section.remove();
            }
        });
    }

    function appendToContainer(container, id, name, clickHandler, hasChildren) {
        const box = document.createElement('div');
        box.className = 'subcategory-box d-flex align-items-center justify-content-between';

        if (!hasChildren) {
            const link = document.createElement('a');
            link.href = `/category/${id}`;
            link.innerText = name;
            box.appendChild(link);
        } else {
            const textNode = document.createTextNode(name);
            box.appendChild(textNode);

            const icon = document.createElement('i');
            icon.className = 'fa fa-angle-right ms-2';
            box.appendChild(icon);

            box.onclick = clickHandler;
        }

        container.appendChild(box);
    }

    document.addEventListener('DOMContentLoaded', () => initializeCategories());
</script>

    <style>
        .subcategory-box {
            padding: 15px;
            margin: 10px 0;
            cursor: pointer;
            background-color: #2973B9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    
        .subcategory-box:hover {
            background-color: #f0f0f0;
        }
    
        .subcategory-box i {
            color: white;
            font-size: 1rem;
            transition: transform 0.2s ease-in-out;
        }
    
        .subcategory-box:hover i {
            transform: translateX(5px);
        }
    
        .category-container {
            margin-top: 18px;
        }
    
        .category-box {
            cursor: pointer;
            border: 1px solid #ddd;
            background-color: #2973B9;
            overflow: hidden;
        }
    
        h4,
        h5 {
            text-align: center;
        }
    
        .category-box:hover,
        .subcategory-box:hover {
            background-color: #609fd9;
        }
    
        .col-md-4 {
            height: 50vh;
            overflow-x: auto;
        }
    
        .col-md-8 {
            overflow-x: auto;
        }
    
        .subcategory-container {
            min-width: 500px;
            max-height: 300px;
            padding: 5px;
            overflow-y: auto;
        }
    
        .d-flex {
            display: flex;
            white-space: nowrap;
            flex-wrap: nowrap;
        }
    
        .modal-backdrop.show {
            background-color: rgba(0, 0, 0, 0.1);
        }
    
        .modal-dialog {
            top: 150px;
        }
    
        .modal-content {
            position: fixed;
            width: 100%;
            background-color: #2973B9 !important;
            overflow: hidden;
            max-height: 60vh;
        }
    
        .modal-body {
            background-color: #2973B9 !important;
            width: 100%;
        
            overflow-x: auto;
        }
    
        .modal-header {
            background-color: #2973B9;
        }
    
        .modal {
            color: white;
            width: 100%;
        }
    
        .modal a {
            text-decoration: none;
            color: white;
        }
    </style>
    <?php /**PATH C:\xampp\htdocs\group-porject\resources\views/layouts/inc/frontend/navbar.blade.php ENDPATH**/ ?>