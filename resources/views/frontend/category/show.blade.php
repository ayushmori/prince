@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Category: {{ $category->name }}</h3>
        <p>{{ $category->description }}</p>


        @if ($category->children->isNotEmpty())
            <h4>Subcategories</h4>
            <ul>
                @foreach ($category->children as $child)
                    <li>
                        <a href="{{ route('category.show', $child->slug) }}">{{ $child->name }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
