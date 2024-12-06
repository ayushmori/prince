<option value="{{ $category->id }}"
    @if(isset($selectedCategoryId) && $selectedCategoryId == $category->id) selected @endif>
    {{ str_repeat('-', $level * 2) . ' ' . $category->name }}
</option>

@if ($category->children && $category->children->isNotEmpty())
    @foreach ($category->children as $child)
        @include('admin.category.partials.category_option', ['category' => $child, 'level' => $level + 1])
    @endforeach
@endif
