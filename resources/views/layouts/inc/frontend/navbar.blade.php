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
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#2973B9">
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
              <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#categoryModal">Category</a>
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

<!-- Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen ">
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
                      <h4>Parent Categories</h4>
                      <div class="category-container">
                          @foreach ($categories as $category)
                              <div id="category-{{ $category->id }}" class="category-box"
                                  onclick="showSubCategories({{ $category->id }}, '{{ $category->name }}')">
                                  {{ $category->name }}
                              </div>
                          @endforeach
                      </div>
                  </div>

                  <!-- Subcategories and Deeper Levels -->
                  {{-- <div class="xyz"> --}}

                  
                  <div class="col-md-8">
                      <div class="d-flex">
                          <!-- Subcategories Container -->
                          <div>
                              <h5 id="subcategory-title"></h5>
                              <div id="subcategory-container" class="subcategory-container"></div>
                          </div>

                          <!-- Sub-Subcategories Container -->
                          <div>
                              <h5 id="subsubcategory-title"></h5>
                              <div id="subsubcategory-container" class="subcategory-container"></div>
                          </div>

                          <!-- Sub-Sub-Subcategories Container -->
                          <div>
                              <h5 id="subsubsubcategory-title"></h5>
                              <div id="subsubsubcategory-container" class="subcategory-container"></div>
                          </div>

                          <!-- Sub-Sub-Sub-Subcategories Container -->
                          <div>
                              <h5 id="subsubsubsubcategory-title"></h5>
                              <div id="subsubsubsubcategory-container" class="subcategory-container"></div>
                          </div>

                          <!-- Sub-Sub-Sub-Sub-Subcategories Container -->
                          <div>
                              <h5 id="subsubsubsubsubcategory-title"></h5>
                              <div id="subsubsubsubsubcategory-container" class="subcategory-container"></div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
  {{-- @include('layouts.inc.frontend.footer')  --}}
