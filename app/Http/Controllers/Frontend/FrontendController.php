<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function aboutpage(){
        return view('frontend.pages.about-us');
    }
    public function contactpage(){
        return view('frontend.pages.contact-us');
    }
    public function getChildren(Category $category)
    {
        $children = $category->children()->with('children')->get();
        return response()->json($children);
    }
    public function download(){
        return view('frontend.pages.download');
    }


}
