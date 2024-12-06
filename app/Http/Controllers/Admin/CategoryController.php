<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    // View all categories (root categories)
    public function view()
    {
        // Fetch root categories (categories with no parent)
        $categories = Category::with('parentCategory')->whereNull('parent_id')->get();
        return view('frontend.category.index', compact('categories'));
    }

    // Get child categories for a parent
    public function getChildren(Category $category)
{
    $children = $category->children()->with('children')->get();
    return response()->json($children);
}


    // In your CategoryController
    public function index()
    {
        $parentCategories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.category.index', compact('parentCategories'));
    }


    // Show a specific category by slug
    public function show($id)
    {
        // Fetch the category by its ID or slug
        $category = Category::findOrFail($id);  // Change this line to find by ID
        return view('frontend.category.show', compact('category'));
    }


    // Show the category creation form
    public function create()
    {
        // Fetch parent categories (no parent_id)
        $parentCategories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.category.create', compact('parentCategories'));
    }

    // Store a newly created category
    public function store(CategoryFormRequest $request)
    {
        $validated = $request->validated();

        $category = new Category;
        $category->name = $validated['name'];
        $category->slug = Str::slug($validated['slug']); // Ensure the slug is formatted correctly
        $category->parent_id = $validated['parent_id'];
        $category->serial_number = $validated['serial_number'] ?? null;
        $category->description = $validated['description']; // Fix: Ensure description is assigned

        if ($request->hasFile('image')) {
            // Save the uploaded image
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
    public function edit(Category $category)
    {
        $parentCategories = Category::with('children')->whereNull('parent_id')->get();


        if ($parentCategories->isEmpty()) {
            // Handle case where no parent categories are found
            return redirect()->route('admin.categories.index')->with('error', 'No parent categories found.');
        }
        // return dd($parentCategories->toArray());

        return view('admin.category.edit', compact('category', 'parentCategories'));
    }


    // Update an existing category
    public function update(CategoryFormRequest $request, Category $category)
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

        // Redirect back with a success message
        return redirect()->route('admin.categories.index')->with('message', 'Category updated successfully.');

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

        // Redirect with a success message
        return redirect()->route('admin.categories.index')->with('error', 'Category deleted successfully.');
    }
}
