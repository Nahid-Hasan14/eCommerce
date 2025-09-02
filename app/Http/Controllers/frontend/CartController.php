<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
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
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:15',
            'division'=> 'required|string|',
            'district'=> 'required|string|',
            'thana'   => 'required|string|',
            'address' => 'required|string|max:255',
        ]);
       
    }

}
