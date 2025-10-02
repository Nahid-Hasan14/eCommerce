<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders() {
        $orders = Order::with('customer')->select('id', 'customer_id', 'order_number', 'total_price','payment_status_id', 'created_at', 'order_status_id')->get();

        return view('backend.orders.orders', compact('orders'));
    }

    public function details($id) {

        $order = Order::with(['customer', 'orderDetails.product', 'orderStatus', 'paymentMethod', 'paymentStatus'])
                ->findOrFail($id);

        // dd($order->orderDetails->first()->product);

        return view('backend.orders.details', compact('order'));
    }

    public function invoice() {
        return view('backend.invoice.invoice');
    }
}
