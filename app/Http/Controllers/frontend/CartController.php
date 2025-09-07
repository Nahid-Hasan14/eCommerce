<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
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
        $id   = $request->productId;

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

    public function address (Request $request) {
        // dd($request);
        $request->validate([
            'phone'   => 'required|string|max:15',
            'division'=> 'required|string|',
            'district'=> 'required|string|',
            'thana'   => 'required|string|',
            'address' => 'required|string|max:255',
        ]);

        $userId = 1;

        $address = new Address();
        $address->user_id  = $userId;
        $address->phone    = $request->phone;
        $address->division = $request->division;
        $address->district = $request->district;
        $address->thana    = $request->thana;
        $address->address  = $request->address;
        $address->save();

        $cart = \Cart::session(1)->getContent();
        // dd($cart);

        $totalPrice = 0;
            foreach($cart as $item){
            $totalPrice += ($item['price'] * $item['quantity']);
        }

        $orderId = time();
        //Order Create
        $order = Order::create([
            'user_id' => $userId,
            'shipping_address' => $address,
            'order_number'      => $orderId,
            'total_price'       => $totalPrice,
            'order_status_id'   => 1,
            'payment_method_id' => 1,
            'payment_status_id' => 0,
        ]);
        foreach($cart as $item){
        OrderDetails::create([
            'order_id'        => $order->id,
            'product_id'      => $item['id'],
            'quantity'        => $item['quantity'],
            'price'           => $item['price'],
            'total'           => $item['price'] * $item['quantity']
        ]);
    }


        return redirect()->back();

    }

}
