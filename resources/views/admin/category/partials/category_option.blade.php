<!-- resources/views/admin/category/partials/category_option.blade.php -->

<!-- Display the category itself -->
<option value="{{ $category->id }}"
    @if (old('parent_id', $category->id) == $category->id) selected @endif>
    @php
        // Indentation for each level
        $indent = str_repeat('&nbsp;', $level * 4);
    @endphp
    {!! $indent !!}{{ $category->name }}
</option>

<!-- Recursively display child categories if they exist -->
@if ($category->children)
    @foreach ($category->children as $child)
        @include('admin.category.partials.category_option', ['category' => $child, 'level' => $level + 1])
    @endforeach
@endif


<!-- resources/views/admin/category/partials/category_option.blade.php -->

<!-- Display the category itself -->
<!-- resources/views/admin/category/partials/category_option.blade.php -->

<!-- Display the category itself -->
{{-- <option value="{{ $category->id }}"
    @if (isset($selectedParent) && $selectedParent == $category->id) selected @endif>
    @php
        // Indentation for each level
        $indent = str_repeat('&nbsp;', $level * 4);
    @endphp
    {!! $indent !!}{{ $category->name }}
</option>

<!-- Recursively display child categories if they exist -->
@if ($category->children)
    @foreach ($category->children as $child)
        @include('admin.category.partials.category_option', [
            'category' => $child,
            'level' => $level + 1,
            'selectedParent' => $selectedParent
        ])
    @endforeach
@endif --}}
