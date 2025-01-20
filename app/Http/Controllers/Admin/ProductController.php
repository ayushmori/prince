<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Models\ShortAttribute;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    
    public function index()
    {
        $products = Product::with(['attributes', 'documents'])->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create($id = null)
    {
        $brands = Brand::all();

        // Fetch top-level categories and their children recursively
        $categories = Category::whereNull('parent_id')->with('children')->get();

        // Get existing serial numbers
        $existingSerialNumbers = Product::orderBy('serial_number', 'asc')->pluck('serial_number')->toArray();

        // Determine the next available serial number
        $nextSerialNumber = $this->getNextAvailableSerialNumber($existingSerialNumbers);
        if ($nextSerialNumber === null) {
            $lastSerialNumber = Product::max('serial_number') ?? 0;
            $nextSerialNumber = $lastSerialNumber + 1;
        }

        // Retrieve the product for editing if an ID is provided
        $product = $id ? Product::findOrFail($id) : null;

        return view('admin.product.create', compact('brands', 'categories', 'nextSerialNumber', 'product'));
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
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'serial_number' => 'required|unique:products,serial_number',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'attributes' => 'nullable|array',
            'attributes.*.title' => 'nullable|string|max:255',
            'attributes.*.description' => 'nullable|string',
            'attributes.*.short_attributes' => 'nullable|array',
            'attributes.*.short_attributes.*.key' => 'nullable|string|max:255',
            'attributes.*.short_attributes.*.value' => 'nullable|string|max:255',
            'documents' => 'nullable|array',
            'documents.*.file_path' => 'nullable|file|mimes:pdf,doc,docx,zip|max:10240',
            'documents.*.type' => 'nullable|string|max:255',
        ]);

        // Create the product
        $product = Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'brand_id' => $validated['brand_id'],
            'category_id' => $validated['category_id'],
            'serial_number' => $validated['serial_number'],
            'description' => $validated['description'] ?? null,
        ]);

        // Handle images (if any)
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

        // Handle attributes and short attributes
        if (isset($validated['attributes']) && !empty($validated['attributes'])) {
            foreach ($validated['attributes'] as $attribute) {
                if (!empty($attribute['title']) && !empty($attribute['description'])) {
                    // Save the attribute
                    $createdAttribute = $product->attributes()->create([
                        'title' => $attribute['title'],
                        'description' => $attribute['description'],
                    ]);

                    // Save short attributes for this attribute
                    if (isset($attribute['short_attributes']) && !empty($attribute['short_attributes'])) {
                        foreach ($attribute['short_attributes'] as $shortAttribute) {
                            if (!empty($shortAttribute['key']) && !empty($shortAttribute['value'])) {
                                $createdAttribute->shortAttributes()->create([
                                    'key' => $shortAttribute['key'],
                                    'value' => $shortAttribute['value'],
                                ]);
                            }
                        }
                    }
                }
            }
        }

        // Handle documents (if any)
        if (isset($validated['documents']) && !empty($validated['documents'])) {
            foreach ($validated['documents'] as $document) {
                $documentPath = null;
                if (isset($document['file_path']) && $document['file_path']) {
                    $file = $document['file_path'];
                    $documentPath = 'documents/' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('documents'), $documentPath);
                }

                Document::create([
                    'product_id' => $product->id,
                    'file_path' => $documentPath,
                    'type' => $document['type'],
                ]);
            }
        }

        // Return response
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }


    public function edit($id)
    {
        $product = Product::with('attributes', 'documents')->find($id);
        $brands = Brand::all();
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $short = ShortAttribute::all();

        $existingSerialNumbers = Product::orderBy('serial_number', 'asc')->pluck('serial_number')->toArray();

        $nextSerialNumber = $this->getNextAvailableSerialNumber($existingSerialNumbers);
        if ($nextSerialNumber === null) {
            $lastSerialNumber = Product::max('serial_number') ?? 0;
            $nextSerialNumber = $lastSerialNumber + 1;
        }

        return view('admin.product.edit', compact('product', 'brands', 'categories', 'nextSerialNumber', 'short'));
    }


    public function update(Request $request, $id)
    {
        // Find the product
        $product = Product::findOrFail($id);

        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'serial_number' => 'required|unique:products,serial_number,' . $id,
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'attributes' => 'nullable|array',
            'attributes.*.title' => 'nullable|string|max:255',
            'attributes.*.description' => 'nullable|string',
            'attributes.*.short_attributes' => 'nullable|array',
            'attributes.*.short_attributes.*.id' => 'integer',
            'attributes.*.short_attributes.*.key' => 'nullable|string|max:255',
            'attributes.*.short_attributes.*.value' => 'nullable|string|max:255',
            // 'attributes.*.id' => 'integer',
            'documents' => 'nullable|array',
            'documents.*.file_path' => 'nullable|file|mimes:pdf,doc,docx,zip|max:10240',
            'documents.*.type' => 'nullable|string|max:255',
            'documents.*.existing_file' => 'nullable|string',
            'documents.*.id' => 'integer',
        ]);

        // Update the product details
        $product->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'brand_id' => $validated['brand_id'],
            'category_id' => $validated['category_id'],
            'serial_number' => $validated['serial_number'],
            'description' => $validated['description'] ?? $product->description,
        ]);

        // Handle images (similar to before)
        if ($request->hasFile('images')) {
            $newImages = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('product_images'), $imageName);
                $newImages[] = 'product_images/' . $imageName;
            }
            $existingImages = json_decode($product->images ?? '[]');
            $product->images = json_encode(array_merge($existingImages, $newImages));
            $product->save();
        }

        // Handle attributes and short attributes
        if (isset($validated['attributes']) && !empty($validated['attributes'])) {
            foreach ($validated['attributes'] as $attribute) {
                // Check if the title and description are provided for the attribute
                if (!empty($attribute['title']) && !empty($attribute['description'])) {
                    // Find the existing attribute by title or create a new one
                    $createdAttribute = $product->attributes()->updateOrCreate(
                        [
                            'title' => $attribute['title'],
                        ],
                        [
                            'description' => $attribute['description'],
                        ]
                    );

                    if (isset($attribute['short_attributes']) && !empty($attribute['short_attributes'])) {
                        foreach ($attribute['short_attributes'] as $shortAttribute) {
                            if (!empty($shortAttribute['key']) && !empty($shortAttribute['value'])) {
                                // Ensure we include the ID to uniquely identify the record if it exists
                                $createdAttribute->shortAttributes()->updateOrCreate(
                                    [
                                        'id' => $shortAttribute['id'] ?? null, // Match on the ID if provided
                                    ],
                                    [
                                        'key' => $shortAttribute['key'],
                                        'value' => $shortAttribute['value'],
                                    ]
                                );
                            }
                        }
                    }
                }
            }
        }






        foreach ($validated['documents'] as $detail) {
            // Check if the document already exists in the database
            if (isset($detail['id'])) {
                $document = Document::find($detail['id']);
                if ($document) {
                    $shortImagePath = $document->file_path;  // Preserve the existing file path

                    // Check if a new file is uploaded
                    if (isset($detail['file_path']) && $detail['file_path'] instanceof \Illuminate\Http\UploadedFile) {
                        // Remove the old file from storage if it exists
                        $existingFilePath = public_path('storage/' . $document->file_path);
                        if (file_exists($existingFilePath)) {
                            unlink($existingFilePath);  // Delete the old file
                        }

                        // Upload the new file and get its path
                        $shortImage = $detail['file_path'];
                        $shortImagePath = 'documents/' . uniqid() . '.' . $shortImage->getClientOriginalExtension();
                        $shortImage->move(public_path('documents'), $shortImagePath);
                    }

                    // Update the document entry with the new file path
                    $document->update([
                        'file_path' => $shortImagePath,
                        'type' => $detail['type'] ?? $document->type,  // Preserve the type if not provided
                    ]);
                }
            }
        }



        // return dd($existingAttribute);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }







    public function destroy(Product $product)
    {
        // Delete product and its associated files
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
