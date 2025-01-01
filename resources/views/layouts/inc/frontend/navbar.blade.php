<!-- Include Font Awesome (for icons) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Include Material Design Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.css"
    rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <!-- Logo (Left-aligned) -->
        <a href="/">
            <img class="navbar-brand navbar-logo" src="{{ asset('assets/silder/logo.jpg') }}" alt=""
                style="max-height: 80px;">
        </a>

        <!-- Search Bar (Centered) -->
        <div class="d-flex flex-grow-1 justify-content-center px-3">
            <form class="d-flex w-100" role="search">
                <input class="form-control mt-3 w-100" type="search" placeholder="Search" aria-label="Search"
                    style="height: 45px;">
                <span class="material-icons mt-4" style="font-size: 28px; color:#2973B9;">search</span>
                <!-- Search Icon -->
            </form>
        </div>

        <!-- Admin and Dropdown (Right Side) -->
        <div class="d-flex align-items-center">

            <!-- Admin Dropdown -->
            <div class="dropdown me-3">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                    @guest
                        Log In
                    @else
                        {{ Auth::user()->name }}
                    @endguest
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @guest
                        <li><a href="{{ route('login') }}" class="dropdown-item">Login</a></li>
                        <li><a href="{{ route('register') }}" class="dropdown-item">Register</a></li>
                    @else
                        <li><a href="#" class="dropdown-item">{{ Auth::user()->name }}</a></li>
                        <li>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>

            <!-- Currency Dropdown -->
            <div class="dropdown me-3">
                <button class="btn btn-primary dropdown-toggle" type="button" id="currencyDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="currency-flag-icon">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Flag_of_India.svg" alt="INR Flag"
                            height="16" width="24" style="margin-right: 5px;">
                    </span>
                    INR
                </button>
                <ul class="dropdown-menu" aria-labelledby="currencyDropdown">
                    <li><a class="dropdown-item active" href="#">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Flag_of_India.svg"
                                alt="INR Flag" height="16" width="24" style="margin-right: 5px;"> INR
                        </a></li>
                    <li><a class="dropdown-item" href="#">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Flag_of_the_United_States.svg"
                                alt="USD Flag" height="16" width="24" style="margin-right: 5px;"> USD
                        </a></li>
                    <li><a class="dropdown-item" href="#">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Flag_of_the_United_States.svg"
                                alt="EUR Flag" height="16" width="24" style="margin-right: 5px;"> EUR
                        </a></li>
                    <li><a class="dropdown-item" href="#">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Flag_of_the_United_States.svg"
                                alt="GBP Flag" height="16" width="24" style="margin-right: 5px;"> GBP
                        </a></li>
                </ul>
            </div>

            <!-- Cart Icon with Badge -->
            <span class="position-relative">
                <i class="fas fa-shopping-cart" style="font-size: 24px; color:#2973B9;"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
            </span>

        </div>

    </div>
</nav>