</div>

 <script>
  function showSubCategories(categoryId, categoryName) {
      document.getElementById("subcategory-title").innerText = categoryName;
      resetContainers(["subcategory-container", "subsubcategory-container", "subsubsubcategory-container",
          "subsubsubsubcategory-container", "subsubsubsubsubcategory-container"
      ]);

      @foreach ($categories as $category)
          if (categoryId === {{ $category->id }}) {
              @foreach ($category->children as $child)
                  appendToContainer("subcategory-container", {{ $child->id }}, "{{ $child->name }}",
                      "showSubSubCategories");
              @endforeach
          }
      @endforeach
  }

  function showSubSubCategories(subcategoryId, subcategoryName) {
      document.getElementById("subsubcategory-title").innerText = subcategoryName;
      resetContainers(["subsubcategory-container", "subsubsubcategory-container", "subsubsubsubcategory-container",
          "subsubsubsubsubcategory-container"
      ]);

      @foreach ($categories as $category)
          @foreach ($category->children as $child)
              if (subcategoryId === {{ $child->id }}) {
                  @foreach ($child->children as $subchild)
                      appendToContainer("subsubcategory-container", {{ $subchild->id }}, "{{ $subchild->name }}",
                          "showSubSubSubCategories");
                  @endforeach
              }
          @endforeach
      @endforeach
  }

  function showSubSubSubCategories(subSubCategoryId, subSubCategoryName) {
      document.getElementById("subsubsubcategory-title").innerText = subSubCategoryName;
      resetContainers(["subsubsubcategory-container", "subsubsubsubcategory-container",
          "subsubsubsubsubcategory-container"
      ]);

      @foreach ($categories as $category)
          @foreach ($category->children as $child)
              @foreach ($child->children as $subchild)
                  if (subSubCategoryId === {{ $subchild->id }}) {
                      @foreach ($subchild->children as $subSubChild)
                          appendToContainer("subsubsubcategory-container", {{ $subSubChild->id }},
                              "{{ $subSubChild->name }}", "showSubSubSubSubCategories");
                      @endforeach
                  }
              @endforeach
          @endforeach
      @endforeach
  }

  function showSubSubSubSubCategories(subSubSubCategoryId, subSubSubCategoryName) {
      document.getElementById("subsubsubsubcategory-title").innerText = subSubSubCategoryName;
      resetContainers(["subsubsubsubcategory-container", "subsubsubsubsubcategory-container"]);

      @foreach ($categories as $category)
          @foreach ($category->children as $child)
              @foreach ($child->children as $subchild)
                  @foreach ($subchild->children as $subSubChild)
                      if (subSubSubCategoryId === {{ $subSubChild->id }}) {
                          @foreach ($subSubChild->children as $subSubSubChild)
                              appendToContainer("subsubsubsubcategory-container", {{ $subSubSubChild->id }},
                                  "{{ $subSubSubChild->name }}", "showSubSubSubSubSubCategories");
                          @endforeach
                      }
                  @endforeach
              @endforeach
          @endforeach
      @endforeach
  }

  function showSubSubSubSubSubCategories(subSubSubSubCategoryId, subSubSubSubCategoryName) {
      document.getElementById("subsubsubsubsubcategory-title").innerText = subSubSubSubCategoryName;
      resetContainers(["subsubsubsubsubcategory-container"]);

      @foreach ($categories as $category)
          @foreach ($category->children as $child)
              @foreach ($child->children as $subchild)
                  @foreach ($subchild->children as $subSubChild)
                      @foreach ($subSubChild->children as $subSubSubChild)
                          if (subSubSubSubCategoryId === {{ $subSubSubChild->id }}) {
                              @foreach ($subSubSubChild->children as $subSubSubSubChild)
                                  appendToContainer("subsubsubsubsubcategory-container", null,
                                      "{{ $subSubSubSubChild->name }}");
                              @endforeach
                          }
                      @endforeach
                  @endforeach
              @endforeach
          @endforeach
      @endforeach
  }

  // Utility Functions
  function resetContainers(containerIds) {
      containerIds.forEach(id => document.getElementById(id).innerHTML = "");
  }

  function appendToContainer(containerId, id, name, clickHandler = "") {
      const container = document.getElementById(containerId);
      const clickAction = clickHandler ? `onclick="${clickHandler}(${id}, '${name}')"` : "";
      container.innerHTML += `<div class="subcategory-box" ${clickAction}">${name}</div>`;
  }
</script>
  
<style>
  .col-md-2{
    width: 400px;
  }
  .category-box,
  .subcategory-box {
      padding: 15px;
      margin: 10px 0;
      cursor: pointer;
      border: 1px solid #ddd;
      background-color: #2973B9;
      white-space: nowrap;
      overflow: hidden;
      /* display: none; */
      /* text-overflow: ellipsis; */
      
  }

  .category-box:hover,
  .subcategory-box:hover {
      background-color: #f0f0f0;
  }

  .category-container,
  .subcategory-container {
      height: 300px;
      overflow-y: auto;
      border: 1px solid #ccc;
      padding: 5px;
      background-color: white;
  }

  .subcategory-container {
      min-width: 400px;
  }

  /* Flexbox for scrollable horizontal layout */
  .d-flex {
      gap: 20px;
      overflow-x: auto;
      white-space: nowrap;
  }

  .modal-backdrop.show {
      background-color: rgba(0, 0, 0, 0.1);
      /* Black with 50% opacity */
  }
  .modal-dialog{
    /* height: 4//00px; */
    top: 150px;
  }
  /* Modal Content Position and Styling */
  .modal-content {
  top: 0; /* Align modal to top */
  left: 0; /* Align modal to left */
  position: fixed; /* Ensure it's positioned relative to the viewport */
  width: 100%; /* Full width of the viewport */
  /* height: 10vh;/ */
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  overflow-y: auto; /* Allow scrolling if content exceeds the height */
}

      
      /* Optional shadow for better visibility */

  .modal-body{
    background-color: #4e7ca7;
    width: 100%;
    max-height:50vh;
  }
  .modal-header{
    background-color: #4e7ca7;
  }
  .modal{
    color: white;
    width: 100%:
  }

  .modal-content{
    max-height: 60vh;
    overflow: hidden;
  }
</style>