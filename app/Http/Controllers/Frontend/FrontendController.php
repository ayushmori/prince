<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.product.show', compact('product'));
    }

    public function aboutpage()
    {
        return view('frontend.pages.about-us');
    }
    public function contactpage()
    {
        return view('frontend.pages.contact-us');
    }
    public function getChildren(Category $category)
    {
        $children = $category->children()->with('children')->get();
        return response()->json($children);
    }
    public function download()
    {
        return view('frontend.pages.download');
    }

    public function products()
    {
        // Eager load attributes and short_attributes
        $products = Product::with(['brand', 'category', 'attributes.short_attributes'])->get();

        return view('frontend.product.index', compact('products'));
    }

    public function view()
    {
        // Fetch parent categories and eager load any children using 'parentCategory'
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('frontend.category.index', compact('categories'));
    }

    public function getCategories()
    {
        // Fetch parent categories and check if they have children
        $categories = Category::whereNull('parent_id')->get();

        $categories = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'has_children' => $category->children()->exists(), // Check if the category has children
            ];
        });

        return response()->json(['categories' => $categories]);
    }

    // public function getChildren($categoryId)
    // {
    //     // Find category by ID
    //     $category = Category::find($categoryId);

    //     if (!$category) {
    //         return response()->json(['error' => 'Category not found'], 404);
    //     }

    //     // Fetch the children of the given category
    //     $children = $category->children->map(function ($child) {
    //         return [
    //             'id' => $child->id,
    //             'name' => $child->name,
    //             'has_children' => $child->children()->exists(),
    //         ];
    //     });

    //     return response()->json(['children' => $children]);
    // }

    public function index()
    {
        // Fetch parent categories with their children
        $parentCategories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.category.index', compact('parentCategories'));
    }

    public function show($id)
    {
        //     // Show category details for the frontend
        //     $category = Category::findOrFail($id);  // Find the category by ID
        //     $category = Category::with('products')->findOrFail($id);
        //     $category = Category::with(['products.brand'])->findOrFail($id);
        //     $category = Category::with(['products.mainDocuments', 'products.documents'])->findOrFail($id);
        //     // $attributes = $category->attributes()->with('shortAttributes')->get();

        //     return view('frontend.category.show', compact('category'));

        $category = Category::with([
            'products',
            'products.brand',
            'products.mainDocuments',
            'products.documents',
            'products.attributes', // Load attributes for each product
            'products.attributes.shortAttributes' // Load related shortAttributes for each attribute
        ])->findOrFail($id);

        // Pass the category to the view
        return view('frontend.category.show', compact('category'));
    }
}
