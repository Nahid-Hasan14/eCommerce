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
        \Cart::session(122)->add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
        ));




        // $cart = session()->get('cart', []);

        // if(isset($cart[$id])) {
        //     $cart[$id]['quantity']++;
        // } else {
        //     $cart[$id] = [
        //         'id'    => $product->id,
        //         'title' => $product->title,
        //         'price' => $product->price,
        //         'quantity' => 1,
        //         'image' => $product->image

        //     ];
        // }
        // session()->put('cart', $cart);
        // return redirect()->back()->with('success', 'Product add to cart successfully');

        // view the cart items
        $items = \Cart::getContent();
        return response()->json([
            'success'   => true,
            'message'   => "Product add to cart successfully",
            'data'=>  $items,
        ]);

    }
    public function remove($id){
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', "Item Remove Successfully");
    }

    public function update(Request $request) {
        $cart = session()->get('cart', []);
        $id   = $request->productId;

        if (isset($cart[$id])) {
            if($request->action == 'increase') {
                $cart[$id]['quantity']++;
            } elseif ($request->action == 'decrease' && $cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }
        }

        session()->put('cart', $cart);

        $subtotal = $cart[$id]['price'] * $cart[$id]['quantity'];
         $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

        return response()->json([
            'success'   => true,
            'quantity'  => $cart[$id]['quantity'],
            'subtotal'  => $subtotal,
            'total'     => $total,
            'cart_count'=> count($cart)
        ]);
    }


    // function total() {

    //     $total = '0.00';
    //     if(session()->has('cart')) {
    //         $total = array_sum(array_column(session()->get('cart'), 'price'));
    //     }
    //     return $total;
    // }


}
