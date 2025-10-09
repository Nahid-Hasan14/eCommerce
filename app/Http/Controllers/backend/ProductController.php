<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Traits\Uploder;
use App\Models\Brand;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;

class productController extends Controller
{
    use Uploder;
    /**
     * Display a listing of the resource.
     */
    public function productIndex()
    {
        $products= Product::all();
        Toastr::success('Hello World');
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
            'images'      => 'nullable|array',
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
        //upload multiple images
         if($request->images){
            foreach($request->images as $img){
                $images[] = $this->Upload($img, "products");
            }
            $product->images = implode('|', $images);
        }

        $product->save();
        // dd("Redirecting to index");

        return redirect()->route('admin.product.index')->with('success', 'product Create Successfully');

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
        // dd($product);

        session()->put('delete_image', []);
        return view('backend.product.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'description'=> 'required|string',
            'price'      => 'required|numeric',
            'stock'      => 'required|integer',
            'color'      => 'required|string',
            'size'       => 'required|string',
            'category_id'=> 'nullable|exists:categories,id',
            'brand_id'   => 'nullable|exists:brands,id',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'images'      => 'nullable|array',
            'status'     => 'nullable|in:0,1',
        ]);

        $product = Product::find($id);
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

        if(session()->has('delete_image')){
            $images = explode('|', $product->images);

            foreach(session()->get('delete_image') as $delete_image){
                if(file_exists(storage_path('app/public/' .$images[$delete_image]))){
                    unlink(storage_path('app/public/' . $images[$delete_image]));
                    unset($images[$delete_image]);
                }
            }

            $product->images = implode('|', $images);
        }
        //Update Multiple image
        $images = [];
                 //Old image string to array
        if($request->images){
            $images = explode('|', $product->images);
        }
                  //new image add
         if($request->hasFile('images')) {
            foreach($request->file('images') as $img) {
               $images[] = $this->Upload($img, "products");

            }
        }
                 //save image DB array to string
        if($images){
            $product->images = implode('|', $images);
        }

        $product->update();
        session()->forget('delete_image');
        return redirect()->route('admin.product.index');

    }

    /**
     * Remove the specified resource from DB.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect()->route('admin.product.index');
    }

    //Multiple image delete function
    // public function deleteImage($id, $index)
    public function deleteImage(Request $request)
    {
        session()->push('delete_image', $request->image_index);

        return response()->json([
            'success'     => true,
            'message'     => "Image marked for delete. when click Update then Delete. Now save session",
            'image_index' => $request->image_index
        ]);



        // $product = Product::find($id);

        // return  $product;
        // $images = explode('|', $product->images);
        // if(file_exists(storage_path('app/public/' .$images[$index]))){
        //     unlink(storage_path('app/public/' . $images[$index]));
        //     unset($images[$index]);
        // }
        // $product->images = implode('|', $images);
        // $product->save();
        // return redirect()->back();
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

        return redirect()->route('admin.product.index');
    }

    public function status($status) {

        if($status === 'active') {
            $products = Product::where('status', 1)->paginate(20);
        }  elseif ($status === 'low-stock') {
            $products = Product::where('stock', '<=', 5)->where('stock', '>', 0)->paginate(20);
        } elseif($status === 'out-of-stock') {
            $products = Product::where('stock', '=', 0)->paginate(20);
        }

        return view('backend.product.manage', compact('products', 'status'));

    }
}
