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
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

@if (isset($brand) && $brand->count() > 0)
    <div class="container brand-container my-4">
        <div id="animated-brands">
            @foreach($brand->chunk(2) as $key => $pair)
                <div class="row image-pair {{ $key == 0 ? 'active' : '' }}">
                    @foreach($pair as $index => $item)
                        <div class="col-6">
                            <img src="{{ asset($item->image) }}"
                                 alt="Brand Image"
                                 class="img-fluid w-100 brand-image {{ $index % 2 == 0 ? 'slide-left' : 'slide-right' }}"
                                 style="object-fit: contain; height: 350px; border-radius: 5px;">
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .brand-container {
            overflow: hidden;
        }
        .image-pair {
            display: none;
            opacity: 0;
            transition: opacity 0.5s;
        }
        .image-pair.active {
            display: flex;
            opacity: 1;
        }
        .brand-image {
            opacity: 0;
            transform: translateX(-100%);
        }
        .brand-image.slide-right {
            transform: translateX(100%);
        }
        .image-pair.active .brand-image {
            animation-duration: 1s;
            animation-fill-mode: forwards;
        }
        .image-pair.active .slide-left {
            animation-name: slideFromLeft;
        }
        .image-pair.active .slide-right {
            animation-name: slideFromRight;
        }
        @keyframes slideFromLeft {
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        @keyframes slideFromRight {
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imagePairs = document.querySelectorAll('.image-pair');
            let currentIndex = 0;

            function showNextPair() {
                imagePairs[currentIndex].classList.remove('active');
                const currentImages = imagePairs[currentIndex].querySelectorAll('.brand-image');
                currentImages.forEach(img => {
                    img.style.opacity = '0';
                    img.style.transform = img.classList.contains('slide-left') ? 'translateX(-100%)' : 'translateX(100%)';
                });
                currentIndex = (currentIndex + 1) % imagePairs.length;
                imagePairs[currentIndex].classList.add('active');
            }

            setInterval(showNextPair, 4000);
        });
    </script>
@else
    <div class="text-center py-4">
        <h5 class="text-muted">No images available</h5>
    </div>
@endif

<div class="container">
    <h2 class="text-center mb-4">Categories</h2>
    <div class="categories-slider">
        <div class="categories-track d-flex">
            @foreach($category as $cat)
                <div style="width: 220px" class="category-item text-center">
                    <div class="icon-container">
                        <a href="{{ route('subcategory', ['category_id' => $cat->id]) }}">
                            <img src="{{ asset('uploads/category/' . $cat->image) }}"
                                 alt="{{ $cat->name }}"
                                 class="img-fluid rounded-circle mx-2"
                                 style="width: 150px; height: 150px;">
                        </a>
                    </div>
                    <h5 class="mt-3" style="word-wrap: break-word; white-space:-moz-pre-wrap; white-space:pre-wrap">{{ $cat->name }}</h5>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container">
    <h2 class="text-center mb-4">Authorized Brands</h2>
    <div class="brands-slider">
        <div class="brands-track d-flex">
            @foreach($brand as $b)
                <div style="width: 220px" class="category-item text-center">
                    <div class="icon-container">
                        <a href="#">
                            <img src="{{ asset($b->image) }}" alt="{{ $b->name }}"
                                 class="img-fluid rounded-circle mx-2"
                                 style="width: 150px; height: 150px;">
                        </a>
                    </div>
                    <h5 class="mt-3" style="word-wrap: break-word; white-space:-moz-pre-wrap; white-space:pre-wrap">{{ $b->name }}</h5>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- category slider --}}
<style>
    .categories-slider {
        position: relative;
        width: 100%;
        overflow: hidden;
        padding: 20px 0;
    }

    .categories-track {
        display: flex;
        width: fit-content;
        animation: scroll-brand 40s linear infinite;
    }

    .category-item {
        flex: 0 0 auto;
        padding: 0 20px;
    }

    @keyframes scroll-brand {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    .categories-track:hover {
        animation-play-state: paused;
    }
</style>

{{-- brands slider --}}
<style>
    .brands-slider {
        position: relative;
        width: 100%;
        overflow: hidden;
        padding: 20px 0;
    }

    .brands-track {
        display: flex;
        width: fit-content;
        animation: scroll 40s linear infinite;
    }

    .category-item {
        flex: 0 0 auto;
        padding: 0 20px;
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(50%);
        }
    }

    .brands-track:hover {
        animation-play-state: paused;
    }
</style>

<div id="Controls" class="carousel slide mx-auto mt-4" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        @foreach ($secondSlider as $key => $sliderItem)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                @if ($sliderItem->image)
                    <img src="{{ asset('/uploads/second-slider/' . $sliderItem->image) }}" class="d-block w-100"  alt="Image" style="height: 350px; object-fit:cover">
                @endif
            </div>
        @endforeach
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

