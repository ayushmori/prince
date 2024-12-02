@extends('layouts.app')

@section('title', 'News Page')

@section('content')

    <div class="container">
        <div class="row mt-4">

            <div class="container">
                <div class="row">
                    @foreach ($news as $article)
                    <div class="col-md-4">
                        <a href="{{ route('newsview', $article->id) }}" class="card-link">
                            <div class="card">
                                {{-- {{$article->image }} --}}
                                <a href="{{ route('newsview', $article->id) }}">
                                <img src="{{ asset($article->image) }}" class="card-img-top" alt="{{ $article->header }}">
                            </a>
                                <div class="card-body">
                                    <h3 class="card-title">{{ $article->header }}</h3>
                                    <p class="card-text">{{ Str::limit($article->description, 500) }}</p>
                                    <!-- Optional: you can keep the Read More button or remove it -->
                                    <a href="{{ route('newsview', $article->id) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach

                </div>
            </div>

        </div>
    </div>
    </div>

@endsection
