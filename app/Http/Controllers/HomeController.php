<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Slider;
use App\Models\Category;
use App\Models\MiniSlider;
use App\Models\SecondSlider;
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
        // Retrieve all sliders from the database
        $sliders = Slider::all();
        $brand = Brand::all();
        $category =  Category::with('parentCategory')->whereNull('parent_id')->get();;
        $categories = Category::with('parentCategory')->whereNull('parent_id')->get();
        $secondSlider = SecondSlider::all();
        $minislider = MiniSlider::all();

        // Pass the sliders data to the view
        return view('index', compact('sliders', 'brand', 'category', 'secondSlider','minislider','categories'));

    }


    public function show($id)
    {

        $category = Category::findOrFail($id);  // Change this line to find by ID
        return view('frontend.category.show', compact('category'));
    }
}