<!-- Sub Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #2973B9">


    {{-- category code --}}

    {{-- <a class="nav-link text-white fw-bold px-3 py-2 rounded d-flex align-items-center justify-content-center"
        href="#" data-bs-toggle="modal" data-bs-target="#categoryModal"
        style="background-color: #2973B9; transition: background-color 0.3s ease;">
        Category <i class="bi bi-chevron-down ms-2"></i>
    </a> --}}


    <div class="container-fluid">


        {{-- <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
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
        </div> --}}


        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <p class="text-white">
                            <span id="breadcrumb-p"></span>
                        </p>
                        <div class="modal-body">

                            <!-- Categories Layout -->
                            <div class="row mt-4">
                                <!-- Parent Categories Section -->
                                <div class="col-md-4">

                                    <h4 class="text-info fw-bold" style=" border-bottom: 3px solid aqua;">Products &
                                        Services</h4>
                                    <div class="category-container" id="parent-container"></div>
                                </div>
                                <!-- Dynamic Subcategories Section -->
                                <div class="col-md-8">
                                    <p class="text-white"></p>
                                    <h4 id="dynamic-category-heading" class="text-info fw-bold"></h4>
                                    <div id="dynamic-category-sections" class="d-flex"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        <a class="nav-link text-white fw-bold px-3 py-2 rounded d-flex align-items-center justify-content-center"
            href="#" data-bs-toggle="modal" data-bs-target="#categoryModal"
            style="background-color: #2973B9; transition: background-color 0.3s ease;">
            Category <i class="bi bi-chevron-down ms-2"></i>
        </a>


        <div class="container-fluid">


            {{-- <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-white">
                                <span id="breadcrumb-heading"></span>
                            </p>
                            <!-- Categories Layout -->
                            <div class="row mt-4">

                                <!-- Parent Categories Section -->
                                <div class="col-md-4">

                                    <h4 class="text-info fw-bold" style="border-bottom: 3px solid aqua;">Products &
                                        Services</h4>
                                    <div class="category-container" id="parent-container"></div>
                                </div>
                                <!-- Dynamic Subcategories Section -->
                                <div class="col-md-8">
                                    <p class="text-white"></p>
                                    <h4 id="category-heading" class="text-info fw-bold"></h4>
                                    <!-- Dynamic Category Name -->
                                    <div id="dynamic-category-sections" class="d-flex"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}



            {{-- <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Dynamic Breadcrumb -->
                            <p class="text-white">
                                <span id="breadcrumb-heading"></span> <!-- Dynamic breadcrumb -->
                            </p>
                            <!-- Categories Layout -->
                            <div class="row mt-4">
                                <!-- Parent Categories Section -->
                                <div class="col-md-4">
                                    <h4 class="text-info fw-bold" style="border-bottom: 3px solid aqua;">Products &
                                        Services</h4>
                                    <div class="category-container" id="parent-container"></div>
                                </div>
                                <!-- Dynamic Subcategories Section -->
                                <div class="col-md-8">
                                    <p class="text-white"></p>
                                    <div id="dynamic-category-sections" class="d-flex flex-column"></div>
                                    <!-- Dynamic section for categories -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


            <!-- Brand on New Line -->
            <a class="nav-link text-white fw-bold px-3 py-2 rounded" href="#"
                style="background-color: #2973B9; transition: background-color 0.3s ease;">
                Brand
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100">
                    <div class="left-group">
                        <li class="nav-item">

                        </li>
                    </div>
                    <div class="right-group d-flex">
                        <li class="nav-item"><a class="nav-link text-white fw-bold rounded"
                                href="{{ route('news') }}">News</a></li>
                        <li class="nav-item"><a class="nav-link text-white fw-bold rounded" href="/about-us">About
                                Us</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white fw-bold rounded"
                                href="/contact-us">Contact
                                Us</a></li>
                    </div>
                </ul>
            </div>
        </div>

</nav>

<!-- Categories Modal -->



{{-- <script>
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

        // Scroll to the selected category (smooth scroll)
        const categorySection = document.getElementById(`subcategory-section-${category.id}`);
        if (categorySection) {
            categorySection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }

    async function renderSubcategories(category, level) {
        const dynamicSections = document.getElementById('dynamic-category-sections');

        const newSection = document.createElement('div');
        newSection.className = 'subcategory-container';
        newSection.id = `subcategory-section-${category.id}`;
        newSection.dataset.level = level;

        const title = document.createElement('h5');
        title.innerText = `${category.name}`;
        title.style.borderBottom = '3px solid aqua';
        title.classList.add('text-info');


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

    // function appendToContainer(container, id, name, clickHandler, hasChildren) {
    //     const box = document.createElement('div');
    //     box.className = 'subcategory-box d-flex align-items-center justify-content-between';

    //     if (!hasChildren) {
    //         const link = document.createElement('a');
    //         link.href = `/category/${id}`;
    //         link.innerText = name;
    //         box.appendChild(link);
    //     } else {
    //         const textNode = document.createTextNode(name);
    //         box.appendChild(textNode);

    //         const icon = document.createElement('i');
    //         icon.className = 'fa fa-angle-right ms-2';
    //         box.appendChild(icon);

    //         box.onclick = clickHandler;
    //     }

    //     container.appendChild(box);
    // }

    function appendToContainer(container, id, name, clickHandler, hasChildren) {
        const box = document.createElement('div');
        box.className = 'subcategory-box d-flex align-items-center justify-content-between';

        // Make the entire box clickable
        box.onclick = () => {
            if (!hasChildren) {
                // If no children, navigate to the category link
                window.location.href = `/category/${id}`;
            } else {
                // If there are children, execute the clickHandler (for subcategory expansion or similar)
                clickHandler();
            }
        };

        if (!hasChildren) {
            // Optionally, if you want to keep the link for visual styling purposes
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
        }

        container.appendChild(box);
    }


    document.addEventListener('DOMContentLoaded', () => initializeCategories());
</script> --}}

{{-- <script>
    let categoryPath = []; // Start with an empty path
    let isProductsCategorySet = false; // Flag to track if "Products & Services" is added

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

        // If it's a top-level category (level 0), reset the breadcrumb to just "Products & Services"
        if (level === 0) {
            categoryPath = []; // Clear existing path only when a top-level category is clicked
            isProductsCategorySet = false; // Reset the flag
        }

        // Add "Products & Services" only once the first time a top-level category is clicked
        if (!isProductsCategorySet) {
            categoryPath.push("Products & Services");
            isProductsCategorySet = true; // Set the flag to true
        }

        // Add the current category to the breadcrumb path
        categoryPath.push(category.name);
        updateBreadcrumb();

        // Set the current category in the heading (below breadcrumb)
        updateCategoryHeading(category.name);

        renderSubcategories(category, level + 1);

        // Scroll to the selected category (smooth scroll)
        const categorySection = document.getElementById(`subcategory-section-${category.id}`);
        if (categorySection) {
            categorySection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }

    async function renderSubcategories(category, level) {
        const dynamicSections = document.getElementById('dynamic-category-sections');

        const newSection = document.createElement('div');
        newSection.className = 'subcategory-container';
        newSection.id = `subcategory-section-${category.id}`;
        newSection.dataset.level = level;

        // Create a title for this subcategory section
        const title = document.createElement('h5');
        title.innerText = `${category.name}`;
        title.style.borderBottom = '3px solid aqua';
        title.classList.add('text-info');

        const container = document.createElement('div');
        container.className = 'subcategory-items';

        newSection.appendChild(title);
        newSection.appendChild(container);
        dynamicSections.appendChild(newSection);

        // Fetch and render the subcategories
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

        // Update the heading for the dynamic section
        updateCategoryHeading(category.name, newSection);
    }

    function removeChildSections(level) {
        const dynamicSections = document.getElementById('dynamic-category-sections');
        Array.from(dynamicSections.children).forEach(section => {
            if (parseInt(section.dataset.level) >= level) {
                section.remove();
            }
        });
    }

    // Update the breadcrumb text dynamically
    function updateBreadcrumb() {
        const breadcrumb = categoryPath.join(' > ');
        const breadcrumbElement = document.getElementById('breadcrumb-heading');

        // Check if the breadcrumb is already set, if not set it
        if (breadcrumbElement.innerText !== breadcrumb) {
            breadcrumbElement.innerText = `> ${breadcrumb}`;
        }
        breadcrumbElement.innerText = breadcrumb;
    }

    // Update the category heading dynamically
    function updateCategoryHeading(categoryName) {
        const categoryHeadingElement = document.getElementById('category-heading');

        // Set the current category name as the heading (without "Products & Services")
        if (categoryHeadingElement.innerText !== categoryName) {
            categoryHeadingElement.innerText = categoryName;
        }
    }

    function appendToContainer(container, id, name, clickHandler, hasChildren) {
        const box = document.createElement('div');
        box.className = 'subcategory-box d-flex align-items-center justify-content-between';

        // Make the entire box clickable
        box.onclick = () => {
            if (!hasChildren) {
                // If no children, navigate to the category link
                window.location.href = `/category/${id}`;
            } else {
                // If there are children, execute the clickHandler (for subcategory expansion or similar)
                clickHandler();
            }
        };

        if (!hasChildren) {
            // Optionally, if you want to keep the link for visual styling purposes
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
        }

        container.appendChild(box);
    }

    document.addEventListener('DOMContentLoaded', () => initializeCategories());
</script> --}}


<script>
    let categoryPath = ['Products & Services']; // Starting category

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

        // Update the breadcrumb
        categoryPath = categoryPath.slice(0, level + 1); // Slice to the current level
        categoryPath.push(category.name); // Add the current category to the path
        updateBreadcrumb();

        renderSubcategories(category, level + 1);

        // Scroll to the selected category (smooth scroll)
        const categorySection = document.getElementById(`subcategory-section-${category.id}`);
        if (categorySection) {
            categorySection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }

    async function renderSubcategories(category, level) {
        const dynamicSections = document.getElementById('dynamic-category-sections');

        const newSection = document.createElement('div');
        newSection.className = 'subcategory-container';
        newSection.id = `subcategory-section-${category.id}`;
        newSection.dataset.level = level;

        const title = document.createElement('h5');
        title.innerText = `${category.name}`;
        title.style.borderBottom = '3px solid aqua';
        title.classList.add('text-info');

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

    // Update the breadcrumb text dynamically
    function updateBreadcrumb() {
        const breadcrumb = categoryPath.join(' > ');
        const breadcrumbElement = document.getElementById('breadcrumb-p');
        // breadcrumbElement.innerText = `> ${breadcrumb}`;
          // Check if the breadcrumb is already set, if not set it
          if (breadcrumbElement.innerText !== breadcrumb) {
            breadcrumbElement.innerText = `> ${breadcrumb}`;
        }
        breadcrumbElement.innerText = breadcrumb;

    }

    function appendToContainer(container, id, name, clickHandler, hasChildren) {
        const box = document.createElement('div');
        box.className = 'subcategory-box d-flex align-items-center justify-content-between';

        // Make the entire box clickable
        box.onclick = () => {
            if (!hasChildren) {
                // If no children, navigate to the category link
                window.location.href = `/category/${id}`;
            } else {
                // If there are children, execute the clickHandler (for subcategory expansion or similar)
                clickHandler();
            }
        };

        if (!hasChildren) {
            // Optionally, if you want to keep the link for visual styling purposes
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
        }

        container.appendChild(box);
    }

    document.addEventListener('DOMContentLoaded', () => initializeCategories());
</script>

<style>
    #breadcrumb-p {
        font-size: 16px;
        font-weight: bold;
        color: #00bcd4;
        margin-bottom: 15px;
        padding: 5px;
    }

    #breadcrumb-p span {
        color: #fff;
        background-color: #00796b;
        padding: 3px 8px;
        border-radius: 5px;
    }



    #breadcrumb-heading span.selected {
        background-color: #004d40;
        /* Darker color for selected item */
        color: #ffd600;
        /* Yellow color for selected item */
    }

    .subcategory-box {
        padding: 15px;
        margin: 10px 0;
        cursor: pointer;
        background-color: #1a1a1a;
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

    .category-container {
        margin-top: 18px;
    }

    .category-box {
        cursor: pointer;
        border: 1px solid #ddd;
        background-color: #1a1a1a;
        overflow-x: hidden;
        overflow-y: auto;
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
        /* overflow-x: hidden; */
    }

    .modal-backdrop.show {
        background-color: rgba(0, 0, 0, 0.1);
    }

    /* Keep the modal fixed size and avoid shrinking */
    .modal-dialog {
        margin: 0;
        /* Remove any margin to avoid any shifting */
        max-width: 90vw;
        /* Allow some flexibility in width */
        width: 100%;
        /* Ensure it's always 100% width */
        position: fixed;
        /* Keep the modal fixed on screen */
        top: 50px;
        /* Adjust the modal's position from the top */
        color: white;

    }

    /* Prevent the modal content from resizing when new content is added */
    .modal-content {
        position: relative;
        /* Keep it positioned relative to its parent */
        width: 100%;
        background-color: #1a1a1a !important;
        overflow: hidden;
        max-height: 80vh;
        /* Ensure max height */
        height: 80vh;
        /* Fixed height */
        overflow-y: auto;
        /* Allow content to scroll */
        top: 150px;

    }

    /* Ensure the modal body handles overflow */
    .modal-body {
        background-color: #1a1a1a !important;
        width: 100%;
        height: 100%;
        overflow-x: auto;
        /* Allow horizontal scroll */
        overflow-y: auto;
        /* Allow vertical scroll */
    }

    /* Dynamic category section should be scrollable without resizing the modal */
    #dynamic-category-sections {
        max-height: 65vh;
        /* Set maximum height for category container */
        overflow-y: auto;
        /* Scroll if content overflows */
        flex-grow: 1;
        /* Allow it to grow, but respect max height */
    }

    /* Ensure category container does not shrink */
    .category-container {
        max-height: 60vh;
        overflow-y: auto;
    }

    /* Ensure modal header stays at the top */
    .modal-header {
        background-color: #2973B9;
        position: sticky;
        top: 0;
        z-index: 10;
        /* Ensure the header stays above the content */
    }

    /* Ensure content sections inside modal don't cause overflow issues */
    .modal-body h4,
    .modal-body h5 {
        text-align: center;
    }

    /* Ensure modal body doesn't shift */
    .modal-dialog {
        top: 0;
        /* Keep it at the top */
        margin: 0;
        width: 100%;
    }

    /* Ensure content inside modal doesn't cause overflow issues */
    .modal-body {
        height: 100%;
        overflow-x: auto;
        overflow-y: auto;
    }

    .modal a {
        color: whitesmoke;
        text-decoration: none;
    }
</style>
