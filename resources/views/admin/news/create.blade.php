@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>News</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item">News</li>
                    <li class="breadcrumb-item active">News Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>{{ isset($news->id) ? 'Edit News' : 'Create News' }}
                    <a href="{{ url('admin/news') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ isset($news->id) ? route('admin.news.update', $news->id) : route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($news->id))
                        @method('PUT')
                    @endif

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">News Header</label>
                        <div class="col-sm-9">
                            <input type="text" name="header" class="form-control" value="{{ old('header', $news->header ?? '') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Main Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control" required>{{ old('description', $news->description ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Main Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control">
                            @if (isset($news->image))
                                <img src="{{ asset($news->image) }}" alt="{{ $news->header }}" class="img-thumbnail mt-2" style="width: 150px;">
                            @endif
                        </div>
                    </div>

                    {{-- Short Details --}}
                    <div class="card-header">
                        <h3> Add Short Details
                            <button type="button" class="btn btn-success btn-sm text-white float-end" id="add-detail">+ Add Detail</button>
                        </h3>
                    </div>

                    <div class="card-body short-details">
                        @if (isset($news->details) && $news->details->count())
                            @foreach ($news->details as $index => $detail)
                                <div class="detail-box mb-4 border p-3 rounded">
                                    <input type="hidden" name="details[{{ $index }}][id]" value="{{ $detail->id }}">
                                    <h4>Short Detail #{{ $index + 1 }}</h4>

                                    <div class="mb-3 row">
                                        <label for="details[{{ $index }}][short_title]" class="col-sm-3 col-form-label">Short Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="details[{{ $index }}][short_title]" class="form-control" value="{{ old("details.$index.short_title", $detail->short_title) }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="details[{{ $index }}][short_description]" class="col-sm-3 col-form-label">Short Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="details[{{ $index }}][short_description]" class="form-control" required>{{ old("details.$index.short_description", $detail->short_description) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="details[{{ $index }}][short_image]" class="col-sm-3 col-form-label">Short Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="details[{{ $index }}][short_image]" class="form-control">
                                            @if ($detail->short_image)
                                                <img src="{{ asset($detail->short_image) }}" alt="{{ $detail->short_title }}" class="img-thumbnail mt-2" style="width: 100px;">
                                            @endif
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger remove-detail mt-2">Remove Detail</button>
                                    <hr>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">{{ isset($news->id) ? 'Update' : 'Create' }} News</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const addDetailButton = document.getElementById('add-detail');
        const shortDetailsSection = document.querySelector('.short-details');

        addDetailButton.addEventListener('click', () => {
            const detailCount = shortDetailsSection.querySelectorAll('.detail-box').length;

            const newDetail = `
                <div class="detail-box mb-4 border p-3 rounded">
                    <h4>Short Detail #${detailCount + 1}</h4>
                    <div class="mb-3 row">
                        <label for="details[${detailCount}][short_title]" class="col-sm-3 col-form-label">Short Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="details[${detailCount}][short_title]" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="details[${detailCount}][short_description]" class="col-sm-3 col-form-label">Short Description</label>
                        <div class="col-sm-9">
                            <textarea name="details[${detailCount}][short_description]" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="details[${detailCount}][short_image]" class="col-sm-3 col-form-label">Short Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="details[${detailCount}][short_image]" class="form-control">
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger remove-detail mt-2">Remove Detail</button>
                    <hr>
                </div>
            `;

            shortDetailsSection.insertAdjacentHTML('beforeend', newDetail);
        });

        shortDetailsSection.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-detail')) {
                const detailBox = e.target.closest('.detail-box');
                detailBox.remove();

                const detailBoxes = shortDetailsSection.querySelectorAll('.detail-box');
                detailBoxes.forEach((box, index) => {
                    box.querySelector('h4').textContent = `Short Detail #${index + 1}`;
                    box.querySelectorAll('input, textarea').forEach((input) => {
                        const name = input.getAttribute('name');
                        if (name) {
                            input.setAttribute('name', name.replace(/\[\d+\]/, `[${index}]`));
                        }
                    });
                });
            }
        });
    });
</script>
@endsection
