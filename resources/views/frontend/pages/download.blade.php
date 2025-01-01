@extends('layouts.app')

@section('title', 'Download')

@section('content')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">

    <div class="section">
        <div class="container">
            <div class="search-panel">
                <div class="row">
                    <div class="col-md-4">
                        <select class="text-field" id="downloadBrand" name="downloadBrand">
                            <option value="0" selected>- Select Brand -</option>
                            <option value="3">Inovance</option>
                            <option value="4">Autonics</option>
                            <option value="5">Schneider Electric</option>
                            <option value="6">Rtelligent</option>
                            <option value="7">Modbus</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="text-field" id="downloadCategory" name="downloadCategory">
                            <option value="0" selected>- Select Category -</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="text-field" id="downloadSubCategory" name="downloadSubCategory">
                            <option value="0" selected>- Select Subcategory -</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-8">
                        <input type="text" class="text-field" id="searchProduct" placeholder="Search product">
                    </div>
                    <button class="custbtn" id="searchButton">Search</button>
                </div>
            </div>
        </div>
    </div>

    <div class="section pt0">
        <div class="container">
            <div class="image-grid">
                @foreach (['Inovance', 'Autonics', 'Schneider Electric', 'Rtelligent', 'Modbus'] as $index => $brand)
                    <div>
                        <a href="download/{{ strtolower(str_replace(' ', '-', $brand)) }}/{{ $index + 3 }}"
                            title="{{ $brand }}">
                            <img class="img-responsive"
                                src="{{ asset('images/' . ($index + 3) . strtolower(str_replace(' ', '-', $brand)) . '.png') }}"
                                alt="{{ $brand }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script>
        document.getElementById("searchButton").addEventListener("click", function () {
            alert("Search functionality not implemented yet.");
        });
    </script>

    <style>
        /* General Styling */
        .section {
            padding: 30px 0;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1140px;
            margin: auto;
        }

        /* Search Panel */
        .search-panel {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .text-field {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .custbtn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.3s;
        }

        .custbtn:hover {
            background-color: #0056b3;
        }

        /* Image Grid */
        .image-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .image-grid img {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .image-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .image-grid {
                grid-template-columns: 1fr;
            }

            .search-panel {
                padding: 15px;
            }
        }
    </style>
@endsection
