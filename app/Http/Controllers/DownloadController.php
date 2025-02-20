<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function downloadPage()
    {
        $categories = Category::whereNull('parent_id')->get();
        $subcategories = Category::whereNotNull('parent_id')->get();
        // $brands = Brand::all();
        $documents = Document::all(); // Fetch all documents

        return view('frontend.pages.download', compact('categories', 'subcategories', 'documents'));
    }
}
