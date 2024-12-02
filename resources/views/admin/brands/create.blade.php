@extends('layouts.admin')

@section('content')
    <h1>{{ $brand ? 'Edit Brand' : 'Add Brand' }}</h1>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">{{ $brand ? 'Edit Brand' : 'Create Brand' }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brands.save', $brand->id ?? '') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Brand Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $brand->name ?? '') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="image" class="form-label">Brand Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if($brand && $brand->image)
                                    <div class="mt-2">
                                        <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" class="img-thumbnail" style="max-width: 150px;">
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $brand->description ?? '') }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="serial_number" class="form-label">Serial Number</label>
                                <input type="number" class="form-control" id="serial_number" name="serial_number" value="{{ old('serial_number',$brand->serial_number ?? $nextSerialNumber) }}" required>

                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">{{ $brand ? 'Update Brand' : 'Create Brand' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
