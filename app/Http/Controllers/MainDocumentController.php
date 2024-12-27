<?php

namespace App\Http\Controllers;

use App\Models\MainDocument;
use App\Models\Product;
use Illuminate\Http\Request;

class MainDocumentController extends Controller
{
    /**
     * Display a listing of the documents.
     */

     public function create()
    {
        $products = \App\Models\Product::all(); // Fetch all products
        return view('admin.document.create', compact('products'));
    }

    public function edit($id)
    {
        // Your logic to fetch the document by ID and return the edit view
        $document = MainDocument::findOrFail($id);
        return view('admin.document.edit', compact('document'));
    }
    
    public function index()
    {
        $documents = MainDocument::get()->all();
        $products = Product::get()->all();
        return view('admin.document.index', compact('documents','products'));
    }

    /**
     * Store a newly created document in storage.
     */ 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|string',    
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'file_path' => 'required|exists:products,id',
        ]);
    
     
    
        $document = MainDocument::create($validatedData);
    
        return redirect()->route('main-documents.create')
            ->with('success', 'Document added successfully!');
    }
    
    /**
     * Display the specified document.
     */
    public function show($id)
    {
        $document = MainDocument::findOrFail($id);
        return response()->json($document);
    }

    /**
     * Update the specified document in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // 'product_id' => 'required|exists:products,id',
            'type' => 'nullable|string',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'file_path' => 'required|string',
        ]);
        // dd($validatedData);

        $document = MainDocument::findOrFail($id);
        $document->update($validatedData);

        return  redirect('admin/main-documents')->with('success', 'Document updated successfully!');
        // return redirect()->url('admin.document.index')
        // ->with('success', 'Document updated successfully!');
    
    }

    /**
     * Remove the specified document from storage.
     */
    public function destroy($id)
    {
        $document = MainDocument::findOrFail($id);
        $document->delete();
    
        return  redirect('admin/main-documents')->with('success', 'Document updated successfully!');

    }
    
}
