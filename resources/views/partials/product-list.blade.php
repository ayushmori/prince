@foreach ($products as $product)
    <div class="col">
        <div class="card h-100">
            <img src="{{ asset('uploads/product/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top" style="object-fit: cover; height: 200px;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <div class="mt-auto">
                    <a href="{{ url('/product', $product->id) }}" class="btn btn-primary mb-2">View Details</a>
                </div>
            </div>
        </div>
    </div>
@endforeach