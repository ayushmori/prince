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

        // Check if the product has an image
        $productImage = $product->image ? asset('uploads/products/' . $product->image) : null;

        return view('frontend.product.show', compact('product', 'breadcrumb', 'productImage'));
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

        // Filter out products without images
        $products = $products->filter(function ($product) {
            return !empty($product->image);
        });

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

        // Generate breadcrumb
        $breadcrumb = $this->getBreadcrumb($category);

        if (request()->expectsJson()) {
            return response()->json(['childCategories' => $childCategories]);
        }

        return view('frontend.category.show', compact('category', 'relatedBrands', 'childCategories', 'breadcrumb'));
    }

    public function filterProducts(Request $request)
    {
        $categories = $request->input('categories');
        $brands = $request->input('brands');

        $query = Product::query();

        if ($categories) {
            $categoryIds = explode(',', $categories);
            $query->whereIn('category_id', $categoryIds);
        }

        if ($brands) {
            $brandIds = explode(',', $brands);
            $query->whereIn('brand_id', $brandIds);
        }

        $products = $query->with(['brand', 'category'])->get();

        return response()->json(['products' => $products]);
    }

    public function filterSubcategories(Request $request)
    {
        $categories = $request->input('categories');
        $brands = $request->input('brands');
        $parentId = $request->input('parent_id');

        $query = Category::query();

        if ($categories && !empty($categories)) {
            $categoryIds = explode(',', $categories);
            $query->whereIn('id', $categoryIds);
        } else if ($parentId) {
            // If no categories selected, show subcategories of current category
            $query->where('parent_id', $parentId);
        }

        if ($brands && !empty($brands)) {
            $brandIds = explode(',', $brands);
            $query->whereHas('products', function ($q) use ($brandIds) {
                $q->whereIn('brand_id', $brandIds);
            });
        }

        $subcategories = $query->get();

        return response()->json(['subcategories' => $subcategories]);
    }

    public function storeProduct(Request $request)
    {
        $product = new Product();
        // ...existing code to set other product attributes...

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Move image to public/uploads/products
            $image->move(public_path('uploads/products'), $imageName);

            // Save the image filename in the database
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('products.index');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'documents.*.type' => 'required|string',
            'documents.*.file_path' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ]);

        // Update product details
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            // Add other fields as needed
        ]);

        // Handle documents
        if ($request->has('documents')) {
            foreach ($request->input('documents') as $index => $documentData) {
                $filePath = null;

                // Check if a new file is uploaded
                if ($request->hasFile("documents.$index.file_path")) {
                    $file = $request->file("documents.$index.file_path");
                    $filePath = $file->store('documents', 'public'); // Store the file in the "public/documents" directory
                }

                // Update or create the document
                $product->documents()->updateOrCreate(
                    ['id' => $documentData['id'] ?? null], // Check if document exists
                    [
                        'type' => $documentData['type'],
                        'file_path' => $filePath ?? $documentData['file_path'], // Use existing file path if no new file is uploaded
                    ]
                );
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
}
