<!-- Include Font Awesome (for icons) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Include Material Design Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.css" rel="stylesheet">

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
      <!-- Admin Icon -->
      <span class="navbar-text me-3">
        <i class="fas fa-user-cog"></i> Admin
      </span>

      <!-- Language Dropdown with Flag Icon -->
      <div class="dropdown me-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-flag"></i> Language
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="#">English</a></li>
          <li><a class="dropdown-item" href="#">Spanish</a></li>
          <li><a class="dropdown-item" href="#">French</a></li>
        </ul>
      </div>


      
      <!-- Login  -->
      @guest
      <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
      <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
    @else
      <li><a href="#" class="nav-link">{{ Auth::user()->name }}</a></li>
      <li>
        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    @endguest



    
    </div>
  </div>
</nav>

<!-- Sub Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2973B9">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Brand</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav w-100">
        <!-- Left Group - Space items on the left -->
        <div class="left-group">
          <li class="nav-item">
            <a class="nav-link" href="#">Category</a>
          </li>
        </div>

        <!-- Right Group - Space items on the right -->
        <div class="right-group">
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </div>
      </ul>
    </div>
  </div>
</nav>
