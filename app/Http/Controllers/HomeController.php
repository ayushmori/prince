<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::with('parentCategory')->whereNull('parent_id')->get();

        // Pass the sliders data to the view
        return view('index', compact('sliders', 'categories'));
    }
    public function show($id)
    {

        $category = Category::findOrFail($id);  // Change this line to find by ID
        return view('frontend.category.show', compact('category'));
    }
}
