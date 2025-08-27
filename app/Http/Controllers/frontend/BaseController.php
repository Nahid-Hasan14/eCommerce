<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index() {
        $sliders = Slider::where(['status' => 1])->get();
        return view('frontend.index', compact('sliders'));
    }

    public function about() {
        return view('frontend.pages.about');
    }

    public function contact() {
        return view('frontend.pages.contact');
    }

    public function checkout() {
        return view('frontend.pages.checkout');
    }

    public function cart() {
        return view('frontend.pages.cart');
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
