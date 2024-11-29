<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    
    // Show a list of categories (optional, for index)
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    // Display form to create category
    public function create()
    {
        return view('admin/category/create');
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'required|string',
            'serial_number' => 'required|unique:categories,serial_number',
        ]);

        // Handling Image Upload
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/category', $imageName);

        // Create category record
        Category::create([
            'name' => $request->name,
            'image' => $imageName,
            'description' => $request->description,
            'serial_number' => $request->serial_number,
        ]);

        return redirect()->view('admin/category/index')->with('success', 'Category created successfully');
    }
     // Show the form to edit an existing category
     public function edit($id)
     {
         $category = Category::findOrFail($id);
         return view('admin.category.edit', compact('category'));
     }
 
     // Update the specified category
     public function update(Request $request, $id)
     {
         $category = Category::findOrFail($id);
 
         $request->validate([
             'name' => 'required|string|max:255',
             'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
             'description' => 'required|string',
             'serial_number' => 'required|unique:categories,serial_number,' . $category->id,
         ]);
 
         // Update the image if a new one is uploaded
         if ($request->hasFile('image')) {
             // Delete old image from storage
             Storage::delete('public/category/' . $category->image);
 
             // Save the new image
             $imageName = time().'.'.$request->image->extension();
             $request->image->storeAs('public/category', $imageName);
             $category->image = $imageName;
         }
 
         // Update category details
         $category->update([
             'name' => $request->name,
             'description' => $request->description,
             'serial_number' => $request->serial_number,
         ]);
 
         return view('admin.category.index')->with('success', 'Category updated successfully');
     }
 
     // Delete the specified category
     public function destroy($id)
     {
         $category = Category::findOrFail($id);
 
         // Delete the image file
         Storage::delete('public/categories/' . $category->image);
 
         // Delete the category record
         $category->delete();
 
         return redirect()->view('admin.category.index')->with('success', 'Category deleted successfully');
     }

}
