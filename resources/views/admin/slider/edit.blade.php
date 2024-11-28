@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Edit Slider
                    <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ $slider->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Current Image</label><br>
                        <img src="{{ asset($slider->image) }}" alt="Slider Image" style="width: 100px; height: 100px;">
                    </div>
                    <div class="mb-3">
                        <label>Upload New Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Status</label><br>
                        <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked' : '' }} style="width: 30px; height: 30px;"> Checked = Hidden, Unchecked = Visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
