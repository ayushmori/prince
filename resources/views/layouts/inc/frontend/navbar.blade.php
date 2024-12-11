<!-- Include Font Awesome (for icons) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Include Material Design Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.css"
    rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    /* Ensure the nested dropdowns show up correctly */
    .dropdown-submenu {
        position: relative;
    }



    .dropdown-menu {
        display: none;
    }
</style>

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

        </div>

        <!-- Language Dropdown with Flag Icon -->
        <div class="dropdown me-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-flag"></i> Language
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">English</a></li>
                <li><a class="dropdown-item" href="#">Spanish</a></li>
                <li><a class="dropdown-item" href="#">French</a></li>
            </ul>
        </div>

        <!-- Download Button -->
        <a href="#" class="btn btn-primary">Download</a>


    </div>
    </div>
</nav>

<!-- Sub Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2973B9">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Brand</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <div class="left-group">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Category
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li class="category-item" data-category-id="{{ $category->id }}">
                                    <span class="category-name">{{ $category->name }}</span>
                                    @if ($category->children->isNotEmpty())
                                        <ul class="child-categories list-unstyled ms-3" style="display: none;">
                                            @foreach ($category->children as $child)
                                                <li class="category-item" data-category-id="{{ $child->id }}">
                                                    <span class="category-name">{{ $child->name }}</span>
                                                    @if ($child->children->isNotEmpty())
                                                        <ul class="child-categories list-unstyled ms-3"
                                                            style="display: none;">
                                                            @foreach ($child->children as $subchild)
                                                                <li class="category-item"
                                                                    data-category-id="{{ $subchild->id }}">
                                                                    <span
                                                                        class="category-name">{{ $subchild->name }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <!-- Last child category as a link -->
                                                        <a href="/category/{{ $child->id }}"
                                                            class="category-name">{{ $child->name }}</a>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>


                    </div>
                </div>

                <!-- Right Group - Space items on the right -->

                <div class="right-group">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about-us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact-us">Contact Us</a>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>
<script>
/* Hide child categories by default */
$(document).ready(function () {
    // Prevent dropdown from closing when clicking on a category or subcategory
    $('.dropdown-menu').on('click', function (e) {
        e.stopPropagation();
    });

    // Toggle child categories when clicking a category name
    $('.category-name').on("click", function (e) {
        e.stopPropagation(); // Prevent the click from propagating to the parent item

        const categoryItem = $(this).closest('.category-item');
        const childContainer = categoryItem.find('.child-categories');

        if (childContainer.length > 0) {
            // Toggle visibility of child categories
            childContainer.toggleClass('show'); // Use jQuery to toggle the visibility
            console.log('Toggled visibility of child container:', childContainer);
        } else {
            const categoryId = categoryItem.data('category-id');

            // Fetch children dynamically if not already loaded
            fetch(`/category/${categoryId}/children`)
                .then(response => {
                    if (!response.ok) {
                        console.error('Failed to fetch children:', response.status, response.statusText);
                        throw new Error('Failed to fetch children');
                    }
                    return response.json(); // Parse as JSON if response is valid
                })
                .then(children => {
                    if (children.length > 0) {
                        console.log('Fetched children:', children);

                        const newChildContainer = $('<ul class="child-categories list-unstyled ms-3"></ul>');

                        children.forEach(child => {
                            const childItem = $(`
                                <li class="category-item" data-category-id="${child.id}">
                                    <span class="category-name">${child.name}</span>
                                </li>
                            `);

                            // Check if the child has its own children and add them
                            if (child.children && child.children.length > 0) {
                                const subChildContainer = $('<ul class="child-categories list-unstyled ms-3" style="display: none;"></ul>');

                                child.children.forEach(subChild => {
                                    const subChildItem = $(`
                                        <li class="category-item" data-category-id="${subChild.id}">
                                            <span class="category-name">${subChild.name}</span>
                                        </li>
                                    `);
                                    subChildContainer.append(subChildItem);
                                });
                                childItem.append(subChildContainer);
                            }

                            newChildContainer.append(childItem);
                        });

                        console.log('Appending new child container to', categoryItem);
                        categoryItem.append(newChildContainer);
                        newChildContainer.style.display = 'inline-block';
                        console.log('Appended new child container:', newChildContainer);
                    } else {
                        window.location.href = `/category/${categoryId}`;
                    }
                })
                .catch(error => console.error('Error fetching children:', error));
        }
    });
});




</script>
<style>

.child-categories {
    display: none;
}
/* .child-categories.show {
    display: inline-block;
} */


</style>
