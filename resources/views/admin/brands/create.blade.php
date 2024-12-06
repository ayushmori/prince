@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Brand</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
            <li class="breadcrumb-item">Brand</li>
            <li class="breadcrumb-item active">Brands Create/Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>


<div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
                <h5 class="mb-0">{{ $brand ? 'Edit Brand' : 'Create Brand' }}
                <a href="{{ url('admin/brands')}}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                </h5>
        </div>
            <div class="card-body">
                <form action="{{ route('admin.brands.save', $brand->id ?? '') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Brand Name</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="text" id="name" name="name"  value="{{ old('name', $brand->name ?? '') }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                        <input class="form-control" id="description"  type="text" name="description" value="{{ old('description', $brand->description ?? '') }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Serial Number</label>
                        <div class="col-sm-9">
                        <input type="number" class="form-control" id="serial_number" name="serial_number" value="{{ old('serial_number',$brand->serial_number ?? $nextSerialNumber) }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Brand Image</label>
                        <div class="col-sm-9">
                        <input type="file" class="form-control" id="image" name="image">
                            @if($brand && $brand->image)
                                <div class="mt-2">
                                    <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" class="img-thumbnail" style="max-width: 150px;">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">{{ $brand ? 'Update Brand' : 'Create Brand' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>




@endsection
