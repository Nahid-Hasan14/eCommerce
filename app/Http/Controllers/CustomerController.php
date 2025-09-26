<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data['orders'] = DB::table('orders as o')->where('customer_id', auth('customer')->id())
        // ->join('order_details as od', 'o.id', 'od.order_id')
        // ->join('products as p', 'od.product_id', 'p.id')
        // ->join('order_statuses as os', 'od.status', 'os.id')
        // ->select('p.title', 'p.image', 'o.order_number', 'od.price', 'os.name as status','o.created_at', 'o.shipping_address', 'od.quantity')
        // ->get();


        $data['orders'] = Order::where('customer_id', auth('customer')->id())->paginate(4);
        $data['orders_status'] = Order::where('customer_id', auth('customer')->id())->get();



        // dd($data['orders_status']);

        // $data['orders']->map(function($order){
        //     if($order->shipping_address){
        //         $parts = explode('|', $order->shipping_address);
        //         $order->address_id = $parts[0] ?? null;
        //         $order->phone      = $parts[1] ?? null;
        //         $order->address    = $parts[2] ?? null;
        //         $order->division   = $parts[3] ?? null;
        //         $order->district   = $parts[4] ?? null;
        //         $order->upazila    = $parts[5] ?? null;
        //     }
        //     return $order;
        // });

        // dd($data);
        // dd($data['orders']->where('status', 'Pending')->count());
        return view('frontend.pages.dashboard', compact('data'));
    }


    public function OrderDetails(Request $request){

        $orderNumber = $request->buttonOrderNumber;

        $data['order'] = Order::where('order_number', $orderNumber)
        ->where('customer_id', auth('customer')->id())
        ->first();


        if(!$data['order']) {
            return response()->json([
                'success' => false,
                'message' => "Order Not Found"
            ]);
        }

        $data['order_details'] = OrderDetail::where('order_id',  $data['order']->id)
        ->with(['product', 'orderStatus'])
        ->get();

        // return $data;


        $html = view('frontend.layouts.order_details', compact('data'))->render();

        return response()->json([
            'success'   => true,
            'status' => 'success',
            'message'   => "Request response successfull",
            'html' => $html
        ]);

    }

    public function changePasswordShow() {
        return view('customer.change_password');
    }


    public function changePassword(Request $request) {
        $request->validate([
            'old_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8|confirmed'
        ]);

        /** @var Customer $customer */
        $customer = auth('customer')->user();

        if(Hash::check($request->old_password, $customer->password)){

          $customer->password = Hash::make($request->new_password);   //form new password

          $customer->save();

          return redirect()->route('customer.dashboard')->with('success', 'Youre password changed successfully');
        } else {

            return redirect()->back()->withErrors(['old_password' => 'Old password does not match.']);
        }

    }

}
