{{-- resources/views/admin/categories/category_item.blade.php --}}
<tr>
    <td>{{ $category->id }}</td>
    <td>{!! str_repeat('&nbsp;', $level * 4) !!}{{ $category->name }}</td> <!-- Indented based on the level -->
    <td>{{ $category->parentCategory ? $category->parentCategory->name : 'None' }}</td>
    <td>
        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
    </td>
</tr>

@foreach ($category->children as $child)
    @include('admin.category.category_item', ['category' => $child, 'level' => $level + 1])
@endforeach
