@extends('frontend.layouts.master')

@section('title', 'Login')

@section('content')
   <div class="breadcrumbs-section plr-200">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title"> FOR REGISTERED CUSTOMERS</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li style="color: #FF7F00">Login</li>
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
            <div class="login-section" style="display:flex; justify-content:center; margin: 30px 0;">
                {{-- <div class="container"> --}}
                    {{-- <div class="row"> --}}
                        <!-- new-customers -->
                        <div class="col-md-6">
                            <div class="new-customers">
                                <form action="{{route('customer.login.submit')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="redirect_to" value="{{ $redirectTo ?? '' }}">
                                    {{-- <h6 class="widget-title border-left mb-50">REGISTERED CUSTOMERS</h6> --}}
                                    <div class="login-account p-30 box-shadow">
                                        <input type="text" name="email"  placeholder="Email address here..." required>
                                        <input type="password" name="password"  placeholder="Password" required>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Login</button>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{route('customer.forgot.password')}}" class="mt-20 btn-hover-1 pull-right" style="cursor: pointer">Forgot Password</a>
                                            </div>
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
