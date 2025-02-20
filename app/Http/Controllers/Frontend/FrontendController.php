<?php
namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function showProduct($id)
    {
        $product = Product::with('category.parent')->findOrFail($id);
        $breadcrumb = $this->getBreadcrumb($product->category);
        $productImage = $product->image ? asset('uploads/products/' . $product->image) : asset('default-product.png');

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
        return response()->json($category->children()->with('children')->get());
    }
    public function download()
    {
        $categories = Category::whereNull('parent_id')->get();
        // $brands = Brand::all();
        $documents = Document::all(); // Fetch all documents

        return view('frontend.pages.download', compact('categories', 'documents'));
    }

    public function products()
    {
        $products = Product::with(['brand', 'category', 'attributes.short_attributes'])
            ->whereNotNull('image')
            ->get();

        return view('frontend.product.index', compact('products'));
    }

    public function view()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('frontend.category.index', compact('categories'));
    }

    public function getCategories()
    {
        $categories = Category::whereNull('parent_id')->get()->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'has_children' => $category->children()->exists(),
            ];
        });

        return response()->json(['categories' => $categories]);
    }

    public function index()
    {
        $parentCategories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.category.index', compact('parentCategories'));
    }

    public function show($id)
    {
        $category = Category::with([
            'products.brand',
            'products.mainDocuments',
            'products.documents',
            'products.attributes.shortAttributes'
        ])->findOrFail($id);

        $childCategories = Category::where('parent_id', $id)->get();
        $relatedBrands = $category->products->pluck('brand')->filter()->unique();
        $breadcrumb = $this->getBreadcrumb($category);

        if (request()->expectsJson()) {
            return response()->json(['childCategories' => $childCategories]);
        }

        return view('frontend.category.show', compact('category', 'relatedBrands', 'childCategories', 'breadcrumb'));
    }

    public function filterProducts(Request $request)
    {
        $query = Product::query();

        if ($categories = $request->input('categories')) {
            $query->whereIn('category_id', explode(',', $categories));
        }

        if ($brands = $request->input('brands')) {
            $query->whereIn('brand_id', explode(',', $brands));
        }

        return response()->json(['products' => $query->with(['brand', 'category'])->get()]);
    }

    public function filterSubcategories(Request $request)
    {
        $query = Category::query();

        if ($categories = $request->input('categories')) {
            $query->whereIn('id', explode(',', $categories));
        } elseif ($parentId = $request->input('parent_id')) {
            $query->where('parent_id', $parentId);
        }

        if ($brands = $request->input('brands')) {
            $query->whereHas('products', function ($q) use ($brands) {
                $q->whereIn('brand_id', explode(',', $brands));
            });
        }

        return response()->json(['subcategories' => $query->get()]);
    }

    public function storeProduct(Request $request)
    {
        $product = new Product();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('products.index');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'documents.*.type' => 'required|string',
            'documents.*.file_path' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ]);

        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);

        if ($request->has('documents')) {
            foreach ($request->input('documents') as $index => $documentData) {
                $filePath = null;
                if ($request->hasFile("documents.$index.file_path")) {
                    $filePath = $request->file("documents.$index.file_path")->store('documents', 'public');
                }

                $product->documents()->updateOrCreate(
                    ['id' => $documentData['id'] ?? null],
                    [
                        'type' => $documentData['type'],
                        'file_path' => $filePath ?? $documentData['file_path'],
                    ]
                );
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }




    public function getSubcategories(Request $request)
    {
        $subcategories = Category::whereIn('parent_id', $request->categories)->get();
        return response()->json($subcategories);
    }
}
