@extends('layouts.admin')

@section('content')

        <h1>Sliders</h1>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">Add Slider</a>

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sliders as $slider)
        <tr>
            <td>{{ $slider->title }}</td>
            <td><img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" width="100"></td>
            <td>{{ $slider->status ? 'Active' : 'Inactive' }}</td>
            <td>
                <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
            
                <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
