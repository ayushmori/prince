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
                        <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title=""><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg></a></li>
                        <li class="breadcrumb-item">Document</li>
                        <li class="breadcrumb-item active">Document View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- @foreach ($documents as $d)
<a href="{{ $d->file_path }}" target="_blank">pdf</a>
{{ $d->file_path }}  --}}
    {{-- @endforeach --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Document
                            <a href="{{ url('admin/main-documents/create') }}"
                                class="btn btn-danger btn-sm text-white float-end">Add</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product_id</th>
                                        <th>type</th>
                                        <th>title</th>
                                        <th>File-Path</th>
                                        <th>description</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $document)
                                        <tr>
                                            <td>{{ $document->id }}</td>
                                            <td>{{ $document->product->name }}</td>
                                            <td>{{ $document->type }}</td>
                                            <td>{{ $document->title }}</td>
                                            <td>{{ $document->file_path }}</td>
                                            <td>
                                                <p>{{ $document->description }}</p>
                                            </td>
                                            <td>{{ $document->created_at }}</td>

                                            <td>
                                                <!-- Edit Button -->
                                                <a href="{{ route('main-documents.edit', $document->id) }}" class="btn btn-success btn-sm">
                                                  Edit
                                              </a>

                                       
                                                    <!-- Delete Button (Form Approach) -->
                                                    <form
                                                        action="
                                                        {{ route('admin.main-documents.destroy', $document->id) }}
                                                         "
                                                        method="POST" style="display: inline;"
                                                        onsubmit="return confirm('Are you sure you want to delete this document?');">
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
