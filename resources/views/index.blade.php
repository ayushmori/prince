@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

    <div>

        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

        <!-- jQuery (Required for Owl Carousel) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Owl Carousel JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        {{-- First Slider --}}
        <div class="container-fluid p-0">
            <div id="main-slider" class="owl-carousel owl-theme">
                @foreach ($sliders as $sliderItem)
                    <div class="item">
                        <img src="{{ asset('/uploads/slider/' . $sliderItem->image) }}" class="d-block w-100 full-width-image"
                            alt="Slider Image">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Owl Carousel Script -->
        <script>
            $(document).ready(function() {
                $('#main-slider').owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    dots: false,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    items: 1, // Show 1 image at a time
                    navText: ["<span class='prev'>&#10094;</span>", "<span class='next'>&#10095;</span>"]
                });
            });
        </script>

        <!-- CSS for Full-Width Image -->
        <style>
            .full-width-image {
                width: 100vw;
                max-height: 600px;
                object-fit: cover;
            }

            .owl-carousel .owl-nav button {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(0, 0, 0, 0.5) !important;
                color: white !important;
                font-size: 24px !important;
                border-radius: 50%;
                width: 50px;
                height: 50px;
            }

            .owl-carousel .owl-nav button.owl-prev {
                left: 20px;
            }

            .owl-carousel .owl-nav button.owl-next {
                right: 20px;
            }
        </style>


        {{-- Brand Slider --}}
        @if (isset($brand) && $brand->count() > 0)
            <div class="container brand-container my-4">
                <div class="row g-4 mt-3">
                    @for ($i = 0; $i < 2; $i++)
                        <div class="col-12 col-md-6">
                            <div id="brand-slider-{{ $i }}" class="owl-carousel owl-theme">
                                @foreach ($i == 0 ? $brand : $brand->shuffle() as $item)
                                    <div class="item brand-image-wrapper">
                                        <img src="{{ asset($item->image) }}" alt="Brand Image"
                                            class="img-fluid brand-image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $("#brand-slider-0, #brand-slider-1").owlCarousel({
                        loop: true,
                        margin: 15,
                        /* More spacing between slides */
                        nav: false,
                        dots: false,
                        autoplay: true,
                        autoplayTimeout: 3000,
                        autoplayHoverPause: true,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 1
                            },
                            1000: {
                                items: 1
                            }
                        }
                    });
                });
            </script>

            <style>
                /* Brand Image Wrapper - Adds Shadow Effect */
                .brand-image-wrapper {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    padding: 10px;
                    border-radius: 10px;
                    /* box-shadow: 0px 30px 60px rgba(0, 0, 0, 0.7); Smooth shadow effect */
                    /* background: #2561a8; */
                }

                /* Brand Image Styling */
                .brand-image {
                    width: 300px;
                    height: 300px;
                    /* padding: 15px; */
                    background-color: white;
                    /* box-shadow: 10px 10px 5px rgb(122, 145, 167); */
                }

                /* Responsive Adjustments */
                @media (max-width: 768px) {
                    .brand-image {
                        height: 200px;
                        /* Smaller height on mobile */
                    }
                }
            </style>
        @else
            <div class="text-center py-4">
                <h5 class="text-muted">No images available</h5>
            </div>
        @endif


    </div>


    {{-- Categories --}}
    <div class="container">
        <h2 class="text-center mb-4 text-dark">Categories<h2>
                <div class="categories-slider-ltr owl-carousel owl-theme">
                    @foreach ($category as $cat)
                        <div class="category-item text-center">
                            <div class="icon-container">
                                <a href="{{ route('subcategory', ['category_id' => $cat->id]) }}">
                                    <img src="{{ asset('uploads/category/' . $cat->image) }}" alt="{{ $cat->name }}"
                                        class="category-img">
                                </a>
                            </div>
                            <h5 class="category-name">{{ $cat->name }}</h5>
                        </div>
                    @endforeach
                </div>


                <style>
                    .categories-slider {
                        position: relative;
                        width: 100%;
                        overflow: hidden;
                        padding: 30px 0;
                        /* Adjusted padding for better spacing */
                        background: linear-gradient(45deg, #2561a8, #1e3c72);
                        border-radius: 15px;
                        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
                    }

                    .category-item {
                        flex: 0 0 auto;
                        margin: 20px;
                        width: 170px;
                        /* Set a fixed width for uniform box size */
                        height: 200px;
                        /* Set a fixed height to ensure all boxes are the same size */
                        /* margin: 0 15px; Slight margin for spacing */
                        padding: 20px;
                        /* Adjusted padding to ensure content fits properly */
                        background: #ffffff;
                        border-radius: 12px;
                        box-shadow: 10px 3px 10px 10px rgba(0, 0, 0, 0.15);
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        /* Vertically center content */
                        align-items: center;
                        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
                        cursor: pointer;
                        text-align: center;
                    }

                    .category-item:hover {
                        transform: scale(1.05);
                        /* Subtle scale effect on hover */
                        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
                    }

                    .category-img {
                        width: 130px;
                        /* Adjust image width for uniformity */
                        height: 130px;
                        /* Adjust image height for uniformity */
                        object-fit: cover;
                        /* Ensure the image fits within the circle */
                        border-radius: 50%;
                        /* Circular image */
                        transition: transform 0.2s ease-in-out;
                        margin-bottom: 15px;
                        /* Margin for spacing between image and text */
                    }

                    .category-item:hover .category-img {
                        transform: scale(1.1);
                        /* Zoom effect on hover */
                    }

                    .category-name {
                        font-size: 18px;
                        /* Adjust font size */
                        font-weight: bold;
                        color: #333;
                        text-transform: capitalize;
                        line-height: 1.3;
                        margin-top: 15px;
                        /* Added space between name and image */
                    }

                    .container {
                        margin-top: 60px;
                        /* Space on top to separate from previous content */
                    }

                    h2 {
                        margin-bottom: 40px;
                        /* More space below the title */
                    }
                </style>

                <script>
                    $(document).ready(function() {
                        // First slider (Right to Left)
                        $(".categories-slider-rtl").owlCarousel({
                            loop: true,
                            margin: 30,
                            nav: true,
                            dots: false,
                            items: 1,
                            responsive: {
                                600: {
                                    items: 3
                                },
                                1000: {
                                    items: 5
                                }
                            },
                            autoplay: true,
                            autoplayTimeout: 5000,
                            autoplayHoverPause: true,
                            smartSpeed: 800,
                            rtl: true // Moves from right to left
                        });

                        // Second slider (Left to Right)
                        $(".categories-slider-ltr").owlCarousel({
                            loop: true,
                            margin: 30,
                            nav: true,
                            dots: false,
                            items: 1,
                            responsive: {
                                600: {
                                    items: 3
                                },
                                1000: {
                                    items: 5
                                }
                            },
                            autoplay: true,
                            autoplayTimeout: 5000,
                            autoplayHoverPause: true,
                            smartSpeed: 800,
                            rtl: false // Moves from left to right
                        });
                    });
                </script>


                <div class="categories-slider-ltr mt-3 owl-carousel owl-theme">
                    @foreach ($category as $cat)
                        <div class="category-item text-center">
                            <div class="icon-container">
                                <a href="{{ route('subcategory', ['category_id' => $cat->id]) }}">
                                    <img src="{{ asset('uploads/category/' . $cat->image) }}" alt="{{ $cat->name }}"
                                        class="category-img">
                                </a>
                            </div>
                            <h5 class="category-name">{{ $cat->name }}</h5>
                        </div>
                    @endforeach
                </div>
    </div>

    <style>
        .categories-slider {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding: 30px 0;
            /* Adjusted padding for better spacing */
            background: linear-gradient(45deg, #2561a8, #1e3c72);
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        .category-item {
            flex: 0 0 auto;
            margin-left: 40px;
            width: 170px;
            /* Set a fixed width for uniform box size */
            height: 250px;
            /* Set a fixed height to ensure all boxes are the same size */
            /* margin: 0 15px; Slight margin for spacing */
            padding: 20px;
            /* Adjusted padding to ensure content fits properly */
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Vertically center content */
            align-items: center;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            cursor: pointer;
            text-align: center;
        }

        .category-item:hover {
            transform: scale(1.05);
            /* Subtle scale effect on hover */
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
        }

        .category-img {
            width: 130px;
            /* Adjust image width for uniformity */
            height: 130px;
            /* Adjust image height for uniformity */
            object-fit: cover;
            /* Ensure the image fits within the circle */
            border-radius: 50%;
            /* Circular image */
            transition: transform 0.2s ease-in-out;
            margin-bottom: 15px;
            /* Margin for spacing between image and text */
        }

        .category-item:hover .category-img {
            transform: scale(1.1);
            /* Zoom effect on hover */
        }

        .category-name {
            font-size: 18px;
            /* Adjust font size */
            font-weight: bold;
            color: #333;
            text-transform: capitalize;
            line-height: 1.3;
            margin-top: 15px;
            /* Added space between name and image */
        }

        .container {
            margin-top: 60px;
            /* Space on top to separate from previous content */
        }

        h2 {
            margin-bottom: 40px;
            /* More space below the title */
        }
    </style>

    <script>
        $(document).ready(function() {
            $(".categories-slider-ltr").owlCarousel({
                loop: true,
                margin: 30,
                nav: true,
                dots: false,
                items: 1,
                responsive: {
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                },
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                smartSpeed: 800,
                rtl: false // Moves from left to right
            });
        });
    </script>

    {{-- singel silder  --}}
    <div class="owl-carousel owl-theme mt-5">
        @foreach ($secondSlider as $sliderItem)
            <div class="item">
                @if ($sliderItem->image)
                    <img src="{{ asset('/uploads/second-slider/' . $sliderItem->image) }}" alt="Image" class="w-100"
                        style="height: 350px; object-fit:cover;">
                @endif
            </div>
        @endforeach
    </div>

    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true, // Infinite loop
                margin: 10, // Space between items
                nav: false,
                dots: false, // Show navigation arrows
                autoplay: true, // Auto-slide enabled
                autoplayTimeout: 3000, // 3 seconds per slide
                responsive: {
                    0: {
                        items: 1
                    }, // 1 item for mobile
                    600: {
                        items: 1
                    }, // 2 items for tablets
                    1000: {
                        items: 1
                    } // 3 items for larger screens
                }
            });
        });
    </script>

    {{-- Authorized Brands --}}
    <div class="container">
        <h2 class="text-center mt-4 text-dark">Authorized Brands</h2>
        <div class="brands-slider mt-3">
            <div class="brands-track d-flex">
                @foreach ($brand as $b)
                    <div class="category-item text-center">
                        <div class="icon-container">
                            <a href="#">
                                <img src="{{ asset($b->image) }}" alt="{{ $b->name }}"
                                    class="img-fluid rounded-circle mx-2 brand-logo">
                            </a>
                        </div>
                        <h5 class="mt-3 brand-name">
                            {{ $b->name }}
                        </h5>
                    </div>
                @endforeach

                {{-- Duplicate items for smooth looping --}}
                @foreach ($brand as $b)
                    <div class="category-item text-center">
                        <div class="icon-container">
                            <a href="#">
                                <img src="{{ asset($b->image) }}" alt="{{ $b->name }}"
                                    class="img-fluid rounded-circle mx-2 brand-logo">
                            </a>
                        </div>
                        <h5 class="mt-3 brand-name">
                            {{ $b->name }}
                        </h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .container {
            text-align: center;
        }

        .brands-slider {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding: 20px;
            background: #2561a8;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .brands-track {
            display: flex;
            animation: scroll 40s linear infinite;
            width: max-content;
        }

        .category-item {
            flex: 0 0 auto;
            margin-left: 20px;
            width: 230px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .icon-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .brand-logo {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .brand-logo:hover {
            transform: scale(1.1);
            box-shadow: 0px 4px 15px rgba(255, 255, 255, 0.6);
        }

        .brand-name {
            margin-top: 15px;
            width: 160px;
            font-size: 18px;
            font-weight: bold;
            color: black;
            text-align: center;
            white-space: normal;
            word-wrap: break-word;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }
    </style>






    @if (isset($minislider) && $minislider->count() > 0)
        <div class="container mt-5">
            <div class="row g-4">
                @for ($i = 0; $i < 2; $i++)
                    <div class="col-12 col-md-6">
                        <div id="mini-slider-{{ $i }}" class="owl-carousel owl-theme">
                            @foreach ($i == 0 ? $minislider : $minislider->shuffle() as $image)
                                <div class="item mini-slider-wrapper">
                                    <div class="mini-slider-shadow"> <!-- Shadow Wrapper -->
                                        <img src="{{ asset('uploads/mini-slider/' . $image->image) }}" alt="Slider Image"
                                            class="img-fluid mini-slider-image">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#mini-slider-0, #mini-slider-1").owlCarousel({
                    loop: true,
                    margin: 15,
                    /* Increased spacing between slides */
                    nav: false,
                    dots: true,
                    /* Enabled dots for better navigation */
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        /* Mobile - 1 image per slide */
                        600: {
                            items: 2
                        },
                        /* Tablet - 2 images per slide */
                        1000: {
                            items: 2
                        } /* Desktop - 2 images per slide */
                    }
                });
            });
        </script>

        <style>
            /* Wrapper to center the image and maintain spacing */
            .mini-slider-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 15px;
            }

            /* Shadow Wrapper to make sure the shadow is visible */
            .mini-slider-shadow {
                display: inline-block;
                /* padding: 10px; */
                background-color: white;
                border-radius: 10px;
                /* box-shadow: 10px 10px 20px rgba(122, 145, 167); */
                /* Shadow effect */
            }

            /* Mini Slider Image Styling */
            .mini-slider-image {
                width: 300px;
                height: 300px;
                object-fit: contain;
                /* border-radius: 10px; */
                background-color: white;
            }

            /* Responsive Tweaks */
            @media (max-width: 768px) {
                .mini-slider-image {
                    width: 250px;
                    height: 250px;
                }
            }
        </style>
    @else
        <div class="text-center py-4">
            <h5 class="text-muted">No images available</h5>
        </div>
    @endif






    {{--  Youtube card  --}}
    <div class="container mt-5">
        <div class="row justify-content-center">
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
    <div class="container mt-1" id="customers">
        <div class="row justify-content-center">
            <h2 class="text-center mb-4">Our Happy Customers</h2>

            <div class="col-md-4 mb-4">
                <div class="card text-center">
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

            <div class="col-md-4 mb-4">
                <div class="card text-center">
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

            <div class="col-md-4 mb-4">
                <div class="card text-center">
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
    <style>
        .card {
            height: 100%;
            /* Ensures equal height for all cards */
        }

        .card-body {
            height: 100%;
            overflow: hidden;
            /* Prevents scroll bar */
        }
    </style>

    {{-- last 5 image  --}}
    <div id="silder" class="carousel slide mx-auto" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('uploads/janral/a.png') }}" alt="Image 1" class="img-fluid w-100"
                                style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('uploads/janral/b.png') }}" alt="Image 2" class="img-fluid w-100"
                                style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('uploads/janral/c.png') }}" alt="Image 3" class="img-fluid w-100"
                                style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('uploads/janral/d.png') }}" alt="Image 4" class="img-fluid w-100"
                                style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('uploads/janral/e.png') }}" alt="Image 5" class="img-fluid w-100"
                                style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('uploads/janral/f.png') }}" alt="Image 6" class="img-fluid w-100"
                                style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('uploads/janral/i.png') }}" alt="Image 4" class="img-fluid w-100"
                                style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('uploads/janral/j.png') }}" alt="Image 5" class="img-fluid w-100"
                                style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('uploads/janral/e.png') }}" alt="Image 6" class="img-fluid w-100"
                                style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('uploads/janral/a.png') }}" alt="Image 1" class="img-fluid w-100"
                                style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('uploads/janral/b.png') }}" alt="Image 2" class="img-fluid w-100"
                                style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('uploads/janral/d.png') }}" alt="Image 3" class="img-fluid w-100"
                                style="object-fit: cover; height: 100px; border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
