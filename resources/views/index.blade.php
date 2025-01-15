@extends('layouts.app')

@section('title', 'Home Page')

@section('content')


<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($sliders as $key => $sliderItem)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                @if ($sliderItem->image)
                    <img src="{{ asset('/uploads/slider/' . $sliderItem->image) }}" class="d-block w-100" alt="Image">
                @endif
            </div>
        @endforeach
    </div>
</div>

@if (isset($brand) && $brand->count() > 0)
    <div id="imageCarousel" class="carousel slide mx-auto" data-bs-ride="carousel" data-bs-interval="2000" data-bs-wrap="true">
        <div class="carousel-inner">
            @php
                $totalImages = $brand->count();
                $slidesToShow = ceil($totalImages / 2);
            @endphp

            @for ($i = 0; $i < $slidesToShow; $i++)
                <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                    <div class="container">
                        <div class="row justify-content-center">
                            @for ($j = 0; $j < 2; $j++)
                                @php
                                    $imageIndex = $i * 2 + $j;
                                @endphp
                                @if ($imageIndex < $totalImages)
                                    <div class="col-6">
                                        <img src="{{ asset($brand[$imageIndex]->image) }}" alt="Image {{ $imageIndex + 1 }}" class="img-fluid w-100" style="object-fit: contain; height:350px; border-radius: 5px;">
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@else
    <div class="text-center py-5">
        <h5 class="text-muted">No images available</h5>
    </div>
@endif

<div class="container">
    <h2 class="text-center mb-4">Categories</h2>
    <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php
                $totalCategories = $category->count();
                $slidesToShow = ceil($totalCategories / 6);
            @endphp

            @for ($i = 0; $i < $slidesToShow; $i++)
                <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                    <div class="container">
                        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">
                            @for ($j = 0; $j < 6; $j++)
                                @php
                                    $categoryIndex = $i * 6 + $j;
                                @endphp
                                @if (isset($category[$categoryIndex]))
                                    <div class="col">
                                        <div class="category-item text-center">
                                            <div class="icon-container">
                                                <a href="{{ route('subcategory', ['category_id' => $category[$categoryIndex]->id]) }}">
                                                    <img src="{{ asset('uploads/category/' . $category[$categoryIndex]->image) }}" alt="{{ $category[$categoryIndex]->name }}" class="img-fluid rounded-circle mx-2" style="width: 800px; border:8px dotted #000">
                                                </a>
                                            </div>
                                            <h5>{{ $category[$categoryIndex]->name }}</h5>
                                        </div>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>

<div id="Controls" class="carousel slide mx-auto mt-4" style="max-hight: 100px;" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        @foreach ($secondSlider as $key => $sliderItem)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                @if ($sliderItem->image)
                    <img src="{{ asset('/uploads/second-slider/' . $sliderItem->image) }}" class="d-block w-100" alt="Image" style="height: 350px">
                @endif
            </div>
        @endforeach
    </div>
</div>

<div id="image" class="carousel slide mx-auto" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        @php
            $totalImages = $minislider->count();
            $slidesToShow = 5;
        @endphp

        @for ($i = 0; $i < $slidesToShow; $i++)
            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                <div class="container">
                    <div class="row">
                        @for ($j = 0; $j < 3; $j++)
                            @php
                                $imageIndex = ($i * 3 + $j) % $totalImages;
                            @endphp
                            <div class="col-4">
                                <img src="{{ asset('uploads/mini-slider/' . $minislider[$imageIndex]->image) }}" alt="Image {{ $imageIndex + 1 }}" class="img-fluid w-100" style="object-fit: contain; height:350px; border-radius: 5px;">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>

{{-- Trusted By Logo Slider --}}
<div class="container rounded mx-auto mt-5">
    <h1 class="text-center">Authorized Brands</h1>
    <div class="slider">
        <div class="logos">
            @foreach ($brand as $b)
                <i class="fab fa-4x" style="">
                    <img src="{{ asset($b->image) }}" alt="{{ $b->name }}" style="width: 100px; height: 100px;border-radius: 50%;">
                </i>
            @endforeach
        </div>
        <div class="logos">
            @foreach ($brand as $b)
                <i class="fab  fa-4x">
                    <img src="{{ asset($b->image) }}" alt="{{ $b->name }}" style="width: 100px; height: 100px;border-radius: 50%;">
                </i>
            @endforeach
        </div>
    </div>
