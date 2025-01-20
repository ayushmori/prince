@extends('layouts.app')

@section('content')

<div class="row mt-4">
                           
                            <div class="col-md-2">
                                <h4>Parent Categories</h4>
                                <div class="category-container">
                                    @foreach ($categories as $category)
                                        <div id="category-{{ $category->id }}"      >
                                            {{ $category->name }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>

@endsection