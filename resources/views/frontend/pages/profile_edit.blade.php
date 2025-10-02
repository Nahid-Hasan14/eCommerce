@extends('frontend.layouts.master')

@section('title', 'Edit Profile')

@push('style')
    <style>
        .date-input{
            background: #fff none repeat scroll 0 0;
            border: 1px solid transparent;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
            color: #999999;
            font-size: 13px;
            height: 40px;
            margin-bottom: 20px;
            padding-left: 20px;
            width: 100%;
        }
        .date-input::-webkit-calendar-picker-indicator {
            background-size: 20px 20px;
            width: 20px;
            height: 20px;
        }
    </style>
@endpush

@section('content')
    <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Dashboard</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li>My Account</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">

            <!-- LOGIN SECTION START -->
            <div class="login-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="my-account-content" id="accordion2">
                                <!-- My Personal Information -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            My Personal Information
                                        </h4>
                                    </div>
                                        <div class="panel-body">
                                            <form action="{{route('customer.profile.update')}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="new-customers">
                                                    <div class="p-30">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <input type="text" name="name" value="{{auth('customer')->user()->name}}" placeholder="Full Name">

                                                                @error('name')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-6">
                                                                @error('phone')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror

                                                                <input type="text" name="phone" value="{{auth('customer')->user()->phone}}" placeholder="Phone here...">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                @error('email')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror

                                                                <input type="text" name="email" value="{{auth('customer')->user()->email}}" placeholder="Email address here...">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                @error('dob')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror

                                                                <input type="date" name="dob" value="{{auth('customer')->user()->dob}}" class="date-input">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                @error('gender')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror

                                                                <div class="form-group" style="border:1px solid #ddd; padding:7px 15px; border-radius:6px;">
                                                                    <label class="control-label" style="margin-right:15px; font-weight:bold;">Gender:</label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="gender" value="1" {{auth('customer')->user()->gender == '1' ? 'checked' : ''}}>Male
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="gender" value="2" {{auth('customer')->user()->gender == '2' ? 'checked' : ''}}>Female
                                                                    </label>

                                                                    <label class="radio-inline">

                                                                        <input type="radio" name="gender" value="3" {{auth('customer')->user()->gender == '3' ? 'checked' : ''}}>Others
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Save Update</button>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="submit">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LOGIN SECTION END -->
        </div>
@endsection
