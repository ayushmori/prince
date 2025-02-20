<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DocumentTypeController extends Controller
{
    public function index()
    {
        $documenttypes = DocumentType::orderBy('serial_number', 'asc')->get();
        return view('admin.document-type.index', compact('documenttypes'));
    }

    public function form($id = null)
    {
        $existingSerialNumbers = DocumentType::orderBy('serial_number', 'asc')->pluck('serial_number')->toArray();

        $nextSerialNumber = $this->getNextAvailableSerialNumber($existingSerialNumbers);
        if ($nextSerialNumber === null) {
            $lastSerialNumber = DocumentType::max('serial_number') ?? 0;
            $nextSerialNumber = $lastSerialNumber + 1;
        }
        $documentType = $id ? DocumentType::findOrFail($id) : null;

        return view('admin.document-type.create', compact('documentType', 'nextSerialNumber'));
    }

    public function save(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|string',
            'serial_number' => 'required|integer|unique:document_types,serial_number,' . $id,
        ]);

        $brand = $id ? DocumentType::find($id) : new DocumentType();

        if (!$brand) {
            return redirect()->route('admin.document-type.index')
                ->with('error', 'DocumentType not found!');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'brands/' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!$image->move(public_path('brands'), $imagePath)) {
                return redirect()->route('admin.document-type.index')
                    ->with('error', 'Failed to upload the image. Please try again.');
            }

            if ($id && $brand->image) {
                File::delete(public_path('brands/' . $brand->image));
            }

            $brand->image = $imagePath;
        }

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->serial_number = $request->serial_number;
        $brand->save();
        $existingSerialNumbers = DocumentType::orderBy('serial_number', 'asc')->pluck('serial_number')->toArray();
        $nextSerialNumber = $this->getNextAvailableSerialNumber($existingSerialNumbers);
        return redirect()->route('admin.document-types.index')->with('message', $id ? 'DocumentType updated successfully!' : 'DocumentType created successfully!');
    }

    public function delete($id)
    {
        $brand = DocumentType::findOrFail($id);
        if ($brand->image) {
            Storage::delete('public/' . $brand->image);
        }
        $brand->delete();
        return redirect()->route('admin.document-types.index')->with('error', 'DocumentType deleted successfully!');
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
        $category = Category::findOrFail($id);
        $childCategories = Category::where('parent_id', $id)->get();
        $relatedDocumentType = DocumentType::whereIn('id', $category->products->pluck('brand_id'))->get();

        \Log::info('Related DocumentType:', $relatedDocumentType->toArray());

        return view('categories.show', [
            'category' => $category,
            'childCategories' => $childCategories,
            'relatedDocumentType' => $relatedDocumentType,
        ]);
    }

    public function filterCategories(Request $request)
    {
        $categoryIds = $request->has('categories') ? explode(',', $request->categories) : [];
        $brandIds = $request->has('brands') ? explode(',', $request->brands) : [];

        $productsQuery = Product::query();

        if (!empty($categoryIds)) {
            $productsQuery->whereIn('category_id', $categoryIds);
        }

        if (!empty($brandIds)) {
            $productsQuery->whereIn('brand_id', $brandIds);
        }

        $products = $productsQuery->get();

        \Log::info('Filtered DocumentType:', $brandIds);
        \Log::info('Products:', $products->toArray());

        return response()->json([
            'products' => $products
        ]);
    }

    public function create()
    {
        $documentType = new DocumentType();
        return view('admin.document-type.create', compact('documentType'));
    }

    public function edit($id)
    {
        $documentType = DocumentType::findOrFail($id); // Fetch the document type
        return view('admin.document-type.edit', compact('documentType'));
    }
}