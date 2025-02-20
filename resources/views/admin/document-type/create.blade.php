@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Document Type</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                    <li class="breadcrumb-item">Document Type</li>
                    <li class="breadcrumb-item active">Create Document Type</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ $documentType ? 'Create Document Type' : 'Edit Document Type' }}
                <a href="{{ url('admin/documents-type')}}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.documents-type.save', $documentType->id ?? '') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Document Type Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $documentType->name ?? '') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Serial Number</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="serial_number" value="{{ $nextSerialNumber ?? '' }}">
                        </div>
                    </div> 


                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="description" type="text" name="description" value="{{ old('description', $documentType->description ?? '') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Document Type Image</label>
                        <div class="col-sm-9">
                        <input type="file" class="form-control" id="image" name="image">
                            @if($documentType && $documentType->image)
                                <div class="mt-2">
                                    <img src="{{ asset($documentType->image) }}" alt="{{ $documentType->name }}" class="img-thumbnail" style="max-width: 150px;">
                                </div>
                            @endif
                        </div>
                    </div>
                    


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">{{ $documentType ? 'Create Document Type' : 'Edit Document Type' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection