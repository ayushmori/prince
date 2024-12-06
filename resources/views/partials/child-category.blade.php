<div class="category-item list-group-item border-0 p-2 mb-1 bg-white rounded shadow-sm" data-category-id="{{ $category->id }}">
    <div class="d-flex justify-content-between align-items-center">
        <span class="category-name" style="cursor: pointer;">{{ $category->name }}</span>
        @if ($category->children->isNotEmpty())
            <button class="btn btn-sm btn-outline-secondary toggle-children">+</button>
        @endif
    </div>
    @if ($category->children->isNotEmpty())
        <div class="child-categories mt-3 ps-3 border-start border-2" style="display: none;">
            @foreach ($category->children as $child)
                @include('partials.child-category', ['category' => $child])
            @endforeach
        </div>
    @endif
</div>
