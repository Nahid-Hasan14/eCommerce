<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmationMail;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request){

        $id = $request->productId;
        $product = Product::find($id);


        // add the product to cart
        \Cart::session(1)->add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array('image' => $product->image),
        ));

        // view the cart items
        $items = \Cart::session(1)->getContent();

        $miniCart = view('frontend.layouts.minicart', compact('items'))->render();


        return response()->json([
            'success'   => true,
            'status' => 'success',
            'message'   => "Product add to cart successfully",
            'total'=>  number_format(\Cart::getTotal()),
            'cart_count'=> \Cart::session(1)->getContent()->count(),
            'data'=>  $items,
            'minicart' => $miniCart
        ]);

    }
    public function remove(Request $request){

        $id = $request->productId;
        $cart = \Cart::session(1)->remove($id);
        $items = \Cart::session(1)->getContent();
        $total = \Cart::getTotal();

        $miniCart = view('frontend.layouts.minicart', compact('items'))->render();

        return response()->json([
            'success'   => true,
            'status'    => 'success',
            'message'   => "Product Removed Successfully",
            'id'        => $id,
            'total'     => number_format($total),
            'cart_count'=>  count($items),
            'minicart' => $miniCart
        ]);
    }

    public function update(Request $request) {
        $id = $request->productId;

            if($request->action == 'increase') {
                \Cart::session(1)->update($id, ['quantity' => 1]);
            } elseif ($request->action == 'decrease') {
                \Cart::session(1)->update($id, ['quantity' => -1]);
            }

        $item = \Cart::session(1)->get($id);
        // dd($item);
        $subtotal = $item->getPriceSum();
        $total = \Cart::getTotal();
        $count = \Cart::getTotalQuantity();

        return response()->json([
            'success'   => true,
            'quantity'  => $item->quantity,
            'subtotal'  => number_format($subtotal),
            'total'     => number_format($total),
            'cart_count'=> $count
        ]);
    }

    // Check out Controlle

    public function checkout (Request $request) {

        $customer = auth()->guard('customer')->user();

        $shipping_id = $request->shipping_address;

        if(!$request->shipping_address) {

            $request->validate([
                'payment_method'     => 'required|integer',
                'payment_transaction_id' => 'required_unless:payment_method,1|nullable',
                'shipping_address'   => 'nullable|integer',

                'phone'   => 'required|string|max:15',
                'division'=> 'required',
                'district'=> 'required',
                'upazila' =>'required',
                'address' => 'required|string|max:255'
            ],[
                'payment_transaction_id.required_unless'=> "Transection Id is Required"
            ]);

            $address = new Address();
            $address->customer_id = $customer->id;
            $address->phone       = $request->phone;
            $address->division    = $request->division;
            $address->district    = $request->district;
            $address->upazila     = $request->upazila;
            $address->address     = $request->address;
            $address->save();
           $shipping_id  =  $address->id;
        }
        if($shipping_id) {
            $data['shipping_address'] = DB::table('addresses as a')
            ->join('divisions as d', 'd.id', 'a.division')
            ->join('districts as dc', 'dc.id', 'a.district')
            ->join('upazilas as u', 'u.id', 'a.upazila')
            ->select('a.id', 'a.phone', 'a.address', 'd.name as division', 'dc.name as district', 'u.name as upazila')
            ->where(['a.customer_id'=>auth('customer')->id(),'a.id'=>$shipping_id ])->first();
        }

        $cart = \Cart::session(1)->getContent();
        $totalPrice = \Cart::session(1)->getTotal();
        $orderId = $customer->id.time(); //create Order ID

        //Order Create
        $order = Order::create([
            'customer_id' => $customer->id,
            'shipping_address' => implode('|', (array) $data['shipping_address']),
            'order_number'      => $orderId,
            'total_price'       => $totalPrice,
            'order_status_id'   => 1, //default pendding
            'payment_method_id' => $request->payment_method,
            'payment_status_id' => $request->payment_method == 1 ? 2 : 3  //2=Unpaid, 3=Pending
        ]);
        foreach($cart as $item){
            $product = Product::find($item['id']);
            OrderDetail::create([
                'order_id'        => $order->id,
                'payment_transaction_id'=> $request->payment_method == 1 ? null : $request->payment_transaction_id,
                'product_id'      => $item['id'],
                'quantity'        => $item['quantity'],
                'price'           => $item['price'],
                'total'           => $item['price'] * $item['quantity']
            ]);
            $product->stock -= $item['quantity'];
            $product->save();
        }

    if($order) {

        \Cart::session(1)->clear();
        Mail::to($customer->email)->send(new OrderConfirmationMail($order));

        //Ajax  JSON response for thank you page
        return response()->json([
            'success' => 201,
            'status' => 'success',
            'message' => 'Your order has been placed successfully!',
            'order_no'=> $order->order_number
        ]);
    }

        return response()->json([
            'status'  => 'error',
            'message' => 'Something went wrong, please try again.'
        ], 500);
    }

}
