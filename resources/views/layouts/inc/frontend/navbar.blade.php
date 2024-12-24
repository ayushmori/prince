<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">

        <!-- Logo (Left-aligned) -->
        <a href="#">
            <img class="navbar-brand navbar-logo w-5" src="{{ asset('assets/silder/logo.jpg') }}" alt="">
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('news') }}">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about-us">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact-us">Contact Us</a></li>
                </div>
            </ul>
        </div>
    </div>
</nav>


<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Categories Layout -->
                <div class="row mt-4">
                    <!-- Parent Categories Section -->
                    <div class="col-md-3">
                        <h4>Categories</h4>
                        <div class="category-container" id="parent-container"></div>
                    </div>
                    <!-- Dynamic Subcategories Section -->
                    <div class="col-md-9">
                        <h4 id="dynamic-category-heading"></h4>
                        <div id="dynamic-category-sections" class="d-flex"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
    async function initializeCategories() {
        const response = await fetch('/api/categories');
        const data = await response.json();
        const categories = data.categories;

        const parentContainer = document.getElementById('parent-container');
        parentContainer.innerHTML = ''; // Clear previous data
        categories.forEach(category => {
            appendToContainer(parentContainer, category.id, category.name, () => renderSubcategories(
                category, category.name), category.has_children);
        });
    }

    // Render subcategories dynamically and update heading for each child container
    async function renderSubcategories(category, parentName) {
        const dynamicSections = document.getElementById('dynamic-category-sections');
        const existingSection = document.getElementById(`subcategory-section-${category.id}`);

        // Update the dynamic category heading for the current category or subcategory
        const dynamicHeading = document.getElementById('dynamic-category-heading');
        dynamicHeading.innerText =
        `Subcategories of ${parentName}`; // Update heading dynamically based on parent name

        // Remove sections for deeper levels if any
        const sectionsToRemove = Array.from(dynamicSections.children).filter(
            section => parseInt(section.dataset.level) >= category.level
        );
        sectionsToRemove.forEach(section => section.remove());

        // Add a new section for the current category if it has children
        if (!existingSection && category.has_children) {
            const newSection = document.createElement('div');
            newSection.className = 'subcategory-container';
            newSection.id = `subcategory-section-${category.id}`;
            newSection.dataset.level = category.level;

            const title = document.createElement('h5');
            title.innerText = category.name;

            const container = document.createElement('div');
            container.className = 'subcategory-container';
            newSection.appendChild(title);
            newSection.appendChild(container);
            dynamicSections.appendChild(newSection);

            // Fetch and populate children dynamically
            const response = await fetch(`/api/categories/${category.id}/children`);
            const data = await response.json();
            data.children.forEach(subcategory => {
                // Pass the full path (name chain) to each subcategory
                appendToContainer(container, subcategory.id, subcategory.name, () => renderSubcategories(
                    subcategory, `${parentName} > ${subcategory.name}`), subcategory.has_children);
            });
        }
    }

    // Utility function to append a category/subcategory to a container
    function appendToContainer(container, id, name, clickHandler, hasChildren) {
        const box = document.createElement('div');
        box.className = 'subcategory-box';

        if (!hasChildren) {
            // Create a link if there are no children
            const link = document.createElement('a');
            link.href = `/category/${id}`; // Assuming your category URL structure
            link.innerText = name;
            box.appendChild(link);
        } else {
            box.innerText = name;
            box.onclick = clickHandler;
        }

        container.appendChild(box);
    }

    // Initialize categories when the document is loaded
    document.addEventListener('DOMContentLoaded', () => initializeCategories());
</script> --}}

