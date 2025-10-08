<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $data['orders'] = Order::selectRaw("
        COUNT(*) as totalOrders,
        SUM(CASE WHEN order_status_id = 1 THEN 1 ELSE 0 END) as pendingOrders,
        SUM(CASE WHEN order_status_id = 2 THEN 1 ELSE 0 END) as completedOrders,
        SUM(CASE WHEN order_status_id = 3 THEN 1 ELSE 0 END) as canceledOrders,
        SUM(CASE WHEN order_status_id = 2 THEN total_price ELSE 0 END) as total_price,
        SUM(CASE WHEN DATE(created_at) = CURDATE() THEN 1 ELSE 0 END) as todayOrders,
        SUM(CASE WHEN DATE(created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) THEN 1 ELSE 0 END) as yesterdayOrders
        ")->first();

        $data['customers'] = Customer::count();

        $data['products'] = Product::selectRaw("
            COUNT(*) as totalProducts,
            SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as activeProducts,
            SUM(CASE WHEN stock <= 5 AND stock > 0 THEN 1 ELSE 0 END) as lowStockProducts,
            SUM(CASE WHEN stock = 0 THEN 1 ELSE 0 END) as outOfStockProducts
        ")->first();

        return view('backend.index', compact('data'));
    }
}
