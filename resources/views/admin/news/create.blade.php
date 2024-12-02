@extends('layouts.admin')

@section('title', isset($news->id) ? 'Edit News' : 'Create News')

@section('content')
<div class="container mt-4">
    <h1>{{ isset($news->id) ? 'Edit News' : 'Create News' }}</h1>

    <!-- Form to create or edit news -->
    <form action="{{ isset($news->id) ? route('news.update', $news->id) : route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($news->id))
            @method('PUT')
        @endif

        <!-- Main News Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Main News</h3>
            </div>
            <div class="card-body">
                <!-- Main News Header -->
                <div class="form-group">
                    <label for="header">News Header</label>
                    <input type="text" name="header" class="form-control" value="{{ old('header', $news->header ?? '') }}" required>
                </div>

                <!-- Main News Image -->
                <div class="form-group">
                    <label for="image">Main Image</label>
                    <input type="file" name="image" class="form-control">
                    @if (isset($news->image))
                        <img src="{{ asset($news->image) }}" alt="{{ $news->header }}" class="img-thumbnail mt-2" style="width: 150px;">
                    @endif
                </div>

                <!-- Main News Description -->
                <div class="form-group">
                    <label for="description">Main Description</label>
                    <textarea name="description" class="form-control" required>{{ old('description', $news->description ?? '') }}</textarea>
                </div>

                <!-- Short Details Section -->
                <div class="short-details">
                    <h3>Short Details</h3>
                    <button type="button" class="btn btn-success mb-3" id="add-detail">+ Add Detail</button>

                    @if (isset($news->details) && $news->details->count())
                        @foreach ($news->details as $index => $detail)
                            <div class="detail-box mb-4 border p-3 rounded">
                                <input type="hidden" name="details[{{ $index }}][id]" value="{{ $detail->id }}">
                                <h4>Short Detail #{{ $index + 1 }}</h4>
                                <div class="form-group">
                                    <label for="details[{{ $index }}][short_title]">Short Title</label>
                                    <input type="text" name="details[{{ $index }}][short_title]" class="form-control" value="{{ old("details.$index.short_title", $detail->short_title) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="details[{{ $index }}][short_image]">Short Image</label>
                                    <input type="file" name="details[{{ $index }}][short_image]" class="form-control">
                                    @if ($detail->short_image)
                                        <img src="{{ asset($detail->short_image) }}" alt="{{ $detail->short_title }}" class="img-thumbnail mt-2" style="width: 100px;">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="details[{{ $index }}][short_description]">Short Description</label>
                                    <textarea name="details[{{ $index }}][short_description]" class="form-control" required>{{ old("details.$index.short_description", $detail->short_description) }}</textarea>
                                </div>

                                <button type="button" class="btn btn-danger remove-detail mt-2">Remove Detail</button>
                                <hr>
                            </div>
                        @endforeach
                    @else
                        <div class="detail-box mb-4 border p-3 rounded">
                            <h4>Short Detail</h4>
                            <div class="form-group">
                                <label for="details[0][short_title]">Short Title</label>
                                <input type="text" name="details[0][short_title]" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="details[0][short_image]">Short Image</label>
                                <input type="file" name="details[0][short_image]" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="details[0][short_description]">Short Description</label>
                                <textarea name="details[0][short_description]" class="form-control" required></textarea>
                            </div>

                            <button type="button" class="btn btn-danger remove-detail mt-2">Remove Detail</button>
                            <hr>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">{{ isset($news->id) ? 'Update' : 'Create' }} News</button>
    </form>
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
                    <div class="form-group">
                        <label for="details[${detailCount}][short_title]">Short Title</label>
                        <input type="text" name="details[${detailCount}][short_title]" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="details[${detailCount}][short_image]">Short Image</label>
                        <input type="file" name="details[${detailCount}][short_image]" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="details[${detailCount}][short_description]">Short Description</label>
                        <textarea name="details[${detailCount}][short_description]" class="form-control" required></textarea>
                    </div>

                    <button type="button" class="btn btn-danger remove-detail mt-2">Remove Detail</button>
                    <hr>
                </div>
            `;

            shortDetailsSection.insertAdjacentHTML('beforeend', newDetail);
        });

        shortDetailsSection.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-detail')) {
                e.target.closest('.detail-box').remove();

                const detailBoxes = shortDetailsSection.querySelectorAll('.detail-box');
                detailBoxes.forEach((box, index) => {
                    box.querySelector('h4').textContent = `Short Detail #${index + 1}`;
                    box.querySelectorAll('input, textarea').forEach((input) => {
                        const name = input.getAttribute('name');
                        if (name) {
                            const newName = name.replace(/\[\d+\]/, `[${index}]`);
                            input.setAttribute('name', newName);
                        }
                    });
                });
            }
        });
    });
</script>
@endsection
