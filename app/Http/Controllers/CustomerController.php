<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use App\Models\District;
use App\Models\Division;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Upazila;
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


        $data['orders'] = Order::where('customer_id', auth('customer')->id())
                            ->orderBy('id', 'desc')
                            ->paginate(4);

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

    public function cancelOrders() {

        $data['cancel_order'] = Order::where('customer_id', auth('customer')->id())
                                ->where('order_status_id', 3)
                                ->paginate(10);

        $data['orders_status'] = Order::where('customer_id', auth('customer')->id())->get();

        return view('frontend.pages.cancel_orders', compact('data'));
    }

    public function completedOrders() {

        $data['completed_order'] = Order::where('customer_id', auth('customer')->id())
                                ->where('order_status_id', 2)
                                ->paginate(10);

        // dd($data['completed_order'][0]->OrderStatus->name);

        $data['orders_status'] = Order::where('customer_id', auth('customer')->id())->get();

        return view('frontend.pages.completed_orders', compact('data'));
    }

    public function pendingOrders() {

        $data['pending_order'] = Order::where('customer_id', auth('customer')->id())
                                ->where('order_status_id', 1)
                                ->paginate(10);

        $data['orders_status'] = Order::where('customer_id', auth('customer')->id())->get();

        return view('frontend.pages.pending_orders', compact('data'));
    }

    //Order Cancel Function
    public function orderCancel($id) {
        $order = Order::where('customer_id', auth('customer')->id())
                        ->where('id', $id)
                        ->firstOrFail(); //if 2 condition not matching show 404 page

        $order->order_status_id = 3;
        $order->save();

        return redirect()->back()->with('success', "Your Order Cancel Successfilly");
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

    //For Profile page
    public function profile () {
        //For Register User Address Find
        $data['customer'] = auth('customer')->user();

        $data['addresses'] = DB::table('addresses as a')
        ->join('divisions as d', 'd.id', 'a.division')
        ->join('districts as dc', 'dc.id', 'a.district')
        ->join('upazilas as u', 'u.id', 'a.upazila')
        ->select('a.id','a.phone', 'a.address', 'd.name as division', 'dc.name as district', 'u.name as upazila', )
        ->where('a.customer_id', auth('customer')->id())->get();

        return view('frontend.pages.profile', compact('data'));
    }

    //Edit user Profile
    public function editProfileShow(){

        return view('frontend.pages.profile_edit');
    }

    public function updateProfile(Request $request){
       $customer = auth()->user();

       $check = $request->validate([
            'name'=> 'required|string|max:155',
            'email'=> 'required|email|unique:customers,email,' . $customer->id,
            'phone'=> 'nullable|string|max:15',
            'dob'  => 'nullable|date',
            'gender'=> 'nullable|string'
        ]);

        $customer->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'dob'=> $request->dob,
            'gender'=> $request->gender
        ]);
        return redirect()->route('customer.profile')->with('success', 'Youre Profile Update Successfully');
    }

    //Customer Address Edit form
    public function editAddressShow($id) {
        $address = Address::with(['divisionInfo', 'districtInfo', 'upazilaInfo'])
                        ->where('id', $id)
                        ->first();

        $divisions = Division::all();
        // dd($address);
        return view('frontend.pages.address_edit', compact('address', 'divisions'));

    }

    public function updateAddress(Request $request, $id) {
        $customer = auth('customer')->user();

        $request->validate([
            'phone' => 'nullable|string|max:15',
            'division' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'upazila' => 'nullable|string|max:255',
            'full_address'=> 'nullable|string|max:255'
        ]);

        $address = Address::where('id', $id)->where('customer_id', $customer->id)->firstOrFail();

       $address->update([
        'phone'=>$request->phone,
        'division'=>$request->division,
        'district'=>$request->district,
        'upazila'=>$request->upazila,
        'address'=>$request->full_address,
       ]);

       return redirect()->route('customer.profile')->with('success', 'Your Shipping Address Updated Successfully');
    }

    //Create New Address
    public function createAddressShow() {
        $divisions = Division::all();
        return view('frontend.pages.address_create', compact('divisions'));
    }


    public function addressStore(Request $request) {

        $customer = auth('customer')->user();

        $request->validate([
            'phone' => 'nullable|string|max:15',
            'division' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'upazila' => 'nullable|string|max:255',
            'full_address'=> 'nullable|string|max:255'
        ]);

       $address = new Address();
       $address->customer_id = $customer->id;
       $address->phone = $request->phone;
       $address->division = $request->division;
       $address->district = $request->district;
       $address->upazila = $request->upazila;
       $address->address = $request->full_address;
       $address->save();

       return redirect()->route('customer.profile')->with('success', 'Your Shipping Address Create Successfully');
    }

    public function addressDelete($id) {

        $customer = auth('customer')->user();

        $address = Address::where('id', $id)->where('customer_id', $customer->id)->firstOrFail();

        $address->delete();

        return redirect()->back()->with('success', 'Your Shipping Address Deleted Successfully');

    }

}
