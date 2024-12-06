<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MiniSlider;
use App\Models\SecondSlider;

class SliderController extends Controller
{
    public function index()
    {
        // Retrieve all sliders from the database
        $sliders = Slider::all();


        // Pass the sliders data to the view
        return view('admin.slider.index',compact('sliders'));
    }

    public function view()
    {
        // Retrieve all sliders from the database
        $sliders = Slider::all();
        $brand = Brand::all();
        $category = Category::all();
        $secondSlider = SecondSlider::all();
        $minislider = MiniSlider::all();

        // Pass the sliders data to the view
        return view('index', compact('sliders', 'brand', 'category', 'secondSlider','minislider'));

    }




    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = $filename;
        }


        $validatedData['status'] = $request->status == true ? '1':'0';
        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/sliders')->with('message','Slider added Successfuly');
    }


    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }
    public function update(SliderFormRequest $request, Slider $slider)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $destination = $slider->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = $filename;
        }


        $validatedData['status'] = $request->status == true ? '1':'0';
        Slider::where('id',$slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/sliders')->with('message','Slider updated Successfuly');
    }

    public function destroy(Slider $slider)
    {
        if ($slider) {
            $destination = $slider->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $slider->delete();

            return redirect()->route('admin.sliders.index')->with('error', 'Slider deleted successfully');
        }

        return redirect()->route('admin.sliders.index')->with('error', 'Something went wrong');
    }


}
