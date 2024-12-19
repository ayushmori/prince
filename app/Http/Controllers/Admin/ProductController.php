<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['attributes', 'documents'])->get();
        return view('admin.product.index', compact('products'));
    }

    public function create( $id = null)
    {
        $brands = Brand::all();
        $categories = Category::whereNull('parent_id')->with('children')->get();




        $existingSerialNumbers = Product::orderBy('serial_number', 'asc')->pluck('serial_number')->toArray();

        $nextSerialNumber = $this->getNextAvailableSerialNumber($existingSerialNumbers);
        if ($nextSerialNumber === null) {
            $lastSerialNumber = Product::max('serial_number') ?? 0;
            $nextSerialNumber = $lastSerialNumber + 1;
        }
        $products = $id ? Product::findOrFail($id) : null;

        return view('admin.product.create', compact('brands', 'categories', 'nextSerialNumber'));
    }

    public function getSubcategories($categoryId)
    {
        $category = Category::with('children')->findOrFail($categoryId);

        return response()->json([
            'subcategories' => $category->children,
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:categories,id',
            'serial_number' => 'required|unique:products,serial_number',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'attributes' => 'nullable|array',
            'attributes.*.title' => 'nullable|string|max:255',
            'attributes.*.description' => 'nullable|string',
            'documents' => 'nullable|array',
            'documents.*.file_path' => 'nullable|file|mimes:pdf,doc,docx,zip|max:10240',
            'serial_number' =>'required|unique:products,serial_number', // Add serial_number here
        ]);

        // Create the product
        $product = Product::create([
            'name' => $validated['name'],
            'brand_id' => $validated['brand_id'],
            'category_id' => $validated['category_id'],
            'subcategory_id' => $validated['subcategory_id'],
            'serial_number' => $validated['serial_number'],
            'description' => $validated['description'] ?? null,
        ]);

        // Handle images
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('product_images'), $imageName);
                $images[] = 'product_images/' . $imageName;
            }
            $product->images = json_encode($images);
            $product->save();
        }

        if (isset($validated['attributes']) && !empty($validated['attributes'])) {
            foreach ($validated['attributes'] as $attribute) {
                if (!empty($attribute['title']) && !empty($attribute['description'])) {
                    $product->attributes()->create([
                        'title' => $attribute['title'],
                        'description' => $attribute['description'],
                    ]);
                }
            }
        }


        // Handle documents
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $index => $document) {
                $fileName = time() . '-' . $document->getClientOriginalName();
                $document->move(public_path('product_documents'), $fileName);
                $type = $request->input("documents.{$index}.type", 'PDF');
                $product->documents()->create([
                    'file_path' => 'product_documents/' . $fileName,
                    'type' => $type,
                ]);
            }
        }


        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $product = Product::with('attributes', 'documents')->find($id);
        $brands = Brand::all();
        $categories = Category::whereNull('parent_id')->with('children')->get();




        $existingSerialNumbers = Product::orderBy('serial_number', 'asc')->pluck('serial_number')->toArray();

        $nextSerialNumber = $this->getNextAvailableSerialNumber($existingSerialNumbers);
        if ($nextSerialNumber === null) {
            $lastSerialNumber = Product::max('serial_number') ?? 0;
            $nextSerialNumber = $lastSerialNumber + 1;
        }
        $products = $id ? Product::findOrFail($id) : null;

        return view('admin.product.edit', compact('product', 'brands', 'categories','nextSerialNumber'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:categories,id',
            'serial_number' => "required|unique:products,serial_number,{$id}",
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'attributes' => 'nullable|array',
            'attributes.*.title' => 'nullable|string|max:255',
            'attributes.*.description' => 'nullable|string',
            'documents' => 'nullable|array',
            'documents.*.file_path' => 'nullable|file|mimes:pdf,doc,docx,zip|max:10240',
        ]);

        // Find the product
        $product = Product::findOrFail($id);

        // Update the product
        $product->update([
            'name' => $validated['name'],
            'brand_id' => $validated['brand_id'],
            'category_id' => $validated['category_id'],
            'subcategory_id' => $validated['subcategory_id'],
            'serial_number' => $validated['serial_number'],
            'description' => $validated['description'] ?? null,
        ]);

        // Handle documents
        if ($request->hasFile('documents')) {
            // Delete old documents if needed
            foreach ($product->documents as $document) {
                if (file_exists(public_path($document->file_path))) {
                    unlink(public_path($document->file_path));
                }
                $document->delete();
            }

            // Save new documents
            foreach ($request->file('documents') as $index => $documentFile) {
                $fileName = time() . '-' . $documentFile->getClientOriginalName();
                $documentFile->move(public_path('product_documents'), $fileName);

                $type = $request->input("documents.{$index}.type", 'PDF');
                $product->documents()->create([
                    'file_path' => 'product_documents/' . $fileName,
                    'type' => $type,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    protected function getNextAvailableSerialNumber(array $existingSerialNumbers)
    {
        $nextSerialNumber = null;
        $expected = 1;
        foreach ($existingSerialNumbers as $serialNumber) {
            if ($serialNumber != $expected) {
                $nextSerialNumber = $expected;
                break;
            }
            $expected++;
        }

        return $nextSerialNumber;
    }

    public function show($id)
{
    $product = Product::with(['attributes', 'documents'])->findOrFail($id);
    return view('admin.product.show', compact('product'));
}
}
