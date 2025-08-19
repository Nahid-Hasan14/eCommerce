<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders= Slider::all();
        // dd($slider);
       return view('backend.slider.manage', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|string|max:255',
            'description'=> 'required|string|',
            'image'=> 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status'=> 'nullable|in:0,1',
        ]);


        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->status = $request->input('status', 1); // default Public
        $slider->user_id = 2;
        $slider->ip = $request->ip();
        //image insert in Database
        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->storeAs('sliders', $image->getClientOriginalName(), 'public');
            $slider->image = $path;
        }

        $slider->save();
        // dd("Redirecting to index");

        return redirect()->route('slider.index')->with('success', 'Slider Create Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        // dd($sliders);
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

         $request->validate([
            'title'=> 'required|string|max:255',
            'description'=> 'required|string|',
            'image'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'=> 'nullable|in:0,1',
        ]);

        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->status = $request->input('status', 1);
        $slider->user_id = 3;
        $slider->ip = $request->ip();

        if($request->hasFile('image')) {
            //Delete Old image
            if($slider->image && file_exists(storage_path('app/public/' . $slider->image))){
                unlink(storage_path('app/public/' . $slider->image));
            }
            $image = $request->file('image');
            $path = $image->storeAs('sliders', $image->getClientOriginalName(), 'public');
            $slider->image = $path;
        }
        $slider->update();

        return redirect()->route('slider.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        $slider->delete();
        return redirect()->route('slider.index');
    }
}
