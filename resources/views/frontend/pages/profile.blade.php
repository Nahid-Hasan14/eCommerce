@extends('frontend.layouts.master')

@section('title', 'My Profile')

@section('content')
    <div class="container">
    <h1 class="text-center">User Profile</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="navbar">
                <div class=" text-center">
                    <img src="{{asset('frontend')}}/img//product/6.jpg" class="profile-img" height="100px" width="100px"/>
                    <h2>{{ucwords(auth('customer')->user()->name)}}</h2>
                    <ul class="nav-title" id="dashboard-tabs">
                        <li class=""><a href="{{route('user.user')}}">Dashboard</a></li>
                        <li class="active"><a href="" data-toggle="tab">My Profile</a></li>
                        <li><a href="" data-toggle="tab">My Favorite</a></li>
                    </ul>
                    <a href="{{route('customer.change.password.show')}}" class="btn btn-sm  red-btn">Change Password</a>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="content">
                <div class="personal-info">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <h5><strong>Name: </strong>{{ucwords(auth('customer')->user()->name)}}</h5>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <h5><strong>Email: </strong>{{auth('customer')->user()->email}}</h5>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <h5><strong>Phone: </strong>017xxxxxxxx</h5>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h5><strong>Gender: </strong>Male</h5>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <h5><strong>Date of Birth: </strong>25/09/2000</h5>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <a style="color: #f0ad4e">Edit Bio</a>
                        </div>
                    </div>
                </div>
                <div class="shipping">
                    <div class="shipping-header clearfix">
                        <h3 class="pull-left">Shipping Addresss ({{$data['addresses']->count()}}/4)</h3>
                        <button class="pull-right red-btn">Add New Address</button>
                    </div>
                    <div class="shipping-address">
                        <div class="row">
                            @if ($data['addresses']->isNotEmpty())
                                @foreach ($data['addresses'] as $address)
                                    <div class="col-md-6 col-sm-12">
                                        <div class="address-card" style="margin-bottom: 10px;">
                                            <span>{{ $address->division}} -> {{ $address->district}} -> {{ $address->upazila}}</span><br/>
                                            <p>{{$address->address}}</p>
                                            <p>{{$address->phone}}</p>
                                            <div style="display: flex; justify-content: space-between">
                                                <a class="btn btn-sm btn-primary edit-btn">Edit</a>
                                                <a class="btn btn-sm btn-danger edit-btn">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
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

    .personal-info{
        padding: 15px;
        border: 1px solid #949090;
    }
    .red-btn {
        color: #eb0612;
        padding: 5px 0;
        cursor: pointer;
        font-weight: 500;
    }
    .red-btn:hover {
        color: #c95252;
    }
    .shipping {
        margin: 15px 0;
        border: 1px solid #949090;
        padding: 15px;
    }
    .shipping-header {
        border-bottom: 2px double #e9e2e2;
    }
    .shipping-address {
        margin-top: 15px;
    }
    .shipping-address p {
        color: #000;
    }
    .address-card {
        padding: 10px;
        border: 1px solid #e9e2e2;
    }
    .edit-btn {
        border-radius: 20px;
        font-weight: 500;
    }

</style>
@endpush
