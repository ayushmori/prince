@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Category</h3>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
          <li class="breadcrumb-item">Category</li>
          <li class="breadcrumb-item active">Category View</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h3>Add Categories
              <a href="{{ url('admin/categories/create')}}" class="btn btn-primary btn-sm text-white float-end">Add</a>
          </h3>
        </div>
        
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif   

        @if(session('error'))
          <div class="alert alert-danger">{{session('error')}}</div>
        @endif 

      
        <div class="card-body">
          <div class="table-responsive product-table">
            <table class="display dataTable no-footer">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Slug</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th>Serial Number</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->slug }}</td>
                  <td>
                    @if(isset($category->image) && $category->image)
                        <img src={{ asset('/uploads/category/' . $category->image) }} alt="{{ $category->name }}" style="width: 70px; height: 70px; border-radius: 50%;">
                    @else
                        <span>No Image Available</span>
                    @endif
                  </td>
                  <td>
                    <p>{{ $category->description }}</p>
                  </td>
                  <td>{{ $category->serial_number }}</td>
                  <td>
                    <!-- Edit Button -->
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-success btn-sm">
                      Edit
                    </a>

                    <!-- Delete Button (Form Approach) -->
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this category?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">
                          Delete
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
