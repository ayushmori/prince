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
        $product = Product::with('category')->findOrFail($id);
        $breadcrumb = $this->getBreadcrumb($product->category);

        return view('frontend.product.show', compact('product', 'breadcrumb'));
    }

    private function getBreadcrumb($category)
    {
        $breadcrumb = [];
        while ($category) {
            array_unshift($breadcrumb, $category);
            $category = $category->parent;
        }
        return $breadcrumb;
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

    public function index()
    {
        // Fetch parent categories with their children
        $parentCategories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.category.index', compact('parentCategories'));
    }

    public function show($id)
    {
        $category = Category::with([
            'products.brand',
            'products.mainDocuments',
            'products.documents',
            'products.attributes',
            'products.attributes.shortAttributes'
        ])->findOrFail($id);

        // Get categories with parent_id equal to the current category's ID
        $childCategories = Category::where('parent_id', $id)->get();

        // Get unique brands from the current category's products
        $relatedBrands = $category->products->pluck('brand')->filter()->unique();

        return view('frontend.category.show', compact('category', 'relatedBrands', 'childCategories'));
    }
}
