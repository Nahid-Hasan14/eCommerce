@extends('frontend.layouts.master')

@section('title', 'Create Address')

@section('content')

<div class="breadcrumbs-section plr-200 mb-80">
    <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title">Update Address</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li>Create a New Shipping Address</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Create shipping address</h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('customer.address.store')}}" method="POST">
                            @csrf
                            <div class="new-customers p-30">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" name="phone" value="{{old('phone')}}" placeholder="Phone Number">
                                    </div>
                                    <div class="col-sm-6">
                                        <select id="division" name="division" class="custom-select" style="margin-bottom: 20px">
                                            <option value="">Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{$division->id}}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select id="district" name="district" class="custom-select" style="margin-bottom: 20px">
                                            <option value="">Select District</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select id="upazila" name="upazila" class="custom-select" style="margin-bottom: 20px">
                                            <option value="">Select Upazila</option>
                                        </select>
                                    </div>
                                </div>
                                <textarea name="full_address" placeholder="Full address here...">{{old('full_address')}}</textarea>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Save</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('customer.profile')}}" class="mt-20 btn-hover-1 f-right" type="reset">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