<div class="container mt-2">
    <div class="row g-4">
        @foreach(range(0, 2) as $index)
            <div class="col-12 col-md-4">
                <div class="mini-slider-container">
                    <div class="image-track">
                        @foreach($minislider as $image)
                            <div class="slide-image">
                                <img src="{{ asset('uploads/mini-slider/' . $image->image) }}"
                                     alt="Slider Image"
                                     class="mini-slider-image">
                            </div>
                        @endforeach
                        <div class="slide-image">
                            <img src="{{ asset('uploads/mini-slider/' . $minislider[0]->image) }}"
                                 alt="Slider Image"
                                 class="mini-slider-image">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
.mini-slider-container {
    position: relative;
    width: 100%;
    height: 250px;
    overflow: hidden;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.image-track {
    position: absolute;
    display: flex;
    width: calc(100% * {{ count($minislider) + 1 }});
    height: 100%;
    transition: transform 0.5s ease-in-out;
}

.slide-image {
    width: calc(100% / {{ count($minislider) + 1 }});
    height: 100%;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
}

.mini-slider-image {
    max-width: 100%;
    max-height: 100%;
    width: auto;
    height: auto;
    object-fit: contain;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const containers = document.querySelectorAll('.mini-slider-container');

    containers.forEach((container, containerIndex) => {
        const track = container.querySelector('.image-track');
        let currentPosition = 0;

        setInterval(() => {
            currentPosition = (currentPosition + 1) % ({{ count($minislider) + 1 }});
            track.style.transform = `translateX(-${currentPosition * (100 / ({{ count($minislider) + 1 }}))}%)`;
        }, 3000 + (containerIndex * 1000));
    });
});
</script>

{{--  Youtube card  --}}
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 100%;">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video" allowfullscreen></iframe>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger" style="font-size: 1.5rem; text-decoration: none;">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-primary btn-sm" target="_blank">Watch</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card" style="width: 100%;">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video" allowfullscreen></iframe>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger" style="font-size: 1.5rem; text-decoration: none;">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-primary btn-sm" target="_blank">Watch</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-0">
            <div class="card" style="width: 100%;">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video" allowfullscreen></iframe>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-danger" style="font-size: 1.5rem; text-decoration: none;">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <h5 class="card-title mb-0" style="font-size: 1rem;">Watch this video</h5>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-primary btn-sm" target="_blank">Watch</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{--  Our Happy Customers  --}}
<div class="container mt-1">
    <div class="row justify-content-center">
        <h2 class="text-center mb-4">Our Happy Customers</h2>

        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ asset('uploads/customer.jpg') }}" alt="" class="rounded-circle" style="width: 120px; height: 120px;">
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
                    <img src="{{ asset('uploads/c2.jpg') }}" class="rounded-circle" style="width: 120px; height: 120px;">
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
                    <img src="{{ asset('uploads/c3.jpg') }}" class="rounded-circle" style="width: 120px; height: 120px;">
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
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-2">
                        <img src="{{ asset('uploads/janral/a.png') }}" alt="Image 1" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                    </div>
                    <div class="col-6 col-md-2">
                        <img src="{{ asset('uploads/janral/b.png') }}" alt="Image 2" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                    </div>
                    <div class="col-6 col-md-2">
                        <img src="{{ asset('uploads/janral/c.png') }}" alt="Image 3" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                    </div>
                    <div class="col-6 col-md-2">
                        <img src="{{ asset('uploads/janral/d.png') }}" alt="Image 4" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                    </div>
                    <div class="col-6 col-md-2">
                        <img src="{{ asset('uploads/janral/e.png') }}" alt="Image 5" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                    </div>
                    <div class="col-6 col-md-2">
                        <img src="{{ asset('uploads/janral/f.png') }}" alt="Image 6" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-2">
                        <img src="{{ asset('uploads/janral/i.png') }}" alt="Image 4" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                    </div>
                    <div class="col-6 col-md-2">
                        <img src="{{ asset('uploads/janral/j.png') }}" alt="Image 5" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                    </div>
                    <div class="col-6 col-md-2">
                        <img src="{{ asset('uploads/janral/e.png') }}" alt="Image 6" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                    </div>
                    <div class="col-6 col-md-2">
                        <img src="{{ asset('uploads/janral/a.png') }}" alt="Image 1" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                    </div>
                    <div class="col-6 col-md-2">
                        <img src="{{ asset('uploads/janral/b.png') }}" alt="Image 2" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                    </div>
                    <div class="col-6 col-md-2">
                        <img src="{{ asset('uploads/janral/d.png') }}" alt="Image 3" class="img-fluid w-100" style="object-fit: cover; height: 100px; border-radius: 5px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
     .carousel-control-prev:hover,
    .carousel-control-next:hover{
        /* background-color: #000; */
       background-color: rgba(71, 71, 71, 0.432) !important; /* Change this to your desired color */
        /* border-radius: 50%; */
        /* padding: 10px; */
    }
</style>

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
