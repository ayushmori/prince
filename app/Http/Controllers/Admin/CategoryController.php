<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = Category::all(); // Fetch all categories from the database
        return view('admin.category.index', compact('categories')); // Pass categories to the view
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.category.create'); // Return the view for creating a category
    }

    // Store a newly created category in the database
    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated(); // Validate and retrieve the validated data

        // Create a new Category instance
        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];
        $category->serial_number = $validatedData['serial_number'];

        // Handle the image upload if exists
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            // Move the file to the specified path
            $path = public_path('uploads/category');
            $file->move($path, $filename);

            // Save the image path in the database
            $category->image = $filename;
        }


        // Save the new category to the database
        $category->save();

        // Redirect with a success message
        return redirect()->route('admin.categories.index')->with('message', 'Category Added Successfully');
    }

    // Show the form for editing a specific category
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category')); // Return the edit view with existing category data
    }

    // Update the specified category in the database
    public function update(Request $request, Category $category)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'serial_number' => 'required|unique:categories,serial_number,' . $category->id, // Ignore current category
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update category properties
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];
        $category->serial_number = $validatedData['serial_number'];

        // Handle the image upload if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            // Store the new image
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $path = public_path('uploads/category');
            $file->move($path, $filename);

            // Update the category's image path
            $category->image = $filename;
        }


        // Save the updated category data
        $category->save();

        // Redirect back with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');

    }

    // Delete the specified category from the database
    public function destroy(Category $category)
    {
        if (!file_exists(public_path('uploads/category'))) {
            mkdir(public_path('uploads/category'), 0777, true);
        }


        // Delete the category from the database
        $category->delete();

        // Redirect with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
