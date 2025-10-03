<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders() {
        $orders = Order::with(['customer', 'orderStatus', 'paymentStatus'])
                    ->select('id', 'customer_id', 'order_number', 'total_price','payment_status_id', 'created_at', 'order_status_id')
                    ->orderBy('id', 'desc')
                    ->paginate(20);

        return view('backend.orders.orders', compact('orders'));
    }

    public function details($id) {

        $order = Order::with(['customer', 'orderDetails.product', 'orderStatus', 'paymentMethod', 'paymentStatus'])
                ->findOrFail($id);

        // dd($order->orderDetails->first()->product);

        return view('backend.orders.details', compact('order'));
    }

    public function cancel($id) {

        $orderStatus = Order::findOrFail($id);
        $orderStatus->order_status_id = 3;
        $orderStatus->save();

        return redirect()->back()->with('success', 'Order Cancelled Successfully.');
    }

    public function confirmed($id) {

        $orderStatus = Order::findOrFail($id);
        $orderStatus->order_status_id = 5;
        $orderStatus->save();

        return redirect()->back()->with('success', 'Order Confirmed Successfully.');
    }

    public function shipped($id) {

        $orderStatus = Order::findOrFail($id);
        $orderStatus->order_status_id = 4;
        $orderStatus->save();

        return redirect()->back()->with('success', 'Order Shipping Now.');
    }

    public function deliverd($id) {

        $orderStatus = Order::findOrFail($id);
        $orderStatus->order_status_id = 2;
        $orderStatus->save();

        return redirect()->back()->with('success', 'Order Deliverd Successfully.');
    }

    public function invoice() {
        return view('backend.invoice.invoice');
    }
}
