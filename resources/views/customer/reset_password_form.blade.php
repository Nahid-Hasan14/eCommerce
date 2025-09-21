@extends('frontend.layouts.master')

@section('title', 'Reset Password Form')

@section('content')
   <div class="breadcrumbs-section plr-200">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Reset Password Form</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li style="color: #FF7F00">Reset Password</li>
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

            <!-- Register SECTION START -->
            <div class="login-section" style="display:flex; justify-content:center; margin: 30px;">
                {{-- <div class="container"> --}}
                    {{-- <div class="row"> --}}
                        <!-- new-customers -->
                        <div class="col-md-6">
                            <div class="new-customers">
                                <form action="{{ route('customer.password.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    {{-- <h6 class="widget-title border-left mb-50">NEW CUSTOMERS</h6> --}}
                                    <div class="login-account p-30 box-shadow">
                                        <input type="text" value="{{old('email')}}" name="email" placeholder="*Email address here...">
                                        <input type="password" name="password" placeholder="*New Password">
                                        @error('password')
                                            <span style="color: #FF7F00">{{$message}}</span>
                                        @enderror
                                        <input type="password" name="password_confirmation" placeholder="*Confirm Password">
                                        <div style="display:flex; justify-content:space-between; margin-top:20px;">
                                            <button class="submit-btn-1 btn-hover-1" type="submit">Confirm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    {{-- </div> --}}
                {{-- </div> --}}
            </div>
            <!-- LOGIN SECTION END -->

        </div>
@endsection
