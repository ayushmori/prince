<?php

namespace App\Http\Controllers\Admin;

use App\Models\DocumentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentTypeController extends Controller
{
    public function create()
    {
        $nextSerialNumber = DocumentType::max('serial_number') + 1;
        $documentType = new DocumentType();
        return view('admin.document-type.create', compact('nextSerialNumber', 'documentType'));
    }

    public function form($id = null)
    {
        $existingSerialNumbers = DocumentType::orderBy('serial_number', 'asc')->pluck('serial_number')->toArray();
        $nextSerialNumber = $this->getNextAvailableSerialNumber($existingSerialNumbers);
        if ($nextSerialNumber === null) {
            $lastSerialNumber = DocumentType::max('serial_number') ?? 0;
            $nextSerialNumber = $lastSerialNumber + 1;
        }
        $documentType = $id ? DocumentType::findOrFail($id) : new DocumentType();

        return view('admin.document-type.create', compact('documentType', 'nextSerialNumber'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:document_types,name',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $documentType = new DocumentType($request->all());
        $documentType->save();

        return redirect()->route('admin.document-type.index')->with('success', 'Document Type created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:document_types,name,' . $id,
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $documentType = DocumentType::findOrFail($id);
        $documentType->update($request->all());

        return redirect()->route('admin.document-type.index')->with('success', 'Document Type updated successfully.');
    }



    // public function destroy($id)
    // {
    //     $documentType = DocumentType::findOrFail($id);
    //     if ($documentType->image) {
    //         Storage::delete('public/' . $documentType->image);
    //     }
    //     $documentType->delete();
    //     return redirect()->route('admin.document-types.index')->with('success', 'Document Type deleted successfully');
    // }


    public function destroy($id)
    {
        $documentType = DocumentType::find($id);

        if (!$documentType) {
            return redirect()->route('admin.documents-type.index')->with('error', 'Document Type not found.');
        }

        // Delete image if it exists
        if ($documentType->image) {
            $imagePath = public_path($documentType->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $documentType->delete();

        return redirect()->route('admin.documents-type.index')->with('message', 'Document Type deleted successfully.');
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
}