@extends('layouts.app')

@section('title', $product->name)

@section('content')
<link href="{{ asset('assets/css/product.css') }}" rel="stylesheet">
<link href="{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel="stylesheet">

<p class="product-path text-muted mt-3 ms-3">
    Products & Services
    @foreach ($breadcrumb as $category)
        > <a href="{{ url('/category', $category->id) }}">{{ $category->name }}</a>
    @endforeach
    > {{ $product->name }}
</p>

<main class="product-page">
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Product Image Section -->
                <div class="col-md-5 mt-3">
                    <div class="product-images bg-white">
                        @if($product->images)
                            <div class="exzoom" id="exzoom">
                                <div class="exzoom_img_box">
                                    {{-- <ul class='exzoom_img_ul'> --}}
                                        @php
                                            $images = json_decode(str_replace('\\', '/', $product->images), true);
                                        @endphp
                                        @foreach ($images ?? [] as $image)
                                            @if (!empty($image))
                                                <img class="w-100 h-100" src="{{ asset($image) }}" alt="Product Image" />
                                            @endif
                                        @endforeach
                                    {{-- </ul> --}}
                                </div>
                                {{-- <div class="exzoom_nav"></div> --}}
                                {{-- <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn">&lt;</a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn">&gt;</a>
                                </p> --}}
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
                        <h2 class="fw-bold">{{ $product->name }}</h2>
                        <hr>

                        <!-- Pricing Section -->
                        <div class="mb-3">
                            @if(isset($product->price))
                                <h3 class="text-primary">Price: ₹{{ $product->price }}</h3>
                            @else
                                <h3 class="text-primary">Price not available</h3>
                            @endif
                        </div>

                        <!-- Stock Status -->
                        <div class="mb-3">
                            @if($product->stock > 0)
                                <span class="badge bg-success">In Stock</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                        </div>

                        <!-- Product Description -->
                        {{-- <div class="mb-4">
                            <h5 class="mb-2">Description</h5>
                            <p>{!! $product->description !!}</p>
                        </div> --}}

                        <!-- Product Serial Number -->
                        <div class="mb-3">
                            <h6 class="fw-bold">Serial Number</h6>
                            <p>{{ $product->serial_number }}</p>
                        </div>

                        <!-- Actions -->
                        {{-- <div class="actions mt-4">
                            <a href="#" class="btn btn-primary me-3">Add to My Products</a>
                            <input type="checkbox" class="form-check-input ms-3" id="compareCheck">
                            <label class="form-check-label" for="compareCheck">Compare</label>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-outline-primary w-100">Buy Online</button>
                        </div> --}}

                        <div class="d-flex gap-3 mt-4">
                            <a href="#" class="btn btn-primary flex-fill" id="add-to-cart">Add to My Products</a>
                            <input type="checkbox" class="form-check-input ms-3" id="compareCheck">Compare
                            <button class="btn btn-outline-dark flex-fill">Buy Online</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Main Documents Section -->
            <div class="mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="fw-bold text-success">Main documents</h3>
                    </div>
                    <div class="col-md-8">
                        <div class="card p-3 shadow-sm">
                            <h5 class="fw-bold">Documents</h5>
                            <div class="d-flex flex-wrap gap-4">
                                @if (isset($product) && $product->documents->count() > 0)
                                    @foreach ($product->documents as $document)
                                        <div>
                                            <a href="{{ asset('documents/' . basename($document->file_path)) }}" target="_blank">
                                                @if (Str::endsWith($document->file_path, '.pdf'))
                                                    <img src="{{ asset('assets/icons/pdf-icon.png') }}" alt="PDF" width="25">
                                                @elseif (Str::endsWith($document->file_path, ['.exe', '.zip']))
                                                    <img src="{{ asset('assets/icons/software-icon.png') }}" alt="Software" width="25">
                                                @elseif (Str::endsWith($document->file_path, ['.dll', '.inf']))
                                                    <img src="{{ asset('assets/icons/driver-icon.png') }}" alt="Driver" width="25">
                                                @else
                                                    <img src="{{ asset('assets/icons/file-icon.png') }}" alt="File" width="25">
                                                @endif
                                                {{ ucfirst($document->type) }}
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted"><i>No uploaded documents available.</i></p>
                                @endif
                            </div>
                            <div class="mt-2">
                                <a href="{{ url('/all-documents') }}" class="text-primary">See all documents</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Product Description --}}
            <div class="mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="fw-bold text-success">Description</h3>
                    </div>
                    <div class="col-md-8">
                        <p class="text-muted">{!! $product->description !!}</p>
                    </div>
                </div>
            </div>

            {{-- Product Specification --}}
            {{-- <div class="mt-1">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="fw-bold text-success">Specifications</h3>
                    </div>
                    @if (!empty($product->attributes))
                        @foreach ($product->attributes as $attribute)
                            <div class="col-md-8">

                                <h3 class="fw-bold">{{ $attribute->title }}</h3>

                                <div class="col-md-15">
                                    <table class="table">
                                        <thead class="">
                                            <tr class="table-light">
                                                <th>{{ $attribute->title }}</th>
                                            </tr>
                                            <tr>
                                                <th>{{ $attribute->description }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            @foreach ($attribute->short_attributes ?? [] as $shortAttribute)
                                                <tr>
                                                    <td class="fw-bold">{{ $shortAttribute['key'] ?? 'N/A' }}</td>
                                                    <td>{{ $shortAttribute['value'] ?? 'N/A' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if (empty($attribute->short_attributes))
                                        <p class="text-muted"><i>No attributes available.</i></p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted"><i>No specifications available.</i></p>
                    @endif
                </div>
            </div> --}}


            <!-- Product Specifications -->
            <div class="mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="fw-bold text-success">Specifications</h3>
                    </div>
                    <div class="col-md-8">
                        @if (!empty($product->attributes))
                            @foreach ($product->attributes as $attribute)
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-header bg-light fw-bold">
                                        {{ $attribute->title }}
                                    </div>
                                    <div class="card-body p-3">
                                        <p class="text-muted">{{ $attribute->description }}</p>
                                        @if (!empty($attribute->short_attributes))
                                            <table class="table table-bordered">
                                                <tbody>
                                                    @foreach ($attribute->short_attributes as $shortAttribute)
                                                        <tr>
                                                            <td class="fw-bold text-secondary">
                                                                {{ $shortAttribute['key'] ?? 'N/A' }}
                                                            </td>
                                                            <td>{{ $shortAttribute['value'] ?? 'N/A' }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <p class="text-muted"><i>No attributes available.</i></p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted"><i>No specifications available.</i></p>
                        @endif
                    </div>
                </div>
            </div>



            {{-- Documents --}}
            <div class="container mt-4">
                <h2 class="text-success">Documents</h2>
                <div class="row">
                    <!-- Filters -->
                    <div class="col-md-3 mt-3">
                        <div class="mb-3">
                            <div class="dropdown">
                                <h5 class="card-header text-white fw-bold" style="background-color: #0d6efd;">Document Category</h5>
                                <div class="border p-3">
                                    <input type="checkbox" class="category-filter" value="Software"> Software <br>
                                    <input type="checkbox" class="category-filter" value="PDF"> PDF <br>
                                    <input type="checkbox" class="category-filter" value="Driver"> Driver <br>
                                </div>
                            </div>


                        </div>

                        <!-- Language -->
                        <div class="mb-3" id="languageFilterContainer">
                            <div class="dropdown">
                                <h5 class="card-header text-white fw-bold" style="background-color: #0d6efd;">Language</h5>
                                <div class="border p-3">
                                    <input type="checkbox" class="language-filter" value="English" checked> English <br>
                                    <input type="checkbox" class="language-filter" value="All"> All Languages <br>
                                </div>
                            </div>


                        </div>

                        <!-- Clear Filter Button -->
                        <div class="mb-4">
                            <button class="btn btn-secondary w-100" id="clear-filters">Clear Filters</button>
                        </div>

                    </div>

                    <!-- Document List -->
                    <div class="col-md-8 mt-3" style="margin-left: 80px;">
                        <div id="documentList">
                            @if(isset($product) && $product->documents->count() > 0)
                                @foreach($product->documents as $document)
                                    @php
                                        $documentType = 'File';
                                        if (Str::endsWith($document->file_path, '.pdf')) {
                                            $documentType = 'PDF';
                                        } elseif (Str::endsWith($document->file_path, ['.exe', '.zip'])) {
                                            $documentType = 'Software';
                                        } elseif (Str::endsWith($document->file_path, ['.dll', '.inf'])) {
                                            $documentType = 'Driver';
                                        }
                                    @endphp
                                    <div class="card mb-2 document-item"
                                        data-category="{{ $documentType }}"
                                        data-language="{{ $document->language ?? 'English' }}">
                                        <div class="card-body">
                                            <a href="{{ asset('documents/' . basename($document->file_path)) }}" target="_blank" class="btn btn-outline-primary float-end">Download</a>
                                            <h5 style="text-align:left">
                                                <a href="{{ asset('documents/' . basename($document->file_path)) }}" target="_blank" class="text-decoration-none text-dark">
                                                    {{ $document->title ?? ucfirst($document->type) }}
                                                </a>
                                            </h5>
                                            <p>
                                                {{ $documentType }} {{-- ({{ number_format($document->file_size / 1024, 1) }} KB) | --}}
                                                {{ date('d M Y', strtotime($document->created_at)) }} |
                                                {{ ucfirst($document->type) }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted"><i>No uploaded documents available.</i></p>
                            @endif
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
<link rel="stylesheet" href="{{ asset('assets/exzoom/jquery.exzoom.css') }}">
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

        $('#add-to-cart').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route("cart.add", $product->id) }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: '{{ $product->id }}'
                },
                success: function(response) {
                    if (response.success) {
                        let cartCount = parseInt($('.badge.bg-danger').text());
                        $('.badge.bg-danger').text(cartCount + 1);
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });


        // Filter documents based on selected categories and languages
        function filterDocuments() {
            let selectedCategories = [];
            $('.category-filter:checked').each(function() {
                selectedCategories.push($(this).val());
            });

            let selectedLanguages = [];
            $('.language-filter:checked').each(function() {
                selectedLanguages.push($(this).val());
            });

            $('#documentList .document-item').each(function() {
                let category = $(this).data('category');
                let language = $(this).data('language');
                let categoryMatch = selectedCategories.length === 0 || selectedCategories.includes(category);
                let languageMatch = selectedLanguages.length === 0 || selectedLanguages.includes(language);

                if (categoryMatch && languageMatch) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $('.category-filter, .language-filter').change(function() {
            filterDocuments();
        });

        $('#clear-filters').on('click', function() {
            $('.category-filter, .language-filter').prop('checked', false);
            filterDocuments();
        });

        // Scroll to documents section
        $('#scroll-to-documents').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $(".container.mt-4").offset().top
            }, 1000);
        });
    });


    $(document).ready(function() {
        $('#load-more-docs').on('click', function(e) {
            e.preventDefault();
            $('#documents-list').css('max-height', 'none');
        });

        $('#specifications').on('mouseenter', function() {
            $(this).css('overflow-y', 'scroll');
        }).on('mouseleave', function() {
            $(this).css('overflow-y', 'auto');
        });
    });



    // $(document).ready(function() {
    //     $('#categoryFilter, #languageFilter, #sortFilter').change(function() {
    //         console.log('Filters updated');
    //         // Add filtering/sorting logic here
    //     });
    // });


    // $(document).ready(function() {
    //     $('.category-filter, .language-filter').change(function() {
    //         let selectedCategories = [];
    //         $('.category-filter:checked').each(function() {
    //             selectedCategories.push($(this).val());
    //         });

    //         let selectedLanguages = [];
    //         $('.language-filter:checked').each(function() {
    //             selectedLanguages.push($(this).val());
    //         });

    //         $('#documentList .card').each(function() {
    //             let category = $(this).data('category');
    //             let language = $(this).data('language');
    //             let categoryMatch = selectedCategories.length === 0 || selectedCategories.includes(category);
    //             let languageMatch = selectedLanguages.length === 0 || selectedLanguages.includes(language);

    //             if (categoryMatch && languageMatch) {
    //                 $(this).show();
    //             } else {
    //                 $(this).hide();
    //             }
    //         });
    //     });
    // });


    document.addEventListener("DOMContentLoaded", function () {
        let categoryDropdown = document.getElementById("categoryDropdown");
        let categoryMenu = document.querySelector("#categoryDropdown + .dropdown-menu");
        let languageFilterContainer = document.getElementById("languageFilterContainer");

        categoryDropdown.addEventListener("click", function () {
            if (!categoryMenu.classList.contains("show")) {
                // Dropdown is opening - move language filter down
                let dropdownHeight = categoryMenu.scrollHeight;
                languageFilterContainer.style.marginTop = dropdownHeight + "px";
            } else {
                // Dropdown is closing - reset position
                languageFilterContainer.style.marginTop = "0px";
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", function (event) {
            if (!categoryDropdown.contains(event.target) && !categoryMenu.contains(event.target)) {
                languageFilterContainer.style.marginTop = "0px";
            }
        });
    });
</script>
@endpush
