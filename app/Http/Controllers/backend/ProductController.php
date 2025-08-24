<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Traits\Uploder;
use App\Models\Brand;
use App\Models\Category;

class productController extends Controller
{
    use Uploder;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= Product::all();
        // dd($products);
       return view('backend.product.manage', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands     = Brand::all();
        return view('backend.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'      => 'required|string|max:255',
            'description'=> 'required|string',
            'price'      => 'required|numeric',
            'stock'      => 'required|integer',
            'color'      => 'required|string',
            'size'       => 'required|string',
            'category_id'=> 'required|exists:categories,id',
            'brand_id'   => 'required|exists:brands,id',
            'image'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status'     => 'nullable|in:0,1',
        ]);

        $product = new Product();
        $product->title       = $request->title;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->stock       = $request->stock;
        $product->color       = $request->color;
        $product->size        = $request->size;
        $product->status      = $request->input('status', 1); // default Public
        $product->brand_id    = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->ip          = $request->ip();
        $product->is_deleted   = 0;
        $product->user_id     = 2;
        //image insert in Database
        if($request->hasFile('image')){
            $path = $this->Upload($request->file('image'), "products");
            $product->image = $path;
        }

        $product->save();
        // dd("Redirecting to index");

        return redirect()->route('product.index')->with('success', 'product Create Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        // dd($products);
        return view('backend.product.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

         $request->validate([
            'title'      => 'required|string|max:255',
            'description'=> 'required|string',
            'price'      => 'required|numeric',
            'stock'      => 'required|integer',
            'color'      => 'required|string',
            'size'       => 'required|string',
            'category_id'=> 'required|exists:categories,id',
            'brand_id'   => 'required|exists:brands,id',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'     => 'nullable|in:0,1',
        ]);

        $product->title       = $request->title;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->stock       = $request->stock;
        $product->color       = $request->color;
        $product->size        = $request->size;
        $product->status      = $request->input('status', 1); // default Public
        $product->brand_id    = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->ip          = $request->ip();
        $product->is_deleted   = 0;
        $product->user_id     = 2;

        if($request->hasFile('image')) {
            //Delete Old image
            $path = $this->Upload($request->file('image'), "products");
            $product->image = $path;
        }
        $product->update();

        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect()->route('product.index');
    }

    /**
     * Change the specified Status from storage.
     */
    public function changeStatus($id)
    {
        $product = Product::find($id);
        if ($product->status == 1){
            $product->status = 0;
        } else {
            $product->status = 1;
        }

        $product->save();

        return redirect()->route('product.index');
    }
}
