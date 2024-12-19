<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    public function index(Product $product)
    {
        return response()->json($product->documents);
    }

    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'type' => 'required|in:Software,PDF,Driver',
            'file_path' => 'required|string',
        ]);

        $document = $product->documents()->create($validated);
        return response()->json($document, 201);
    }

    public function show(Product $product, Document $document)
    {
        return response()->json($document);
    }

    public function update(Request $request, Product $product, Document $document)
    {
        $validated = $request->validate([
            'type' => 'sometimes|in:Software,PDF,Driver',
            'file_path' => 'sometimes|string',
        ]);

        $document->update($validated);
        return response()->json($document);
    }

    public function destroy(Product $product, Document $document)
    {
        $document->delete();
        return response()->json(null, 204);
    }
}
