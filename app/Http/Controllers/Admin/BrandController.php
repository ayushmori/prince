<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('serial_number', 'asc')->get();
        return view('admin.brands.index', compact('brands'));
    }

    public function form($id = null)
    {
        $existingSerialNumbers = Brand::orderBy('serial_number', 'asc')->pluck('serial_number')->toArray();

        $nextSerialNumber = $this->getNextAvailableSerialNumber($existingSerialNumbers);
        if ($nextSerialNumber === null) {
            $lastSerialNumber = Brand::max('serial_number') ?? 0;
            $nextSerialNumber = $lastSerialNumber + 1;
        }
        $brand = $id ? Brand::findOrFail($id) : null;

        return view('admin.brands.create', compact('brand', 'nextSerialNumber'));
    }

    public function save(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Accepts only image files
            'description' => 'nullable|string',
            'serial_number' => 'required|integer|unique:brands,serial_number,' . $id, // Ensure uniqueness, except for the current record (if editing)
        ]);

        $brand = $id ? Brand::findOrFail($id) : new Brand();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'brands/' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('brands'), $imagePath);
            if ($id && $brand->image) {
                File::delete(public_path('brands/' . $brand->image)); // Ensure path is correct when deleting
            }
            $brand->image = $imagePath;
        }

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->serial_number = $request->serial_number;
        $brand->save();
        $existingSerialNumbers = Brand::orderBy('serial_number', 'asc')->pluck('serial_number')->toArray();
        $nextSerialNumber = $this->getNextAvailableSerialNumber($existingSerialNumbers);
        return redirect()->route('brands.index')->with('success', $id ? 'Brand updated successfully!' : 'Brand created successfully!');
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand->image) {
            Storage::delete('public/' . $brand->image);
        }
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully!');
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
