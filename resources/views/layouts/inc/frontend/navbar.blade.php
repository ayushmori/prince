<!-- Include Font Awesome (for icons) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Include Material Design Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.css"
    rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style>
  #category-list {
    max-height: 400px;
    overflow-y: auto;
    max-width: auto;
}

.child-categories {
    display: none;
    padding-left: 1rem;
}

.child-categories.show {
    display: inline-block !important;
}

.loader {
    font-size: 0.9rem;
    color: #888;
    margin-top: 0.5rem;
}

.dropdown-item {
    cursor: pointer;
    display: flex;

}
.dropdown-item span{

}

.xyz{
    display: inline-block;
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
                        <button class="btn btn-default dropdown-toggle" type="button" id="categoryDropdown" data-toggle="dropdown" aria-expanded="false">
                            Categories
                        </button>
                        <ul id="category-list" class="dropdown-menu" aria-labelledby="categoryDropdown">
                            @foreach ($categories as $category)
                                <li class="dropdown-item category-item" data-category-id="{{ $category->id }}">
                                    <span class="category-name btn btn-sm btn-primary">{{ $category->name }}</span>
                                    @if ($category->children->isNotEmpty())
                                        <ul class="child-categories list-unstyled ms-3">
                                            @foreach ($category->children as $child)
                                                <li class="category-item" data-category-id="{{ $child->id }}">
                                                    <span class="category-name btn btn-sm btn-primary">{{ $child->name }}</span>
                                                    @if ($child->children->isNotEmpty())
                                                    <div class="xyz">

                                                        <ul class="child-categories list-unstyled ms-3">
                                                            @foreach ($child->children as $subchild)
                                                            <li class="category-item" data-category-id="{{ $subchild->id }}">
                                                                <span class="category-name btn btn-sm btn-primary">{{ $subchild->name }}</span>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
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
    $(document).ready(function () {
        // Toggle visibility for child categories
        $('#category-list').on('click', '.category-name', function (e) {
            e.stopPropagation(); // Prevent click events from bubbling
            const $categoryItem = $(this).closest('.category-item');
            const $childContainer = $categoryItem.find('.child-categories:first');

            if ($childContainer.length > 0) {
                // Toggle visibility of already-loaded child categories
                $childContainer.toggleClass('show');
            } else {
                const categoryId = $categoryItem.data('category-id');
                const $loader = $('<div class="loader">Loading...</div>');
                $categoryItem.append($loader);

                // Dynamically load child categories
                $.getJSON(`/category/${categoryId}/children`, function (children) {
                    $loader.remove();

                    if (children.length > 0) {
                        const $newChildContainer = $('<ul>', {
                            class: 'child-categories list-unstyled ms-3'
                        });

                        children.forEach(function (child) {
                            const $childItem = $('<li>', {
                                class: 'category-item',
                                'data-category-id': child.id
                            }).html(`<span class="category-name btn btn-sm btn-primary">${child.name}</span>`);

                            $newChildContainer.append($childItem);
                        });

                        $categoryItem.append($newChildContainer);
                        $newChildContainer.addClass('show');
                    } else {
                        window.location.href = `/category/${categoryId}`;
                    }
                }).fail(function (error) {
                    $loader.remove();
                    alert('Failed to fetch subcategories. Please try again.');
                });
            }
        });
    });
</script>

