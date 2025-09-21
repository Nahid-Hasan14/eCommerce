@extends('frontend.layouts.master')

@section('title', 'Cart Page')

@push('style')
<style>
    .address-box {
        padding: 10px;
        margin-bottom: 15px;
        border:1px solid #FFBF00;
        border-radius:4px;
    }
    .address-box.active {
        border: 2px solid green;
        background: #e8fbe8;
    }
</style>
@endpush

@section('content')
    <div class="breadcrumbs-section plr-200 mb-80" id="viewport">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Shopping Cart</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li>Shopping Cart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80" id="breadcrumbs-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active">
                                        <span>01</span>
                                        Shopping cart
                                    </a>
                                </li>
                                <li class="checkout" id="checkout-nav">
                                    <a>
                                        <span>02</span>
                                        Checkout
                                    </a>
                                </li>
                                <li class="completed">
                                    <a>
                                        <span>04</span>
                                        Order complete
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- shopping-cart start -->
                                <div class="tab-pane active" id="shopping-cart">
                                    <div class="shopping-cart-content">
                                        <form action="#" >
                                            <div class="table-content table-responsive mb-50">
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">product</th>
                                                            <th class="product-price">price</th>
                                                            <th class="product-quantity">Quantity</th>
                                                            <th class="product-subtotal">total</th>
                                                            <th class="product-remove">remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- tr -->
                                                        @foreach ($data['items'] as $item)
                                                            <tr data-id="{{$item->id}}" id="{{$item->id}}">
                                                            <td class="product-thumbnail">
                                                                <div class="pro-thumbnail-img">
                                                                    <img src="{{ asset('storage') }}/{{$item->attributes->image}}" height="110px" alt="image">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-left">
                                                                    <h6 class="product-title-2">
                                                                        <a href="#">{{$item->name}}</a>
                                                                    </h6>
                                                                    <p>Brand: Brand Name</p>
                                                                    <p>Model: Grand s2</p>
                                                                    <p> Color: {{$item->color}}</p>
                                                                </div>
                                                            </td>
                                                            <td class="product-price">${{$item->price}}</td>
                                                            <td class="updateBtn" >
                                                                <button class="btn btn-xs btn-info update-cart" data-action="decrease" style="font-weight: bold; font-size: 1.6rem;"> - </button>
                                                                <span class="show-qty" style="font-weight: bold; padding: 0 10px;">{{$item->quantity}}</span>
                                                                <button class="btn btn-xs btn-info update-cart" data-action="increase" style="font-weight: bold; font-size: 1.6rem;"> + </button>
                                                            </td>
                                                            <td class="product-subtotal">${{number_format($item->price * $item->quantity)}}</td>
                                                            <td class="product-remove">
                                                                <a href="javascript:void(0)"  onclick="itemRemove({{$item->id}})"><i class="zmdi zmdi-close"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="coupon-discount box-shadow p-30 mb-50">
                                                        <h6 class="widget-title border-left mb-20">coupon discount</h6>
                                                        <p>Enter your coupon code if you have one!</p>
                                                        <input type="text" name="name" placeholder="Enter your code here.">
                                                        <button class="submit-btn-1 black-bg btn-hover-2" type="submit">apply coupon</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="payment-details box-shadow p-30 mb-50">
                                                        <h6 class="widget-title border-left mb-20">payment details</h6>
                                                        <table>
                                                            <tr>
                                                                <td class="td-title-1">Cart Subtotal</td>
                                                                <td id="total-price" class="order-total-price">$ {{ number_format(\Cart::session(1)->getTotal()) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Shipping and Handing</td>
                                                                <td class="td-title-2">$00.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Vat</td>
                                                                <td class="td-title-2">$00.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="order-total">Order Total</td>
                                                                <td >$ </td>
                                                            </tr>
                                                        </table>
                                                        <button  class="btn btn-primary" id="order_btn">Order</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="culculate-shipping box-shadow p-30">
                                                        <h6 class="widget-title border-left mb-20">culculate shipping</h6>
                                                        <p>Enter your coupon code if you have one!</p>
                                                        <div class="row">
                                                            <div class="col-sm-4 col-xs-12">
                                                                <input type="text"  placeholder="Country">
                                                            </div>
                                                            <div class="col-sm-4 col-xs-12">
                                                                <input type="text"  placeholder="Region / State">
                                                            </div>
                                                            <div class="col-sm-4 col-xs-12">
                                                                <input type="text"  placeholder="Post code">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <button class="submit-btn-1 black-bg btn-hover-2">get a quote</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- shopping-cart end -->
                                <!-- wishlist start -->
                                <!-- wishlist end -->
                                <!-- checkout start -->
                                <div class="tab-pane" id="checkout">
                                    <div class="checkout-content box-shadow p-30">
                                        <form id="cart_form">
                                            @csrf
                                            <div class="row">
                                                <!-- billing details -->
                                                <div class="col-md-6">
                                                    <div class="billing-details pr-10">
                                                        @if (auth('customer')->user())
                                                            <div  style="border:1px solid #FFBF00; padding:10px; border-radius:4px; margin-bottom:15px;">
                                                                <h4>{{ucwords(auth('customer')->user()->name)}}</h4>
                                                            </div>
                                                        @endif

                                                        {{-- {{dd($data['customer']->addresses)}} --}}
                                                        @if ($data['addresses']->isNotEmpty())
                                                            @foreach ($data['addresses'] as $address)
                                                                <div class="address-box" id="address-{{ $address->id }}">
                                                                    <div style="display: flex; justify-content: space-between;">
                                                                        <h6 class="widget-title border-left mb-20">Shipping Info</h6>
                                                                        <a href="javascript:void(0)" class="select-address-btn" data-id="{{ $address->id }}">Select</a>
                                                                    </div>
                                                                    <span>{{ $address->division}} -> {{ $address->district}} -> {{ $address->upazila}}</span><br/>
                                                                    <span>{{ $address->address}}</span><br/>
                                                                    <span>{{ $address->phone}}</span>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        <a href="javascrept:void(0)" id="add-address-btn" class="btn btn-sm btn-info">Add New Shipping Address</a>
                                                        <div id="new-shipping-address" style="display: none; margin-top: 15px;">
                                                            <div style="margin-bottom: 20px;">
                                                            <input type="text" name="phone" value="{{old('phone')}}" id="name" placeholder="Phone here..." style="margin-bottom: 0px;"/>
                                                            <span class="text-danger phone_error"></span>
                                                            </div>

                                                            <div style="margin-bottom: 20px;">
                                                            <select class="custom-select" id="division" name="division">
                                                                @foreach ($data['division']  as $division)
                                                                    <option value="{{$division->id}}">{{$division->name}}</option>

                                                                @endforeach
                                                            </select>
                                                            <span class="text-danger division_error" style="margin-bottom: 20px;"></span>
                                                            </div>

                                                            <div style="margin-bottom: 20px;">
                                                            <select id="district" class="custom-select" name="district">
                                                                <option value="">Select District</option>
                                                            </select>
                                                            <span class="text-danger district_error" style="margin-bottom: 20px;"></span>
                                                            </div>

                                                            <div style="margin-bottom: 20px;">
                                                            <select id="upazila" class="custom-select" name="upazila">
                                                                <option value="" >Select Upazila</option>
                                                            </select>
                                                                <span class="text-danger upazila_error"></span>
                                                            </div>

                                                            <textarea name="address" class="custom-textarea" placeholder="Your address here..."></textarea>
                                                            <span class="text-danger address_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- our order -->
                                                    <div class="payment-details pl-10 mb-50">
                                                        <h6 class="widget-title border-left mb-20">our order</h6>
                                                        <table>
                                                            <tr>
                                                                <td class="td-title-1">Dummy Product Name x 2</td>
                                                                <td class="td-title-2">$1855.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Dummy Product Name</td>
                                                                <td class="td-title-2">$555.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Cart Subtotal</td>
                                                                <td class="td-title-2">$2410.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Shipping and Handing</td>
                                                                <td class="td-title-2">$15.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Vat</td>
                                                                <td class="td-title-2">$00.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="order-total">Order Total</td>
                                                                <td class="order-total-price">$ {{ number_format(\Cart::session(1)->getTotal()) }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <!-- payment-method -->
                                                    <div class="payment-method">
                                                        <h6 class="widget-title border-left mb-20">payment method</h6>
                                                        <div id="accordion">
                                                            <div class="panel">
                                                                <h4 class="payment-title box-shadow">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >
                                                                    Payment Options
                                                                    </a>
                                                                </h4>
                                                                <ul class="mt-10">
                                                                    @foreach ($data['payment_methods'] as $payment)
                                                                    <li style="border:1px solid #FFBF00; padding:10px; border-radius:4px; margin-bottom:15px;" for="bkash">
                                                                        <input type="radio" id="bkash" name="payment_method" value="{{$payment->id}}"/> {{ucwords($payment->name)}}
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- payment-method end -->
                                                    <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">place order</button>
                                                </div>
                                            </div>
                                            <input type="hidden" name="shipping_address" id="shipping_address" value="0"/>
                                        </form>
                                    </div>
                                </div>
                                <!-- checkout end -->
                                <!-- order-complete start -->
                                <div class="tab-pane" id="order-complete">
                                    <div class="order-complete-content box-shadow">
                                        <div class="thank-you p-30 text-center">
                                            <h2 class="text-black-5 mb-0">
                                               <i class="fa-solid fa-check" style="color:green; margin-right:10px;"></i>
                                                Thank you. Your order has been received.
                                            </h2>
                                        </div>
                                        <div class="order-info p-30 mb-10">
                                            <ul class="order-info-list">
                                                <li style="list-style: none; text-align: center; padding: 10px;">
                                                    <h4 style="margin: 0; font-size: 16px; color: #555; text-transform: uppercase; letter-spacing: 1px; font-weight:bold;">
                                                        Order Number
                                                    </h4>
                                                    <h2 id="oder-number"
                                                        style="margin: 5px 0 0; font-size: 28px; font-weight: bold; color: #FF850B; letter-spacing: 2px; border: 2px dashed #FF850B; display: inline-block; padding: 8px 15px; border-radius: 6px; background: #fff8f2;">
                                                        8596898345
                                                    </h2>
                                                </li>
                                            </ul>
                                        </div>
                                        <div style="padding: 10px; display:flex; justify-content:center">
                                            <h3>Please go to your
                                                <a href="{{route('user.user')}}" style="color: #FF850B; font-weight: bold; text-decoration: none; border-bottom: 2px solid #FF850B; padding: 2px 6px; border-radius: 4px;">Dashboard</a>
                                                and check order status!</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- order-complete end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->

        </section>
@endsection


@push('script')
{{-- Update & Remove Item --}}
<script>



    let updateBtn = document.getElementsByClassName('update-cart');
    const order_btn = document.getElementById("order_btn");
    const division = document.getElementById("division");
    const district = document.getElementById("district");

        division.onchange = function() {
            // console.log(this);
            // console.log(this.value);
            $.ajax({
                type: "POST",
                url: "{{route('get.district')}}",
                dataType: "json",
                data: {
                    division_id: this.value,
                    _token:"{{csrf_token()}}"
                },

                success: function (res) {
                    if (res.success) {
                        let defaultOption = '<option value="">Select District</option>';
                        let option = res.data.map(district => `<option value="${district.id}">${district.name}</option>`).join('');
                        document.getElementById('district').innerHTML = defaultOption + option;
                    }
                },
                error: function (error) {
                    console.log("Error:", error)
                }
            })
        };


        district.onchange = function() {
            // console.log(this);
            // console.log(this.value);
            $.ajax({
                type: "POST",
                url: "{{route('get.upazila')}}",
                dataType: "json",
                data: {
                    district_id: this.value,
                    _token:"{{csrf_token()}}"
                },

                success: function (res) {
                    // console.log(res);
                    if (res.success) {
                        let defaultOption = '<option value="">Select Upazila</option>';
                        let option = res.data.map(upazila => `<option value="${upazila.id}">${upazila.name}</option>`).join('');
                        console.log(option);
                        document.getElementById('upazila').innerHTML = defaultOption + option;
                    }
                },
                error: function (error) {
                    console.log("Error:", error)
                }
            })
        };



        order_btn.onclick = function(e) {
            e.preventDefault();

            if ("{{ Auth::guard('customer')->check() ? 'true' : 'false' }}" === "true") {

                document.getElementById('shopping-cart').style.display = 'none'; //hide cart div
                document.getElementById('checkout').style.display = 'block'; //show checkout div

                document.getElementById('viewport').scrollIntoView({ behavior: "smooth", block: "start" }); //for view port

                    let orderCompleteLi = document.querySelector(".cart-tab li.checkout a"); //for side navbar active
                    if(orderCompleteLi){
                        orderCompleteLi.classList.add("active");
                    }
            } else {
                window.location.href = "{{route('customer.login')}}";
            }
        };

    for(let i = 0; i < updateBtn.length; i++ ) {
        updateBtn[i].addEventListener('click', function(e){
            e.preventDefault();

            let action    = this.dataset.action;
            let tr = this.closest('tr');
            let productId = tr.dataset.id;

            $.ajax({
                type: "POST",
                url: "{{route('cart.update')}}",
                dataType: "json",
                data: {
                    productId: productId,
                    action: action,
                    _token:"{{csrf_token()}}",
                },

                success: function (res) {
                    if (res.success) {

                        tr.querySelector(".show-qty").innerText = res.quantity;
                        tr.querySelector(".product-subtotal").innerText = '$' + res.subtotal;
                        document.querySelector(".order-total-price").innerText = "$" + res.total;
                        document.getElementById('total-price').innerText = "$" + res.total;
                    }
                },
                error: function (error) {
                    console.log("Error:", error)
                }
            })
        })
    }

    function itemRemove (productId) {

     $.ajax({
        type: "POST",
        url: "{{route('cart.remove')}}",
        dataType: "json",
        data: {
            productId: productId,
            _token:"{{csrf_token()}}",
        },

        success: function (res) {
            if (res.success) {
                Swal.fire({
                    icon: res.status,
                    title: res.status === 'success' ? 'Success!' : 'Error!',
                    text: res.message,
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true
                });
                document.getElementById(res.id).remove();
                document.getElementById("mini-cart").innerHTML = res.minicart;
                document.getElementById("cart_count").innerText = res.cart_count;
                if(!res.cart_count) {
                    window.location.href = "/";
                }
                document.getElementById("total-price").innerText = "$" + res.total;
                document.querySelector(".order-total-price").innerText = "$" + res.total;
            }
        },
        error: function (error) {
            console.log("Error:", error)
        }
    })
    }

    //Add new Shipping Modal
    document.getElementById('add-address-btn').addEventListener('click', function(){
        let new_shipping_address = document.getElementById('new-shipping-address');
        if(new_shipping_address.style.display === "none") {
            new_shipping_address.style.display = "block";
            this.innerText = "Hide Shipping Address";
        } else {
            new_shipping_address.style.display = "none";
            this.innerText = "Add New Shipping Address";
        }
    })

    //Select Checkout page address(Manage)
    document.querySelectorAll('.select-address-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.address-box').forEach(box => {
                box.classList.remove('active');
                box.querySelector('.select-address-btn').innerText = 'Select';
            });

            let id = this.getAttribute('data-id');
            console.log(id);
            let selectBox = document.getElementById('address-' + id);
            let shipping_address = document.getElementById('shipping_address');
            shipping_address.value = id;
            selectBox.classList.add('active');

            this.innerText = "Selected";
        })
    });

    //For order use ajax
    $(document).ready(function(e) {
        $('#cart_form').submit(function(e) {
            e.preventDefault();

            let cartForm = $(this).serialize();

            console.log(cartForm)


            //Show SweetAlert2 Loader open
            Swal.fire({
                title: 'Processing your order...',
                html: 'Please wait',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url: "{{ route('cart.checkout') }}",
                type: 'POST',
                data: cartForm,
                dataType: "json",
                success: function(res) {
                    Swal.close();

                    if(res.success == 201){

                        document.getElementById("mini-cart").innerHTML = "";
                        document.getElementById("cart_count").innerText = 0;

                        document.getElementById('checkout').style.display = 'none'; //for checkout div hide

                        document.getElementById('oder-number').innerText = res.order_no;
                        document.getElementById('order-complete').style.display = 'block'; //for thank you div show

                        document.getElementById('viewport').scrollIntoView({ behavior: "smooth", block: "center" }); //for view port

                        document.getElementById("checkout-nav").querySelector("a").classList.add("active"); //for side navbar active
                        let orderCompleteLi = document.querySelector(".cart-tab li.completed a"); //for side navbar active
                        if(orderCompleteLi){
                            orderCompleteLi.classList.add("active");
                        }
                    }

                },
                error: function(xhr) {
                    Swal.close();

                    if(xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors){
                        const errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        Object.keys(errors).forEach(key => {
                            const span = document.querySelector(`.${key}_error`);
                            if(span) span.textContent = errors[key][0];
                            errorMessage += errors[key][0] + '<br>';
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            html: errorMessage
                        });
                    } else {
                        Swal.fire('Error!', 'Something went wrong', 'error');
                    }
                }
            })
        })
    })

</script>

@endpush
