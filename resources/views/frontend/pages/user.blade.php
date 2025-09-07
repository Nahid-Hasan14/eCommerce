@extends('frontend.layouts.master')

@section('title', 'User')

@section('content')
    <div class="container">
        <h1 class="text-center">User Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="navbar">
                    <div class=" text-center">
                        <img src="{{asset('frontend')}}/img//product/6.jpg" class="profile-img" height="100px" width="100px"/>
                        <h2>Md Jobbar Ali</h2>
                        <ul class="nav-title" id="dashboard-tabs">
                            <li class="active"><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
                            <li><a href="{{route('user.profile')}}">My Profile</a></li>
                            <li><a href="" data-toggle="tab">My Favorite</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="content">
                    <div class="card-content" id="dashboard">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="dashboard-card bg-primary">
                                    <h1>10</h1>
                                    <p>Total Orders</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="dashboard-card bg-warning">
                                    <h1>2</h1>
                                    <p>Pending</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="dashboard-card bg-success">
                                    <h1>7</h1>
                                    <p>Completed</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="dashboard-card bg-danger">
                                    <h1>1</h1>
                                    <p>Canceled</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-content">
                        <h2>Recent Order</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Date</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th class="text-right">Total Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#EF-7789</td>
                                    <td>3-Aug-25</td>
                                    <td><img src="{{asset('frontend')}}/img//product/6.jpg" height="80px" width="80px"/></td>
                                    <td>Hp E548 Model Leptop Silver Color</td>
                                    <td class="text-right">$ 37</td>
                                    <td>Pending</td>
                                </tr>
                                <tr>
                                    <td>#EF-7789</td>
                                    <td>3-Aug-25</td>
                                    <td><img src="{{asset('frontend')}}/img//product/6.jpg" height="80px" width="80px"/></td>
                                    <td>Vivo 12pro Model Mobile Silver Color</td>
                                    <td class="text-right">$ 37</td>
                                    <td>Pending</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
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
        }
        .dashboard-card h1 , p{
            color: #fff;
        }
        .bg-primary { background-color: #0d6efd !important; }
        .bg-success { background-color: #28a745 !important; }
        .bg-info    { background-color: #5bc0de !important; }
        .bg-warning { background-color: #f0ad4e !important; }
        .bg-danger  { background-color: #FF0000 !important; }

        .order-content {
            margin-top: 20px;
        }
        .order-content > table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .order-content > table th,
        .order-content > table td {
            border: 1px solid #afaaaa;
            padding: 10px;
            color: #000;
        }
    </style>
@endsection
