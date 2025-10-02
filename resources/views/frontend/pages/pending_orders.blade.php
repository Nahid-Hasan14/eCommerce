@extends('frontend.layouts.master')

@section('title', 'Pending Orders')

@push('style')
<style>
    .black-text {
        color: #000
    }
    .navbar {
        padding: 15px;
        border-radius: 4px;
        border: 1px solid #ddd;
    }
    .profile-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 2px solid #ddd;
        margin-bottom: 10px;
    }
    .nav-title > li {
        padding: 7px 0;
    }
    .nav-title > li > a{
        border-radius: 5px;
        color: #555;
        padding: 8px;
    }
    .nav-title > li.active > a,
    .nav-title > li.active > a:hover,
    .nav-title > li.active > a:focus {
        color: #fff;
        background-color: #337ab7;
    }
    .card-content {
        padding-bottom: 15px;
    }
    .dashboard-card {
        padding: 20px;
        text-align: center;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .dashboard-card h1 , p{
        color: #fff;
    }
    .bg-primary { background-color: #0d6efd !important; }
    .bg-success { background-color: #28a745 !important; }
    .bg-info    { background-color: #5bc0de !important; }
    .bg-warning { background-color: #f0ad4e !important; }
    .bg-danger  { background-color: #FF0000 !important; }

    .order-details-container {
        /* display: none; Initially hidden */
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    .order-content {
        margin-top: 20px;
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    .table-heading {
        background-color: #f7f7f7;
        border-bottom: 1px solid #eee;
        padding: 15px;
    }
    .table-res > table {
        padding: 15px;
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .table-res > table th,
    .table-res > table td {
        padding: 10px;
        color: #000;
    }
    .table > tbody > tr > td, .table > thead > tr > th {
            vertical-align: middle;
    }
    .product-list .media {
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
        margin-bottom: 15px;
    }
    .product-list .media:last-child {
        border-bottom: none;
    }
    .order-summary-table {
        margin-top: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
    }

</style>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="navbar">
                    <div class=" text-center">
                        <img src="{{asset('frontend')}}/img//product/6.jpg" class="profile-img" height="100px" width="100px"/>
                        <h2>{{ucwords(auth('customer')->user()->name)}}</h2>
                        <ul class="nav-title" id="dashboard-tabs">
                            <li class="active"><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
                            <li><a href="{{route('customer.profile')}}">My Profile</a></li>
                            <li><a href="" data-toggle="tab">My Favorite</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="content">
                    <div class="card-content" id="dashboard">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-3">
                                <a href="{{route('customer.dashboard')}}">
                                    <div class="dashboard-card bg-primary">
                                        <h1>{{ $data['orders_status']->count() }}</h1>
                                        <p>Total Orders</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-3">
                                <a href="{{route('customer.pending.orders')}}">
                                    <div class="dashboard-card bg-warning">
                                        <h1>{{ $data['orders_status']->where('order_status_id', 1)->count() }}</h1>
                                        <p>Pending</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-3">
                                <a href="{{route('customer.completed.orders')}}">
                                    <div class="dashboard-card bg-success">
                                        <h1>{{$data['orders_status']->where('order_status_id', 2)->count()}}</h1>
                                        <p>Completed</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-3">
                                <a href="{{route('customer.cancel.orders')}}">
                                    <div class="dashboard-card bg-danger">
                                        <h1>{{ $data['orders_status']->where('order_status_id', 3)->count() }}</h1>
                                        <p>Canceled</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="order-content">
                        <div class="table-heading">
                            <h2>Pending Order</h2>
                        </div>
                        <div class="table-responsive table-res" style="padding: 15px;">
                            <table  class="table table-striped table-hover table-style">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Order Id</th>
                                        <th>Date</th>
                                        {{-- <th>Total Item</th> --}}
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['pending_order'] as $order)
                                    @php
                                        $address = explode('|', $order->shipping_address);
                                    @endphp
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>#{{ $order->order_number }}</td>
                                            <td>{{ date("d-M-Y", strtotime($order->created_at)) }}</td>
                                            <td>{{__('currency')}} {{ $order->total_price }}</td>
                                            <td style="color: #e6a800">{{ $order->OrderStatus->name }}</td>
                                            <td>
                                                <button class="btn btn-info btn-sm view-details-btn" data-target= "{{ $order->order_number }}" style="border-radius: 4px;">View</button>
                                                @if ($order->order_status_id !== 3 && $order->order_status_id !== 2)
                                                    <form  action="{{route('customer.order.cancel', $order->id)}}" id="delete_{{$order->id}}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="orderCancel({{$order->id}})" style="border-radius: 4px;">Cancel</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- for Order Details show --}}
                                        <tr class="details-row">
                                            <td colspan="6">
                                                <div class="order-details-container" id="details-{{$order->order_number}}">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="order-content">
                                                                <div class="table-heading black-text">Details of Order #{{$order->order_number}}</div>
                                                                <div class="order-info" style="padding: 15px;">
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-12">
                                                                            <h4 class="black-text">Order Info</h4>
                                                                            <span class="black-text"><strong>Order Date: {{ date("d-M-Y", strtotime($order->created_at)) }}</strong></span><br>
                                                                            <sapn class="black-text"><strong>Total Price:</strong> $ {{ $order->total_price }}</sapn><br>
                                                                            <span class="black-text"><strong>Status:</strong> {{ $order->OrderStatus->name }}</span>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12">
                                                                            <h4 class="black-text">Shipping Info</h4>
                                                                            <address class="black-text">
                                                                                <strong>{{$address[3]}}-> {{$address[4]}}-> {{$address[5]}}</strong> <br>
                                                                                {{$address[2]}} <br>
                                                                                {{$address[1]}}
                                                                            </address>
                                                                        </div>
                                                                    </div>

                                                                    <hr>

                                                                    <div>
                                                                        <h4>Order Products</h4>
                                                                        <div class="product-list">
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a>
                                                                                        <img src="{{asset('storage')}}/{{ $order->image }}" height="80px" width="80px"/>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="media-heading">{{$order->title}}</h4>
                                                                                    <span class="black-text"><strong>Price:</strong> {{$order->price}} | <strong>Quantity:</strong> {{$order->quantity}} | <strong>Total:</strong> {{$order->price}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="order-summary-table text-right">
                                                                            <span class="black-text"><strong>Sub Total:</strong> $120.50</span> <br>
                                                                            <span class="black-text"><strong>Delivery fee:</strong> $0.00</span>
                                                                            <h4 class="black-text"><strong>Total:</strong> $120.50</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-primary pull-right close-details-btn" >Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                     @endforeach
                                </tbody>
                            </table>
                            {{ $data['pending_order']->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                    {{-- For Order Details --}}
                    {{-- <div class="order-details-container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="order-content">
                                    <div class="table-heading black-text">Details of Order #ORD1002</div>
                                    <div class="order-info" style="padding: 15px;">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <h4 class="black-text">Order Info</h4>
                                                <span class="black-text"><strong>Order Date: 2024-05-08</strong></span><br>
                                                <sapn class="black-text"><strong>Total Price:</strong> $ 250</sapn><br>
                                                <span class="black-text"><strong>Status:</strong> Pending</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <h4 class="black-text">Shipping Info</h4>
                                                <address class="black-text">
                                                    <strong>Rangpur->Kurigram-> Nageshwari</strong> <br>
                                                    Dholuabari, Kochakata-5660 <br>
                                                    01774641500
                                                </address>
                                            </div>
                                        </div>

                                        <hr>

                                        <div>
                                            <h4>Order Products</h4>
                                            <div class="product-list">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a>
                                                            <img class="media-object" src="https://placehold.co/80x80/007bff/ffffff?text=Product+1" alt="Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">A Good Camera for Gift.....</h4>
                                                        <span class="black-text"><strong>Price:</strong> $50.00 | <strong>Quantity:</strong> 2 | <strong>Total:</strong> $100.00</span>
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a>
                                                            <img class="media-object" src="https://placehold.co/80x80/007bff/ffffff?text=Product+1" alt="Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">A Good Camera for Gift.....</h4>
                                                        <span class="black-text"><strong>Price:</strong> $50.00 | <strong>Quantity:</strong> 2 | <strong>Total:</strong> $100.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-summary-table text-right">
                                                <span class="black-text"><strong>সাবটোটাল:</strong> $120.50</span> <br>
                                                <span class="black-text"><strong>শিপিং:</strong> $0.00</span>
                                                <h4 class="black-text"><strong>মোট:</strong> $120.50</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary pull-right" id="closeDetailsBtn">বন্ধ করুন</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
 <script>
    document.addEventListener("DOMContentLoaded", function() {

        document.querySelectorAll(".order-details-container").forEach(el => {
            el.style.display = "none";
        });

        document.querySelectorAll(".view-details-btn").forEach(button => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                // alert("Button Working");

                let buttonOrderNumber = this.dataset.target;
                let targetEl = document.querySelector( "#details-" + buttonOrderNumber );
                console.log(targetEl);

                // document.querySelectorAll(".order-details-container").forEach(el=> {
                //     if(el !== targetEl) {
                //         el.style.display = "none";
                //     }
                // });

                if(!targetEl.dataset.loaded) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('customer.order.details')}}",
                        dataType: "json",
                        data: {
                            buttonOrderNumber: buttonOrderNumber,
                            _token:"{{csrf_token()}}"
                        },
                        success: function(response) {
                            console.log(response.html);
                            targetEl.innerHTML = response.html;
                            targetEl.style.display = "block";
                            targetEl.dataset.loaded = true;
                        },
                        error: function(err) {
                            console.error(err.responseText);
                        }
                    });
                }else {
                    targetEl.style.display = targetEl.style.display === "none" ? "block" : "none";
                }

                // if(targetEl.style.display === "none") {
                //     targetEl.style.display ="block";
                // }else {
                //     targetEl.style.display = "none";
                // }
            })
        })
    //         document.querySelectorAll(".close-details-btn").forEach(button => {
    //         button.addEventListener("click", function() {
    //             console.log(this)
    //             console.log(this.closest(".order-details-container"))
    //             this.closest(".order-details-container").style.display = "none";
    //         });
    //    });

    })

    function closebtn(id) {

        let order_details_section = document.getElementById("details-" + id);
        let dashboard = document.getElementById("dashboard");
        dashboard.scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
        order_details_section .style.display = 'none';
    }
 </script>
@endpush
