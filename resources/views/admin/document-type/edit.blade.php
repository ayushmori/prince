@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Document Type</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.document-type.update', $documentType->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $documentType->name) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $documentType->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($documentType->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $documentType->image) }}" alt="Document Type Image" width="150">
                    <input type="hidden" name="existing_image" value="{{ $documentType->image }}">
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
