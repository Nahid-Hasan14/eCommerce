<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
// use Brian2694\Toastr\Facades\Toastr;
// use SweetAlert2\Laravel\Swal;

class BaseController extends Controller
{
    public function index() {
        $sliders = Slider::where(['status' => 1])->get();

        $products = Product::select('id', 'image', 'title', 'price', 'color')
                                    ->where('status', 1)
                                    ->take(8)
                                    ->get();

        $brands = Brand::select('id', 'image', 'name')
                                    ->where('status', 1)
                                    ->take(6)
                                    ->get();

        // Toastr::success('Hello World');
        // Swal::fire([
        //     'title' => 'Laravel + SweetAlert2 = <3',
        //     'text' => 'This is a simple alert using SweetAlert2',
        //     'icon' => 'success',
        //     'confirmButtonText' => 'Cool'
        // ]);

        return view('frontend.index', compact('sliders', 'products', 'brands'));
    }

    public function about() {
        return view('frontend.pages.about');
    }

    public function contact() {
         Toastr::success('Hello World');
        return view('frontend.pages.contact');
    }

    public function checkout() {
        return view('frontend.pages.checkout');
    }

    public function cart() {

        if(\Cart::session(1)->isEmpty()) {
            return redirect()->back();
        }

        // $cartItems = session()->get('cart', []);
        $items = \Cart::session(1)->getContent();
        $total = \Cart::session(1)->getTotal();
        $subTotal = \Cart::session(1)->getSubTotal();


        //  dd($cartItems);
        return view('frontend.pages.cart', compact('items', 'total', 'subTotal'));
    }

    public function error() {
        return view('frontend.pages.404');
    }

    public function blogs() {
        return view('frontend.pages.blogs');
    }

    public function blogDetails() {
        return view('frontend.pages.blog_details');
    }

    public function register() {
        return view('frontend.pages.register');
    }

    public function login() {
        return view('frontend.pages.login');
    }

    public function dashboard() {
        return view('frontend.pages.dashboard');
    }

    public function productDetails() {
        return view('frontend.pages.product_details');
    }

    public function products() {
        return view('frontend.pages.products');
    }

    public function wishlist() {
        return view('frontend.pages.wishlist');
    }
}
