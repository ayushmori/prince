@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Main Document</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title="">                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
            <li class="breadcrumb-item">Document</li>
            <li class="breadcrumb-item active">Add New Document</li>
          </ol>
        </div>
      </div>
    </div>
  </div>


  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container mt-5">
    <h2>Add New Document</h2>
    <form action="{{ route('main-documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- <div class="form-group mb-4">
            <label for="product_id">Document Name</label>
            <select name="product_id" id="product_id" class="form-control">
                <option value="">Select Product</option>
                @foreach ($products as $Product)
                    <option value="{{ $Product->id }}"
                        {{ old('Product_id', $product->Product_id ?? '') == $Product->id ? 'selected' : '' }}>
                        {{ $Product->name }}
                    </option>
                @endforeach
            </select>
        </div> --}}

        <div class="mb-3">
            <label for="type" class="form-label">Document Name</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>

        {{-- <div class="mb-3">
            <label for="product_id" class="form-label">Product ID</label>
            <input type="number" class="form-control" id="product_id" name="product_id" required>
        </div> --}}
        {{-- <div class="mb-3">
            <label for="type" class="form-label">Document Type</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div> --}}

        <div class="document mb-3" id="document-0">
            <label for="documents[0][type]" class="form-label">Document Type</label>
            <select name="documents[0][type]" class="form-control" required>
                <option value="Software">Software</option>
                <option value="PDF">PDF</option>
                <option value="Driver">Driver</option>
            </select>
            {{-- <label for="documents[0][file_path]" class="form-label">File</label>
            <input type="file" name="documents[0][file_path]" class="form-control"> --}}
        </div>

        <!-- Category -->
        <div class="form-group mb-4">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @if ($category->children)
                        @foreach ($category->children as $childCategory)
                            @include('admin.product.partials.category-options', [
                                'category' => $childCategory,
                                'level' => 1,
                            ])
                        @endforeach
                    @endif
                @endforeach
            </select>
        </div>

        <!-- Brand -->
        <div class="form-group mb-4">
            <label for="brand_id">Brand</label>
            <select name="brand_id" id="brand_id" class="form-control">
                <option value="">Select Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}"
                        {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="file_path" class="form-label">File Path or URL</label>
            <input type="text" class="form-control" id="file_path" name="file_path" required>
        </div>

        <button type="submit" class="btn btn-primary mb-3  float-end">Add Document</button>
    </form>
</div>
</body>
</html>
@endsection
