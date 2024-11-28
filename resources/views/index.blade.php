@extends('layouts.app')

@section('title','Home Page')

@section('content')


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($sliders as $key => $sliderItem)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                @if ($sliderItem->image)
                    <img src="{{ asset($sliderItem->image) }}" class="d-block w-100" alt="Image">
                @endif
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>




    <!-- Brands Slider  -->
    <div id="imageCarousel" class="carousel slide mx-auto mt-5" data-bs-ride="carousel">

        <!-- Slides -->
        <div class="carousel-inner">
            <!-- First Slide -->
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}"
                                 alt="Image 1"
                                 class="img-fluid w-100"
                                 style="object-fit: cover; height: 250px; border-radius: 5px;">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}"
                                 alt="Image 2"
                                 class="img-fluid w-100"
                                 style="object-fit: cover; height: 250px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Slide -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}"
                                 alt="Image 3"
                                 class="img-fluid w-100"
                                 style="object-fit: cover; height: 250px; border-radius: 5px;">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}"
                                 alt="Image 4"
                                 class="img-fluid w-100"
                                 style="object-fit: cover; height: 250px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third Slide -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}"
                                 alt="Image 5"
                                 class="img-fluid w-100"
                                 style="object-fit: cover; height: 250px; border-radius: 5px;">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}"
                                 alt="Image 6"
                                 class="img-fluid w-100"
                                 style="object-fit: cover; height: 250px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls/Arrows -->
        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- Category Slider -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Categories</h2> <!-- Added header -->
        <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Carousel Item 1 -->
            <div class="carousel-item active">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
                <!-- Category Item 1 -->
                <div class="col">
                <div class="category-item text-center">
                    <div class="icon-container">
                    <img src="https://via.placeholder.com/100" alt="Laptops" class="img-fluid rounded-circle"> <!-- Dummy image for Laptops -->
                    </div>
                    <h5>Laptops</h5>
                </div>
                </div>
                <!-- Category Item 2 -->
                <div class="col">
                <div class="category-item text-center">
                    <div class="icon-container">
                    <img src="https://via.placeholder.com/100" alt="Mobiles" class="img-fluid rounded-circle"> <!-- Dummy image for Mobiles -->
                    </div>
                    <h5>Mobiles</h5>
                </div>
                </div>
                <!-- Category Item 3 -->
                <div class="col">
                <div class="category-item text-center">
                    <div class="icon-container">
                    <img src="https://via.placeholder.com/100" alt="Accessories" class="img-fluid rounded-circle"> <!-- Dummy image for Accessories -->
                    </div>
                    <h5>Accessories</h5>
                </div>
                </div>
                <!-- Category Item 4 -->
                <div class="col">
                <div class="category-item text-center">
                    <div class="icon-container">
                    <img src="https://via.placeholder.com/100" alt="Televisions" class="img-fluid rounded-circle"> <!-- Dummy image for Televisions -->
                    </div>
                    <h5>Televisions</h5>
                </div>
                </div>
                <!-- Category Item 5 -->
                <div class="col">
                <div class="category-item text-center">
                    <div class="icon-container">
                    <img src="https://via.placeholder.com/100" alt="Furniture" class="img-fluid rounded-circle"> <!-- Dummy image for Furniture -->
                    </div>
                    <h5>Furniture</h5>
                </div>
                </div>
            </div>
            </div>
            <!-- Carousel Item 2 -->
            <div class="carousel-item">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
                <!-- Category Item 6 -->
                <div class="col">
                <div class="category-item text-center">
                    <div class="icon-container">
                    <img src="https://via.placeholder.com/100" alt="Footwear" class="img-fluid rounded-circle"> <!-- Dummy image for Footwear -->
                    </div>
                    <h5>Footwear</h5>
                </div>
                </div>
                <!-- Category Item 7 -->
                <div class="col">
                <div class="category-item text-center">
                    <div class="icon-container">
                    <img src="https://via.placeholder.com/100" alt="Books" class="img-fluid rounded-circle"> <!-- Dummy image for Books -->
                    </div>
                    <h5>Books</h5>
                </div>
                </div>
                <!-- Category Item 8 -->
                <div class="col">
                <div class="category-item text-center">
                    <div class="icon-container">
                    <img src="https://via.placeholder.com/100" alt="Sports" class="img-fluid rounded-circle"> <!-- Dummy image for Sports -->
                    </div>
                    <h5>Sports</h5>
                </div>
                </div>
                <!-- Category Item 9 -->
                <div class="col">
                <div class="category-item text-center">
                    <div class="icon-container">
                    <img src="https://via.placeholder.com/100" alt="Toys" class="img-fluid rounded-circle"> <!-- Dummy image for Toys -->
                    </div>
                    <h5>Toys</h5>
                </div>
                </div>
                <!-- Category Item 10 -->
                <div class="col">
                <div class="category-item text-center">
                    <div class="icon-container">
                    <img src="https://via.placeholder.com/100" alt="Groceries" class="img-fluid rounded-circle"> <!-- Dummy image for Groceries -->
                    </div>
                    <h5>Groceries</h5>
                </div>
                </div>
            </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
    </div>


    <!-- Image Banner Slider small -->
    <div id="Controls" class="carousel slide mx-auto mt-4" style="max-hight: 250px;" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('assets/silder/silder-1.jpg') }}" alt="First slide" style="height: 250px; object-fit: cover; border-radius: 8px;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/silder/silder-2.jpg') }}" alt="Second slide" style="height: 250px; object-fit: cover; border-radius: 8px;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/silder/silder-3.jpg') }}" alt="Third slide" style="height: 250px; object-fit: cover; border-radius: 8px;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/silder/silder-1.jpg') }}" alt="Fourth slide" style="height: 250px; object-fit: cover; border-radius: 8px;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/silder/silder-2.jpg') }}" alt="Fifth slide" style="height: 250px; object-fit: cover; border-radius: 8px;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#Controls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#Controls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    {{--  there Image Slider  --}}
    <div id="image" class="carousel slide mx-auto mt-5" data-bs-ride="carousel">

        <!-- Slides -->
        <div class="carousel-inner">
            <!-- First Slide -->
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}" alt="Image 1" class="img-fluid w-100" style="object-fit: cover; height: 200px; border-radius: 5px;">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}" alt="Image 2" class="img-fluid w-100" style="object-fit: cover; height: 200px; border-radius: 5px;">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}" alt="Image 3" class="img-fluid w-100" style="object-fit: cover; height: 200px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Slide -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}" alt="Image 4" class="img-fluid w-100" style="object-fit: cover; height: 200px; border-radius: 5px;">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}" alt="Image 5" class="img-fluid w-100" style="object-fit: cover; height: 200px; border-radius: 5px;">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}" alt="Image 6" class="img-fluid w-100" style="object-fit: cover; height: 200px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third Slide -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}" alt="Image 7" class="img-fluid w-100" style="object-fit: cover; height: 200px; border-radius: 5px;">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}" alt="Image 8" class="img-fluid w-100" style="object-fit: cover; height: 200px; border-radius: 5px;">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('assets/silder/silder-1.jpg') }}" alt="Image 9" class="img-fluid w-100" style="object-fit: cover; height: 200px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls/Arrows -->
        <button class="carousel-control-prev" type="button" data-bs-target="#image" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#image" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    {{--  Trusted By Logo Slider  --}}
    <div class="container rounded mx-auto mt-5">
        <h1 class="text-center">Authorized Brands</h1>
        <div class="slider">
            <div class="logos">
            <i class="fab fa-js fa-4x"></i>
            <i class="fab fa-linkedin-in fa-4x"></i>
            <i class="fab fa-dribbble fa-4x"></i>
            <i class="fab fa-medium-m fa-4x"></i>
            <i class="fab fa-github fa-4x"></i>
            </div>
            <div class="logos">
            <i class="fab fa-js fa-4x"></i>
            <i class="fab fa-linkedin-in fa-4x"></i>
            <i class="fab fa-dribbble fa-4x"></i>
            <i class="fab fa-medium-m fa-4x"></i>
            <i class="fab fa-github fa-4x"></i>
            </div>
        </div>
    </div>


    {{--  Youtube card  --}}
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 100%; margin: auto;">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                                title="YouTube video"
                                allowfullscreen>
                        </iframe>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger" style="font-size: 1.5rem; text-decoration: none;">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                            class="btn btn-primary btn-sm"
                            target="_blank">
                            Watch
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 100%; margin: auto;">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                                title="YouTube video"
                                allowfullscreen>
                        </iframe>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger" style="font-size: 1.5rem; text-decoration: none;">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                            class="btn btn-primary btn-sm"
                            target="_blank">
                            Watch
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 100%; margin: auto;">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                                title="YouTube video"
                                allowfullscreen>
                        </iframe>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger" style="font-size: 1.5rem; text-decoration: none;">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                            class="btn btn-primary btn-sm"
                            target="_blank">
                            Watch
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--  Our Happy Customers  --}}
    <div class="container mt-5">    
        <div class="row justify-content-center">
            <h2 class="text-center mb-4">Our Happy Customers</h2>
            <!-- Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 100%; margin: auto; text-align: center;">
                    <div class="card-body">
                        <img src="{{ asset('assets/silder/customer.jpg') }}" alt="" style="border-radius: 50%">
                        <h5 class="card-title mt-3 mt-3">Our Mission</h5>
                        <p class="card-text">
                            We aim to deliver top-notch solutions tailored to our clients' needs and goals.
                        </p>
                        <b>Siddharth Shah - Reliance</b>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 100%; margin: auto; text-align: center;">
                    <div class="card-body">
                        <img src="{{ asset('assets/silder/customer.jpg') }}" style="border-radius: 50%">
                        <h5 class="card-title mt-3">Our Vision</h5>
                        <p class="card-text">
                            To be the leading name in the industry by fostering innovation and excellence.
                        </p>
                        <b>Siddharth Shah - Reliance</b>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 100%; margin: auto; text-align: center;">
                    <div class="card-body">
                        <img src="{{ asset('assets/silder/customer.jpg') }}"style="border-radius: 50%">
                        <h5 class="card-title mt-3">Our Values</h5>
                        <p class="card-text">
                            Integrity, creativity, and customer-centric solutions drive everything we do.
                        </p>
                        <b>Siddharth Shah - Reliance</b>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div id="silder" class="carousel slide mx-auto mt-5" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Indicators/Dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#silder" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#silder" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
    
        <!-- Slides -->
        <div class="carousel-inner">
            <!-- First Slide -->
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ asset('assets/silder/image1.jpg') }}" alt="Image 1" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-2">
                            <img src="{{ asset('assets/silder/image2.jpg') }}" alt="Image 2" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-2">
                            <img src="{{ asset('assets/silder/image3.jpg') }}" alt="Image 3" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-2">
                            <img src="{{ asset('assets/silder/image4.jpg') }}" alt="Image 4" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-2">
                            <img src="{{ asset('assets/silder/image5.jpg') }}" alt="Image 5" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-2">
                            <img src="{{ asset('assets/silder/image6.jpg') }}" alt="Image 6" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Second Slide -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ asset('assets/silder/image4.jpg') }}" alt="Image 4" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-2">
                            <img src="{{ asset('assets/silder/image5.jpg') }}" alt="Image 5" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-2">
                            <img src="{{ asset('assets/silder/image6.jpg') }}" alt="Image 6" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-2">
                            <img src="{{ asset('assets/silder/image1.jpg') }}" alt="Image 1" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-2">
                            <img src="{{ asset('assets/silder/image2.jpg') }}" alt="Image 2" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-2">
                            <img src="{{ asset('assets/silder/image3.jpg') }}" alt="Image 3" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Controls/Arrows -->
        <button class="carousel-control-prev" type="button" data-bs-target="#silder" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#silder" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    
    
    @endsection




<script>
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });

</script>
