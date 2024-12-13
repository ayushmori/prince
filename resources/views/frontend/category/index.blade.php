<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row">
        <!-- Left side: Categories -->
        <div class="col-md-12">
            <div class="categories-list bg-light p-3 rounded">
                <h5>Categories</h5>
                <ul id="category-list" class="list-unstyled">
                    @foreach ($categories as $category)
                        @include('partials.child-category', ['category' => $category])
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('#category-list').addEventListener('click', function (e) {
            if (e.target.classList.contains('toggle-children')) {
                const categoryItem = e.target.closest('.category-item');
                const childContainer = categoryItem.querySelector('.child-categories');

                if (childContainer) {
                    const isHidden = childContainer.style.display === 'none' || !childContainer.style.display;
                    childContainer.style.display = isHidden ? 'block' : 'none';
                    e.target.innerHTML = isHidden ? '&darr;' : '&rarr;'; // Change to down/right arrow
                }
            }

            if (e.target.classList.contains('category-name')) {
                const categoryId = e.target.closest('.category-item, .child-category-item').getAttribute('data-category-id');

                // Fetch category content dynamically
                fetch(`/category/${categoryId}/content`)
                    .then(response => response.json())
                    .then(data => {
                        const contentContainer = document.querySelector('#category-content');
                        contentContainer.innerHTML = ''; // Clear previous content

                        if (data.length > 0) {
                            data.forEach(item => {
                                const col = document.createElement('div');
                                col.className = 'col';

                                col.innerHTML = `
                                    <div class="card shadow-sm">
                                        <img src="${item.image}" class="card-img-top" alt="${item.title}">
                                        <div class="card-body">
                                            <h6 class="card-title">${item.title}</h6>
                                            <p class="card-text">${item.description}</p>
                                        </div>
                                    </div>
                                `;

                                contentContainer.appendChild(col);
                            });
                        } else {
                            contentContainer.innerHTML = `
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <div class="card-body text-center">
                                            <p>No content available for this category.</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                        }
                    })
                    .catch(error => console.error('Error fetching category content:', error));
            }
        });
    });
</script>

<style>
    .categories-list {
        max-height: 80vh;
        overflow-y: auto;
        border: 1px solid #ddd;
    }

    .category-item, .child-category-item {
        padding: 5px 0;
    }

    .category-name {
        font-weight: bold;
        color: #007bff;
        cursor: pointer;
    }

    .category-name:hover {
        text-decoration: underline;
    }

    .child-categories {
        margin-left: 10px;
    }

    .toggle-children {
        cursor: pointer;
        font-size: 1.2rem; /* Increase size for better visibility */
    }

    .card {
        border: none;
    }

    .card-img-top {
        height: 150px;
        object-fit: cover;
    }

    .card-body {
        padding: 10px;
    }

    .card-title {
        font-size: 1rem;
        margin: 0;
    }

    .card-text {
        font-size: 0.9rem;
        color: #6c757d;
    }
</style> --}}
@endsection
