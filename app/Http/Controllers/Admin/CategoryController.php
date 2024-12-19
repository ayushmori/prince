<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{

    // app/Http/Controllers/Admin/CategoryController.php



    public function view()
    {
        $categories = Category::with('parentCategory')->whereNull('parent_id')->get();
        return view('frontend.category.index', compact('categories'));
    }

    public function getChildren($categoryId)
    {
        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $children = $category->children->map(function ($child) {
            return [
                'id' => $child->id,
                'name' => $child->name,
                'has_children' => $child->children()->exists(),
            ];
        });

        return response()->json($children);
    }





    public function index()
    {
        $parentCategories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.category.index', compact('parentCategories'));
    }



    public function show($id)
    {

        $category = Category::findOrFail($id);  // Change this line to find by ID
        return view('frontend.category.show', compact('category'));
    }



    public function create()
    {

        $parentCategories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.category.create', compact('parentCategories'));
    }

    public function store(CategoryFormRequest $request)
    {
        $validated = $request->validated();

        $category = new Category;
        $category->name = $validated['name'];
        $category->slug = Str::slug($validated['slug']);
        $category->parent_id = $validated['parent_id'];
        $category->serial_number = $validated['serial_number'] ?? null;
        $category->description = $validated['description']; // Fix: Ensure description is assigned

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $path = public_path('uploads/category');
            if (!file_exists($path)) {
                mkdir($path, 0755, true); // Create the directory if it doesn't exist
            }
            $file->move($path, $filename);
            $category->image = $filename;
        }

        $category->save();
        return redirect()->route('admin.categories.index')->with('message', 'Category added successfully!');
    }



    // Show the category editing form
    public function edit(Product $product)
{
    // Get all categories
    $categories = Category::whereNull('parent_id')->get();  // Get parent categories only
    $subcategories = [];

    // Get the subcategories for the selected category (if editing an existing product)
    if ($product->category_id) {
        $category = Category::find($product->category_id);
        $subcategories = $category ? $category->children : []; // Get subcategories (children) of the selected category
    }

    return view('admin.product.edit', compact('product', 'categories', 'subcategories'));
}





    // Update an existing category
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'serial_number' => 'required|unique:categories,serial_number,' . $category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];
        $category->serial_number = $validatedData['serial_number'];
        $category->parent_id = $validatedData['parent_id'] ?? null;

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($category->image && file_exists(public_path('uploads/category/' . $category->image))) {
                unlink(public_path('uploads/category/' . $category->image));
            }

            // Save the new image
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $path = public_path('uploads/category');
            if (!file_exists($path)) {
                mkdir($path, 0755, true); // Create directory if it doesn't exist
            }
            $file->move($path, $filename);
            $category->image = $filename;
        }

        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }


    // Delete a category
    public function destroy(Category $category)
    {
        // Delete category image if exists
        if ($category->image && file_exists(public_path('uploads/category/' . $category->image))) {
            unlink(public_path('uploads/category/' . $category->image));
        }

        // Delete the category record
        $category->delete();

        // Redirect with success message
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
