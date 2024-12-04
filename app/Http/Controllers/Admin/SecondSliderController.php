<?php

namespace App\Http\Controllers\Admin;

use App\Models\SecondSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;
use App\Models\Brand;
use App\Models\Category;

class SecondSliderController extends Controller
{
    public function index()
    {
        $secondSlider = SecondSlider::all();
        return view('admin.second-slider.index',compact('secondSlider'));
    }

    public function view()
    {
        // // Retrieve all sliders from the database
        // $sliders = SecondSlider::all();
        // $brand = Brand::all();
        // $category = Category::all();

        // // Pass the sliders data to the view
        // return view('index',compact('sliders','brand','category'));
    }




    public function create()
    {
        return view('admin.second-slider.create');
    }

    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/second-slider/', $filename);
            $validatedData['image'] = $filename;
        }


        $validatedData['status'] = $request->status == true ? '1':'0';
        SecondSlider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/secondsliders')->with('message','Slider added Successfuly');
    }


    public function edit(SecondSlider $secondSlider)
    {
        return view('admin.second-slider.edit',compact('secondSlider'));
    }
    public function update(SliderFormRequest $request, SecondSlider $secondSlider)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $destination = $secondSlider->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/second-slider/', $filename);
            $validatedData['image'] = $filename;
        }


        $validatedData['status'] = $request->status == true ? '1':'0';
        SecondSlider::where('id',$secondSlider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/secondsliders')->with('message','Slider updated Successfuly');
    }

    public function destroy(SecondSlider $secondSlider)
    {
        if ($secondSlider) {
            $destination = $secondSlider->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $secondSlider->delete();

            return redirect()->route('admin.secondsliders.index')->with('message', 'Slider deleted successfully');
        }

        return redirect()->route('admin.secondsliders.index')->with('error', 'Something went wrong');
    }

}
