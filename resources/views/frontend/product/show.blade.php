@extends('layouts.app')

@section('title', $product->name)

@section('content')
<link href="{{ asset('assets/css/product.css') }}" rel="stylesheet">
<link href="{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel="stylesheet">

<p class="product-path text-muted mt-3 ms-3">
    Home / {{$product->category->name}} / {{$product->name}}
</p>

<main class="product-page">
    <div class="py-4">
        <div class="container">
            <div class="row">

                <!-- Product Image Section -->
                <div class="col-md-5 mt-3">
                    <div class="product-images bg-white border">
                        @if($product->images)
                            <div class="exzoom" id="exzoom">
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @php
                                            $images = json_decode(str_replace('\\', '/', $product->images), true);
                                        @endphp
                                        @foreach ($images ?? [] as $image)
                                            @if (!empty($image))
                                                <li><img class="w-100 h-100" src="{{ asset($image) }}" alt="Product Image" /></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn">&lt;</a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn">&gt;</a>
                                </p>
                            </div>
                        @else
                            <div class="text-center p-4">
                                No Image Available
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Product Details Section -->
                <div class="col-md-7 mt-3">
                    <div class="product-details">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <hr>

                        <!-- Breadcrumb Navigation -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/category/'.$product->category->slug) }}">{{ $product->category->name }}</a></li>
                                <li class="breadcrumb-item active">{{ $product->name }}</li>
                            </ol>
                        </nav>

                        <!-- Pricing Section -->
                        <div class="mb-3">
                            <span class="selling-price h4 text-success">${{ number_format($product->selling_price, 2) }}</span>
                            @if($product->original_price > $product->selling_price)
                                <span class="original-price text-muted text-decoration-line-through">${{ number_format($product->original_price, 2) }}</span>
                                <span class="discount text-danger">
                                    ({{ round((($product->original_price - $product->selling_price) / $product->original_price) * 100) }}% OFF)
                                </span>
                            @endif
                        </div>

                        <!-- Stock Status -->
                        <div class="mb-3">
                            @if($product->quantity > 0)
                                <span class="badge bg-success">In Stock</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                        </div>

                        <!-- Product Description -->
                        <div class="mb-4">
                            <h5 class="mb-2">Description</h5>
                            <p>{!! $product->description !!}</p>
                        </div>

                        <!-- Product Serial Number -->
                        <div class="mb-3">
                            <h6>Serial Number</h6>
                            <p>{{ $product->serial_number }}</p>
                        </div>

                        <!-- Actions -->
                        <div class="actions mt-4">
                            <a href="#" class="btn btn-primary me-3">Add to My Products</a>
                            <input type="checkbox" class="form-check-input ms-3" id="compareCheck">
                            <label class="form-check-label" for="compareCheck">Compare</label>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-outline-primary w-100">Buy Online</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>
<style>
ul {
    list-style-type: none;
}
</style>
<script>
    $(document).ready(function() {
        if ($("#exzoom").length) {
            $("#exzoom").exzoom({
                navWidth: 60,
                navHeight: 60,
                navItemNum: 5,
                navItemMargin: 7,
                navBorder: 1,
                autoPlay: true,
                autoPlayTimeout: 2000,
            });
        }
    });
</script>
@endpush