</div>





    {{--  Youtube card  --}}
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <!-- Card 1 -->
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 100%;">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video"
                                    allowfullscreen></iframe>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger"
                                    style="font-size: 1.5rem; text-decoration: none;">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-primary btn-sm"
                                    target="_blank">Watch</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 100%;">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video"
                                    allowfullscreen></iframe>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger"
                                    style="font-size: 1.5rem; text-decoration: none;">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-primary btn-sm"
                                    target="_blank">Watch</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4 mb-0">
                        <div class="card" style="width: 100%;">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video"
                                    allowfullscreen></iframe>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger"
                                    style="font-size: 1.5rem; text-decoration: none;">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-primary btn-sm"
                                    target="_blank">Watch</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--  Our Happy Customers  --}}
            <div class="container mt-1">
                <div class="row justify-content-center">
                    <h2 class="text-center mb-4">Our Happy Customers</h2>

                    <!-- Card 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 100%; text-align: center;">
                            <div class="card-body">
                                <img src="{{ asset('uploads/customer.jpg') }}" alt="" class="rounded-circle"
                                    style="width: 120px; height: 120px;">
                                <h5 class="card-title mt-3">Our Mission</h5>
                                <p class="card-text">
                                    Vashi Integrated Solutions (Formerly Vashi Electricals) has a very transparent business
                                    policy and we have been working with them for our electrical needs.
                                </p>
                                <b>Siddharth Shah - Reliance</b>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 100%; text-align: center;">
                            <div class="card-body">
                                <img src="{{ asset('uploads/c2.jpg') }}" class="rounded-circle"
                                    style="width: 120px; height: 120px;">
                                <h5 class="card-title mt-3">Our Vision</h5>
                                <p class="card-text">
                                    Vashi Integrated Solutions (Formerly Vashi Electricals) is not just a vendor but a
                                    valued business partner. We are very happy to associate with Vashi Electricals.
                                </p>
                                <b>Kiran Pawaskar - Sun Pharma</b>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 100%; text-align: center;">
                            <div class="card-body">
                                <img src="{{ asset('uploads/c3.jpg') }}" class="rounded-circle"
                                    style="width: 120px; height: 120px;">
                                <h5 class="card-title mt-3">Our Values</h5>
                                <p class="card-text">
                                    We are very much satisfied with Vashi Integrated Solutions (Formerly Vashi Electricals)
                                    because of their swift service & commissioning of ABB Drives.
                                </p>
                                <b>Pradeep Pancholi - Swastik Techno Pack</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="silder" class="carousel slide mx-auto" data-bs-ride="carousel" data-bs-interval="5000">


                <!-- Slides -->
                <div class="carousel-inner">
                    <!-- First Slide -->
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-2">
                                    <img src="{{ asset('uploads/janral/a.png') }}" alt="Image 1"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('uploads/janral/b.png') }}" alt="Image 2"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('uploads/janral/c.png') }}" alt="Image 3"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('uploads/janral/d.png') }}" alt="Image 4"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('uploads/janral/e.png') }}" alt="Image 5"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('uploads/janral/f.png') }}" alt="Image 6"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Slide -->
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-2">
                                    <img src="{{ asset('uploads/janral/i.png') }}" alt="Image 4"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('uploads/janral/j.png') }}" alt="Image 5"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('uploads/janral/e.png') }}" alt="Image 6"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('uploads/janral/a.png') }}" alt="Image 1"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('uploads/janral/b.png') }}" alt="Image 2"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('uploads/janral/d.png') }}" alt="Image 3"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 100px; border-radius: 5px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>



    @endsection


    <style>
        .carousel-control-prev {
            display: none;
        }
    </style>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script> --}}

    {{-- <script>
    // Auto Looping Carousel (Alternating direction)
    document.addEventListener('DOMContentLoaded', function() {
        var carousels = document.querySelectorAll('.carousel');

        carousels.forEach((carousel, index) => {
            var interval = 5000; // Time between slide transitions
            var direction = (index % 2 === 0) ? 'next' : 'prev'; // Alternate directions

            // Function to simulate clicking next/prev
            setInterval(() => {
                var action = carousel.querySelector(`.carousel-control-${direction}`);
                if (action) {
                    action.click(); // Trigger the slide change action
                }
            }, interval);
        });
    });

    // Initialize Bootstrap Carousel with auto-slide functionality
    var myCarousel = document.getElementById('imageCarousel');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 5000, // Autoplay interval in milliseconds
        ride: 'carousel', // Auto-rotate the carousel
        wrap: true // Ensure carousel loops back around
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Select the carousel element
        const imageCarousel = document.querySelector("#imageCarousel");

        // Initialize the Bootstrap carousel with desired options
        const carouselInstance = new bootstrap.Carousel(imageCarousel, {
            interval: 2000, // Time between slides in milliseconds
            wrap: true, // Enable continuous loop cycling
            pause: false // Prevent pausing when hovering over the carousel
        });

        // Optionally, listen for carousel events (e.g., slide change)
        imageCarousel.addEventListener("slide.bs.carousel", function(event) {
            console.log(`Slide changed to: ${event.relatedTarget}`);
        });

        // Example of adding custom controls programmatically
        document.querySelector(".carousel-control-prev").addEventListener("click", function() {
            carouselInstance.prev();
        });

        document.querySelector(".carousel-control-next").addEventListener("click", function() {
            carouselInstance.next();
        });
    });
</script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var carousels = document.querySelectorAll('.carousel');

            // Loop through each carousel and manage autoplay
            carousels.forEach((carousel, index) => {
                var interval = 5000; // Time between slide transitions
                var direction = index % 2 === 0 ? 'next' : 'prev'; // Alternate directions

                // Function to simulate clicking next/prev based on alternating direction
                setInterval(() => {
                    var action = carousel.querySelector(`.carousel-control-${direction}`);
                    if (action) {
                        action.click(); // Trigger the slide change action
                    }
                }, interval);
            });
        });

        // Initialize the first Bootstrap Carousel with autoplay functionality
        var myCarousel = document.getElementById('carouselExampleControls');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000, // Autoplay interval in milliseconds
            ride: 'carousel', // Auto-rotate the carousel
            wrap: true // Ensure carousel loops back around
        });

        // Initialize the second Bootstrap Carousel with autoplay functionality
        var imageCarousel = document.getElementById('imageCarousel');
        var carouselInstance = new bootstrap.Carousel(imageCarousel, {
            interval: 5000, // Autoplay interval in milliseconds
            ride: 'carousel', // Auto-rotate the carousel
            wrap: true // Ensure carousel loops back around
        });
    </script>
