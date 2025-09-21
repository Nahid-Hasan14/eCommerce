@extends('frontend.layouts.master')

@section('title', 'Register')

@section('content')
   <div class="breadcrumbs-section plr-200">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">NEW CUSTOMERS Register</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li style="color: #FF7F00">Register</li>
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
                                <form action="{{route('customer.create')}}" method="POST">
                                    @csrf
                                    {{-- <h6 class="widget-title border-left mb-50">NEW CUSTOMERS</h6> --}}
                                    <div class="login-account p-30 box-shadow">
                                        <input type="text" value="{{old('name')}}" name="name" placeholder="*Full Name">
                                        <input type="text" value="{{old('email')}}" name="email" placeholder="*Email address here...">
                                        <input type="password" name="password" placeholder="*Password">
                                        @error('password')
                                            <span style="color: #FF7F00">{{$message}}</span>
                                        @enderror
                                        <input type="password" name="password_confirmation" placeholder="*Confirm Password">
                                        <div style="display:flex; justify-content:space-between; margin-top:20px;">
                                            <button class="submit-btn-1 btn-hover-1" type="submit">Register</button>
                                            <button class="submit-btn-2 btn-hover-1" type="submit" style="color: #FF7F00">Register With Google</button>
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
