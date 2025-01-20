
@extends('layouts.app')

@section('title', $product->name)

@section('content')
<link href="{{ asset('assets/css/product.css') }}" rel="stylesheet">
<p class="product-path" style="margin:10px 150px;">
                        Home / {{$product->category->name}} / {{$product->name}}
</p>


<main class="product-page">

        <div class="product-image">
        
            @php
                            $images = json_decode(str_replace('\\', '/', $product->images), true);
                        @endphp

                        @if (!empty($images) && is_array($images))
                            @foreach ($images as $image)
                                @if (!empty($image))
                                    <img src="{{ url($image) }}" alt="Product Image" class="img-thumbnail" width="50"
                                        height="50">
                                @else
                                    <p>No image available for this entry.</p>
                                @endif
                            @endforeach
                        @else
                            <p>No images available</p>
                        @endif
        </div>


        
        <div class="product-details">
            <h1 class="name"><b>{{ $product->name }}</b></h1>
            <p style="margin:20px 0px;">{{ $product->serial_number }}</p>
            <a href="#" style="color:blue; padding-bottom:5px;">Add to My Products</a>
            
          
          
    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="margin-left:20px;">
    <label class="form-check-label" for="exampleCheck1" >Compare</label>

    <div class="environmental__top_block__wrapper">
                    

                <button href="#" class="btn" style="border: 1px solid black; padding:5px 100px; margin-top:20px;">Buy Online</buton>
            </div>
           
        </div>
    </main>

@endsection
@push('scripts')

<script>
    $(function(){

$("#exzoom").exzoom({

  // thumbnail nav options
  "navWidth": 60,
  "navHeight": 60,
  "navItemNum": 5,
  "navItemMargin": 7,
  "navBorder": 1,

 
  "autoPlay": false,

 
  "autoPlayTimeout": 2000
  
});

});
</script>
@endpush