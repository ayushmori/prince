@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container mt-3">
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h4 class="display-4">About Us</h4>
            <div class="underline mx-auto mb-4"></div>
        </div>
    </div>

    <!-- About Us Section 1 -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <img src="{{ asset($aboutSettings->about_us_image_1) }}" alt="{{ $aboutSettings->about_us_title_1 }}" class="img-fluid rounded shadow mb-3">
        </div>
        <div class="col-md-6">
            <h2 class="text-primary">{{ $aboutSettings->about_us_title_1 }}</h2>
            <p class="text-muted">{{ $aboutSettings->about_us_description_1 }}</p>
        </div>
    </div>

    <!-- About Us Section 2 -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-6 order-md-2">
            <img src="{{ asset($aboutSettings->about_us_image_2) }}" alt="{{ $aboutSettings->about_us_title_2 }}" class="img-fluid rounded shadow mb-3">
        </div>
        <div class="col-md-6">
            <h2 class="text-primary">{{ $aboutSettings->about_us_title_2 }}</h2>
            <p class="text-muted">{{ $aboutSettings->about_us_description_2 }}</p>
        </div>
    </div>

    <!-- About Us Section 3 -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <img src="{{ asset($aboutSettings->about_us_image_3) }}" alt="{{ $aboutSettings->about_us_title_3 }}" class="img-fluid rounded shadow mb-3">
        </div>
        <div class="col-md-6">
            <h2 class="text-primary">{{ $aboutSettings->about_us_title_3 }}</h2>
            <p class="text-muted">{{ $aboutSettings->about_us_description_3 }}</p>
        </div>
    </div>

    <!-- Mission, Vision, and Goals Section -->
    {{-- <h2 class="text-center mb-4">Our Mission, Vision, and Goals</h2> --}}
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset($aboutSettings->mission_image) }}" class="card-img-top" alt="{{ $aboutSettings->mission_title }}" style="max-width: 100%; height: auto;">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center text-primary">{{ $aboutSettings->mission_title }}</h5>
                    <p class="card-text text-muted">{{ $aboutSettings->mission_description }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset($aboutSettings->vision_image) }}" class="card-img-top" alt="{{ $aboutSettings->vision_title }}" style="max-width: 100%; height: auto;">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center text-primary">{{ $aboutSettings->vision_title }}</h5>
                    <p class="card-text text-muted">{{ $aboutSettings->vision_description }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset($aboutSettings->goals_image) }}" class="card-img-top" alt="{{ $aboutSettings->goals_title }}" style="max-width: 100%; height: auto;">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center text-primary">{{ $aboutSettings->goals_title }}</h5>
                    <p class="card-text text-muted">{{ $aboutSettings->goals_description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection