@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Category: {{ $category->name }}</h3>
        <p>{{ $category->description }}</p>

        @if ($category->children->isNotEmpty())
            <h4>Subcategories</h4>
            <div class="row">
                @foreach ($category->children as $child)
                    <div class="col-md-4 mb-3">
                        <div class="category-item list-group-item border-0 p-2 mb-1 bg-white rounded shadow-sm">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="category-name">{{ $child->name }}</span>
                                <a href="{{ route('category.show', $child->slug) }}" class="btn btn-sm btn-outline-secondary">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
