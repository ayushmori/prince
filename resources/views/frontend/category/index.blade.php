{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Categories</h3>
        <div id="category-list">
            @foreach ($categories as $category)
                <div class="category-item" data-category-id="{{ $category->id }}">
                    <span class="category-name">{{ $category->name }}</span>
                    @if ($category->children->isNotEmpty())
                        <div class="child-categories" style="display: none;">
                            @foreach ($category->children as $child)
                                <div class="category-item" data-category-id="{{ $child->id }}">
                                    <span class="category-name">{{ $child->name }}</span>
                                    @if ($child->children->isNotEmpty())
                                        <div class="child-categories" style="display: none;">
                                            @foreach ($child->children as $subchild)
                                                <div class="category-item" data-category-id="{{ $subchild->id }}">
                                                    <span class="category-name">{{ $subchild->name }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
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
                    (childContainer.style.display === 'none' || !childContainer.style.display) ? 'block' : 'none';
            } else {
                const categoryId = categoryItem.getAttribute('data-category-id'); // Correct variable name here

                fetch(`/category/${categoryId}/children`)
                    .then(response => response.json())
                    .then(children => {
                        if (children.length > 0) {
                            const newChildContainer = document.createElement('div');
                            newChildContainer.classList.add('child-categories');

                            children.forEach(child => {
                                const childItem = document.createElement('div');
                                childItem.classList.add('category-item');
                                childItem.setAttribute('data-category-id', child.id);

                                childItem.innerHTML = `
                                    <span class="category-name">${child.name}</span>
                                `;

                                newChildContainer.appendChild(childItem);
                            });

                            categoryItem.appendChild(newChildContainer);
                            newChildContainer.style.display = 'block';
                        } else {
                            // Redirect to category page if no children
                            window.location.href = `/category/${categoryId}`; // Use categoryId here
                        }
                    })
                    .catch(error => console.error('Error fetching children:', error));
            }
        }
    });
});


    </script>
@endsection --}}

{{-- do not delete above code  --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="my-4 text-center">Categories</h3>
        <div id="category-list" class="list-group">
            @foreach ($categories as $category)
                <div class="category-item list-group-item border-0 p-3 mb-2 bg-light rounded shadow-sm" data-category-id="{{ $category->id }}">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="category-name fw-bold" style="cursor: pointer; font-size: 1.2rem;">{{ $category->name }}</span>
                        <button class="btn btn-sm btn-outline-primary toggle-children">+</button>
                    </div>
                    @if ($category->children->isNotEmpty())
                        <div class="child-categories mt-3 ps-3 border-start border-3" style="display: none;">
                            @foreach ($category->children as $child)
                                @include('partials.child-category', ['category' => $child])
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#category-list').addEventListener('click', function(e) {
                if (e.target.classList.contains('category-name')) {
                    const categoryItem = e.target.closest('.category-item');
                    const childContainer = categoryItem.querySelector('.child-categories');

                    if (childContainer) {
                        childContainer.style.display =
                            (childContainer.style.display === 'none' || !childContainer.style.display) ? 'block' : 'none';
                    } else {
                        const categoryId = categoryItem.getAttribute('data-category-id');

                        fetch(`/category/${categoryId}/children`)
                            .then(response => response.json())
                            .then(children => {
                                if (children.length > 0) {
                                    const newChildContainer = document.createElement('div');
                                    newChildContainer.classList.add('child-categories', 'mt-3', 'ps-3', 'border-start', 'border-3');

                                    children.forEach(child => {
                                        const childItem = document.createElement('div');
                                        childItem.classList.add('category-item', 'list-group-item', 'border-0', 'p-2', 'mb-1', 'bg-white', 'rounded', 'shadow-sm');
                                        childItem.setAttribute('data-category-id', child.id);

                                        childItem.innerHTML = `
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="category-name">${child.name}</span>
                                                <button class="btn btn-sm btn-outline-secondary toggle-children">+</button>
                                            </div>
                                        `;

                                        newChildContainer.appendChild(childItem);
                                    });

                                    categoryItem.appendChild(newChildContainer);
                                    newChildContainer.style.display = 'block';
                                } else {
                                    window.location.href = `/category/${categoryId}`;
                                }
                            })
                            .catch(error => console.error('Error fetching children:', error));
                    }
                }

                if (e.target.classList.contains('toggle-children')) {
                    const categoryItem = e.target.closest('.category-item');
                    const childContainer = categoryItem.querySelector('.child-categories');
                    if (childContainer) {
                        childContainer.style.display =
                            (childContainer.style.display === 'none' || !childContainer.style.display) ? 'block' : 'none';
                        e.target.textContent = e.target.textContent === '+' ? '-' : '+';
                    }
                }
            });
        });
    </script>

    <style>
        .category-item {
            position: relative;
        }

        .category-name {
            text-decoration: underline;
            color: #007bff;
        }

        .category-name:hover {
            color: #0056b3;
        }

        .toggle-children {
            width: 30px;
            height: 30px;
            font-size: 14px;
            padding: 0;
        }

        .child-categories {
            animation: fadeIn 0.3s ease-in-out;
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
@endsection

