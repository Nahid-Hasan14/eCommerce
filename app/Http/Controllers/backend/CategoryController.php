<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Traits\Uploder;

class CategoryController extends Controller
{
    use Uploder;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
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

        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->input('status', 1); //default public
        $category->user_id = 1;
        $category->ip = $request->ip();

        //image insert Database
        if($request->hasFile('image')) {
            $path = $this->Upload($request->file('image'), 'categories');
            $category->image = $path;
        }
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category successfully create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        // dd($category);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        // dd($category);

        $request->validate([
           'name' => 'required|string|max:255',
           'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
           'status' => 'nullable|in:0,1',


        ]);

        $category->name = $request->name;
        $category->status = $request->input('status', 1); //default public
        $category->user_id = 1;
        $category->ip = $request->ip();

        //image insert Database
        if($request->hasFile('image')) {
            $path = $this->Upload($request->file('image'), 'categories');
            $category->image = $path;
        }
        $category->update();

        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $category = Category::find($id);

       $category->delete();
       return redirect()->route('category.index');
    }
}
