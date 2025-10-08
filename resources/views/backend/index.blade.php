@extends('backend.layouts.master')

@section('title', 'Admin Dashboard')

@push('style')
<style>
    .stat-card {
        border-left: 4px solid;
        border-radius: 10px;
        transition: transform 0.3s;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .stat-card:hover {
        transform: translateY(-5px);
    }
    .stat-card.orders {
        border-left-color: #3498DB;
    }
    .stat-card.completed {
        border-left-color: #9B59B6;
    }
    .stat-card.canceled {
        border-left-color: #E74C3C;
    }
    .stat-card.pending {
        border-left-color: #1ABB9C;
    }
    .stat-card.lowstock {
        border-left-color: #F59E0B;
    }
    .sales-overview {
        background: #fff;
        border: 1px solid #ff9800;
        box-shadow: 0 4px 10px rgba(255, 152, 0, 0.2);
    }
    .sales-overview h6 {
        color: #6c757d;
    }
    .sales-overview h3 {
        color: #ff9800;
    }
    .sales-overview small {
        color: #495057;
    }
</style>
@endpush
@section('content')
    <div class="right_col" role="main">
        <br />
        <div>
            <h3>Orders History</h3>
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-3">
                    <a href="{{route('admin.orders.manage')}}">
                        <div class="card stat-card orders">
                            <div class="card-body">
                                <div>
                                    <h6>Total Orders</h6>
                                    <h3>{{$data['orders']->totalOrders}}</h3>
                                    <small>Good sell for this month</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('admin.order.status', 'complete')}}">
                        <div class="card stat-card completed">
                            <div class="card-body">
                                <div>
                                    <h6>Completed</h6>
                                    <h3>{{ $data['orders']->completedOrders }}</h3>
                                    <small>Good sell for this month</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('admin.order.status', 'cancel')}}">
                        <div class="card stat-card canceled">
                            <div class="card-body">
                                <div>
                                    <h6>Canceled</h6>
                                    <h3>{{ $data['orders']->canceledOrders }}</h3>
                                    <small>Good sell for this month</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('admin.order.status', 'pending')}}">
                        <div class="card stat-card pending">
                            <div class="card-body">
                                <div>
                                    <h6>Order Pending</h6>
                                    <h3>{{ $data['orders']->pendingOrders }}</h3>
                                    <small>Good sell for this month</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div style="margin-top: 40px;">
            <h3>Sales & Customer Overview</h3>
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-3">
                    <div class="card sales-overview">
                        <div class="card-body">
                            <div>
                                <h6>Total Customers</h6>
                                <h3>{{$data['customers']}}</h3>
                                <small>Good sell for this month</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card sales-overview">
                        <div class="card-body">
                            <div>
                                <h6>Total Sales</h6>
                                <h3>{{$data['orders']->total_price}}</h3>
                                <small>Good sell for this month</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card sales-overview">
                        <div class="card-body">
                            <div>
                                <h6>Yesterday's Orders</h6>
                                <h3>{{ $data['orders']->yesterdayOrders }}</h3>
                                <small>Good sell for this month</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card sales-overview">
                        <div class="card-body">
                            <div>
                                <h6>Today's Orders</h6>
                                <h3>{{ $data['orders']->todayOrders }}</h3>
                                <small>Good sell for this month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 40px; margin-bottom:20px">
            <h3>Product History</h3>
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-3">
                    <a href="{{route('admin.product.index')}}">
                        <div class="card stat-card orders">
                            <div class="card-body">
                                <div>
                                    <h6>Total Product</h6>
                                    <h3>{{ $data['products']->totalProducts }}</h3>
                                    <small>Good sell for this month</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('admin.products.view', 'active')}}">
                        <div class="card stat-card pending">
                            <div class="card-body">
                                <div>
                                    <h6>Active Product</h6>
                                    <h3>{{ $data['products']->activeProducts }}</h3>
                                    <small>Ready for sell</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('admin.products.view', 'low-stock')}}">
                        <div class="card stat-card lowstock">
                            <div class="card-body">
                                <div>
                                    <h6>Stock Low</h6>
                                    <h3>{{ $data['products']->lowStockProducts}}</h3>
                                    <small>Stock Low When Product >= 5</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('admin.products.view', 'out-of-stock')}}">
                        <div class="card stat-card canceled">
                            <div class="card-body">
                                <div>
                                    <h6>Stock Out</h6>
                                    <h3>{{ $data['products']->outOfStockProducts }}</h3>
                                    <small>Now Your Product Stock 0</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
