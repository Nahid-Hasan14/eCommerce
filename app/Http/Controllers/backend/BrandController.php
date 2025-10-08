<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

use App\Http\Traits\Uploder;

class BrandController extends Controller
{
    use Uploder;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brand.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
           'name' => 'required|string|max:255',
           'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
           'status' => 'nullable|in:0,1',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->status = $request->input('status', 1); //default public
        $brand->user_id = 1;
        $brand->ip = $request->ip();

        //image insert Database
        if($request->hasFile('image')) {
            $path = $this->Upload($request->file('image'), 'categories');
            $brand->image = $path;
        }
        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'brand successfully create');
    }

    /**
     * Display the specified resource.
     */
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        // dd($brand);
        return view('backend.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        // dd($brand);

        $request->validate([
           'name' => 'required|string|max:255',
           'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
           'status' => 'nullable|in:0,1',


        ]);

        $brand->name = $request->name;
        $brand->status = $request->input('status', 1); //default public
        $brand->user_id = 1;
        $brand->ip = $request->ip();

        //image insert Database
        if($request->hasFile('image')) {
            $path = $this->Upload($request->file('image'), 'categories');
            $brand->image = $path;
        }
        $brand->update();

        return redirect()->route('admin.brand.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $brand = Brand::find($id);

       $brand->delete();
       return redirect()->route('admin.brand.index');
    }
    /**
     * Change Status.
     */
    public function changeStatus($id)
    {
       $brand = Brand::find($id);
        if($brand->status == 1) {
            $brand->status = 0;
        } else {
            $brand->status = 1;
        }
       $brand->save();
       return redirect()->route('admin.brand.index');
    }
}