<script>
    async function initializeCategories() {
        const response = await fetch('/api/categories');
        const data = await response.json();
        const categories = data.categories;

        const parentContainer = document.getElementById('parent-container');
        parentContainer.innerHTML = ''; // Clear previous data
        categories.forEach(category => {
            appendToContainer(parentContainer, category.id, category.name, () => renderSubcategories(
                category, category.name), category.has_children);
        });
    }

    // Render subcategories dynamically and update heading for each child container
    async function renderSubcategories(category, parentName) {
        const dynamicSections = document.getElementById('dynamic-category-sections');
        const existingSection = document.getElementById(`subcategory-section-${category.id}`);

        // Update the dynamic category heading for the current category or subcategory
        const dynamicHeading = document.getElementById('dynamic-category-heading');
        dynamicHeading.innerText =
        `Subcategories of ${parentName}`; // Update heading dynamically based on parent name

        // Remove sections for deeper levels if any
        const sectionsToRemove = Array.from(dynamicSections.children).filter(
            section => parseInt(section.dataset.level) >= category.level
        );
        sectionsToRemove.forEach(section => section.remove());

        // If the section already exists, toggle its visibility (open/close)
        if (existingSection) {
            existingSection.style.display = existingSection.style.display === 'none' ? 'block' : 'none';
            return; // Stop further processing if the section is already there
        }

        // Add a new section for the current category if it has children
        if (category.has_children) {
            const newSection = document.createElement('div');
            newSection.className = 'subcategory-container';
            newSection.id = `subcategory-section-${category.id}`;
            newSection.dataset.level = category.level;

            const title = document.createElement('h5');
            title.innerText = category.name;

            const container = document.createElement('div');
            container.className = 'subcategory-container';
            newSection.appendChild(title);
            newSection.appendChild(container);
            dynamicSections.appendChild(newSection);

            // Fetch and populate children dynamically
            const response = await fetch(`/api/categories/${category.id}/children`);
            const data = await response.json();
            data.children.forEach(subcategory => {
                // Pass the full path (name chain) to each subcategory
                appendToContainer(container, subcategory.id, subcategory.name, () => renderSubcategories(
                    subcategory, `${parentName} > ${subcategory.name}`), subcategory.has_children);
            });
        }
    }

    // Utility function to append a category/subcategory to a container
    function appendToContainer(container, id, name, clickHandler, hasChildren) {
        const box = document.createElement('div');
        box.className = 'subcategory-box';

        if (!hasChildren) {
            // Create a link if there are no children
            const link = document.createElement('a');
            link.href = `/category/${id}`; // Assuming your category URL structure
            link.innerText = name;
            box.appendChild(link);
        } else {
            box.innerText = name;
            box.onclick = clickHandler;
        }

        container.appendChild(box);
    }

    // Initialize categories when the document is loaded
    document.addEventListener('DOMContentLoaded', () => initializeCategories());
</script>








<style>
    .category-box,
    .subcategory-box {
        padding: 15px;
        margin: 10px 0;
        cursor: pointer;
        border: 1px solid #ddd;
        background-color: #2973B9;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .category-box:hover,
    .subcategory-box:hover {
        background-color: #f0f0f0;
    }

    .category-container,
    .subcategory-container {
        overflow-y: auto;
        border: 1px solid #ccc;
        padding: 5px;
        background-color: white;
        margin-right: 10px;
    }

    .subcategory-container {
        min-width: 300px;
    }

    /* Flexbox for horizontal layout */
    .d-flex {
        display: flex;
        gap: 20px;
        overflow-x: auto;
        white-space: nowrap;
        flex-wrap: nowrap;
    }

    .modal-backdrop.show {
        background-color: rgba(0, 0, 0, 0.1);
    }

    .modal-dialog {
        top: 150px;
    }

    /* Modal Content Position and Styling */
    .modal-content {
        top: 0;
        left: 0;
        position: fixed;
        width: 100%;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .modal-body {
        background-color: #4e7ca7;
        width: 100%;
        max-height: 50vh;
        overflow-y: auto;
    }

    .modal-header {
        background-color: #4e7ca7;
    }

    .modal {
        color: white;
        width: 100%;
    }

    .modal-content {
        max-height: 60vh;
        overflow: hidden;
    }

    .modal a {
        text-decoration: none;
        color: white;
    }
</style>
