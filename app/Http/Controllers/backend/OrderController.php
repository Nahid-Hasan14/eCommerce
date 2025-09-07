<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders() {
        return view('backend.orders.orders');
    }

    public function details() {
        return view('backend.orders.details');
    }

    public function invoice() {
        return view('backend.invoice.invoice');
    }
}
