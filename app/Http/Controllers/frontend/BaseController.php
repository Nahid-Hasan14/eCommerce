<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use DB;

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

        return view('frontend.index', compact('sliders', 'products', 'brands'));
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
        //For Register User Address Find
        $data['customer'] = auth('customer')->user();


        $data['addresses'] = DB::table('addresses as a')
        ->join('divisions as d', 'd.id', 'a.division')
        ->join('districts as dc', 'dc.id', 'a.district')
        ->join('upazilas as u', 'u.id', 'a.upazila')
        ->select('a.id', 'a.phone', 'a.address', 'd.name as division', 'dc.name as district', 'u.name as upazila')
        ->where('a.customer_id', auth('customer')->id())->get();


        // dd($data);
        if(\Cart::session(1)->isEmpty()) {
            return redirect()->back();
        }

        //For Payment Methods table data find
        $data['payment_methods'] = DB::table('payment_methods')->get();

        // $cartItems = session()->get('cart', []);
        $data['items'] = \Cart::session(1)->getContent();
        $data['total'] = \Cart::session(1)->getTotal();
        $data['subTotal'] = \Cart::session(1)->getSubTotal();
        $data['division'] = DB::table('divisions')->select('id', 'name')->orderBy('name', 'asc')->get();


        //  dd($cartItems);
        return view('frontend.pages.cart', compact('data'));
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

    // public function register() {
    //     return view('frontend.pages.register');
    // }

    public function login() {
        return view('frontend.pages.login');
    }

    public function dashboard() {
        return view('frontend.pages.dashboard');
    }

    public function productDetails() {
        return view('frontend.pages.product_details');
    }

    public function thank() {
        return view('frontend.pages.thankyou_order');
    }

    public function products() {
        return view('frontend.pages.products');
    }

    public function wishlist() {
        return view('frontend.pages.wishlist');
    }
    public function getDistrict(Request $request) {
         $data['division'] = DB::table('districts')->where('division_id',$request->division_id)->select('id', 'name')->orderBy('name', 'asc')->get();
         return response()->json([
            'success'   => true,
            'status' => 'success',
            'message'   => "Successfully",
            'data'   =>  $data['division']
         ]);
    }

    public function getUpazila(Request $request) {
         $data['district'] = DB::table('upazilas')->where('district_id',$request->district_id)->select('id', 'name')->orderBy('name', 'asc')->get();
         return response()->json([
            'success'   => true,
            'status' => 'success',
            'message'   => "Successfully",
            'data'   =>  $data['district']
         ]);
    }
}
