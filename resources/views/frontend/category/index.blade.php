<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


 {{-- @extends('layouts.app')

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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
@endsection --}}


@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Categories</h3>
        <ul id="category-list" class="list-unstyled">
            @foreach ($categories as $category)
                <li class="category-item" data-category-id="{{ $category->id }}">
                    <span class="category-name">&rarr;{{ $category->name }}</span>
                    @if ($category->children->isNotEmpty())
                        <ul class="child-categories list-unstyled ms-3" style="display: none;">
                            @foreach ($category->children as $child)
                                <li class="category-item" data-category-id="{{ $child->id }}">
                                    <span class="category-name">&rarr;{{ $child->name }}</span>
                                    @if ($child->children->isNotEmpty())
                                        <ul class="child-categories list-unstyled ms-3" style="display: none;">
                                            @foreach ($child->children as $subchild)
                                                <li class="category-item" data-category-id="{{ $subchild->id }}">
                                                    <span class="category-name">&rarr;{{ $subchild->name }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#category-list').addEventListener('click', function(e) {
                if (e.target.classList.contains('category-name')) {
                    const categoryItem = e.target.closest('.category-item');
                    const childContainer = categoryItem.querySelector('.child-categories');

                    if (childContainer) {
                        // Toggle visibility of child categories
                        childContainer.style.display =
                            (childContainer.style.display === 'none' || !childContainer.style.display) ? 'inline-block' : 'none';
                    } else {
                        const categoryId = categoryItem.getAttribute('data-category-id');

                        // Fetch children dynamically if not already loaded
                        fetch(`/category/${categoryId}/children`)
                            .then(response => response.json())
                            .then(children => {
                                if (children.length > 0) {
                                    const newChildContainer = document.createElement('ul');
                                    newChildContainer.classList.add('child-categories', 'list-unstyled', 'ms-3');

                                    children.forEach(child => {
                                        const childItem = document.createElement('li');
                                        childItem.classList.add('category-item');
                                        childItem.setAttribute('data-category-id', child.id);

                                        childItem.innerHTML = `
                                            <span class="category-name">${child.name}</span>
                                        `;

                                        newChildContainer.appendChild(childItem);
                                    });

                                    categoryItem.appendChild(newChildContainer);
                                    newChildContainer.style.display = 'inline-block';
                                } else {
                                    // Redirect if no children
                                    window.location.href = `/category/${categoryId}`;
                                }
                            })
                            .catch(error => console.error('Error fetching children:', error));
                    }
                }
            });
        });
    </script>

    <style>
        body {
            background-color: #1a1a1a;
            color: #eaeaea;
        }

        .category-name {
            cursor: pointer;
            color: #00aced;
            text-decoration: none;
        }

        .category-name:hover {
            color: #007bff;
        }
/*
        .child-categories {
            border-left: 2px solid #555;
            padding-left: 15px;
            margin-top: 5px;
        } */

        ul#category-list {
            padding-left: 0;
        }
    </style>
@endsection
