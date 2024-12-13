<div class="category-item" data-category-id="{{ $category->id }}">
    <div class="d-flex justify-content-between align-items-center">
        <span class="category-name">{{ $category->name }}</span>
        @if ($category->children->isNotEmpty())
            <button class="toggle-children">+</button>
        @endif
    </div>
    @if ($category->children->isNotEmpty())
        <div class="child-categories" style="display: none;">
            @foreach ($category->children as $child)
                @include('partials.child-category', ['category' => $child])
            @endforeach
        </div>
    @endif
</div>

