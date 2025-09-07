@extends('frontend.layouts.master')

@section('title', 'Cart Page')

@section('content')
    <div class="breadcrumbs-section plr-200 mb-80">
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
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="#shopping-cart" data-toggle="tab">
                                        <span>01</span>
                                        Shopping cart
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="#wishlist" data-toggle="tab">
                                        <span>02</span>
                                        Wishlist
                                    </a>
                                </li> --}}
                                <li>
                                    <a>
                                        <span>02</span>
                                        Checkout
                                    </a>
                                </li>
                                <li>
                                    <a href="#order-complete" data-toggle="tab">
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
                                        <form action="#">
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
                                                        <button href="#checkout" data-toggle="tab" class="btn btn-primary" id="order_btn">Order</button>
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
                                {{-- <div class="tab-pane" id="wishlist">
                                    <div class="wishlist-content">
                                        <form action="#">
                                            <div class="table-content table-responsive mb-50">
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">product</th>
                                                            <th class="product-price">price</th>
                                                            <th class="product-stock">Stock status</th>
                                                            <th class="product-add-cart">add to cart</th>
                                                            <th class="product-remove">remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- tr -->
                                                        <tr>
                                                            <td class="product-thumbnail">
                                                                <div class="pro-thumbnail-img">
                                                                    <img src="{{asset('frontend')}}/img/cart/1.jpg" alt="">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-left">
                                                                    <h6 class="product-title-2">
                                                                        <a href="#">dummy product name</a>
                                                                    </h6>
                                                                    <p>Brand: Brand Name</p>
                                                                    <p>Model: Grand s2</p>
                                                                    <p> Color: Black, White</p>
                                                                </div>
                                                            </td>
                                                            <td class="product-price">$560.00</td>
                                                            <td class="product-stock text-uppercase">in stoct</td>
                                                            <td class="product-add-cart">
                                                                <a href="#" title="Add To Cart">
                                                                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                                </a>
                                                            </td>
                                                            <td class="product-remove">
                                                                <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                            </td>
                                                        </tr>
                                                        <!-- tr -->
                                                        <tr>
                                                            <td class="product-thumbnail">
                                                                <div class="pro-thumbnail-img">
                                                                    <img src="{{asset('frontend')}}/img/cart/2.jpg" alt="">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-left">
                                                                    <h6 class="product-title-2">
                                                                        <a href="#">dummy product name</a>
                                                                    </h6>
                                                                    <p>Brand: Brand Name</p>
                                                                    <p>Model: Grand s2</p>
                                                                    <p> Color: Black, White</p>
                                                                </div>
                                                            </td>
                                                            <td class="product-price">$560.00</td>
                                                            <td class="product-stock text-uppercase">in stoct</td>
                                                            <td class="product-add-cart">
                                                                <a href="#" title="Add To Cart">
                                                                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                                </a>
                                                            </td>
                                                            <td class="product-remove">
                                                                <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                            </td>
                                                        </tr>
                                                        <!-- tr -->
                                                        <tr>
                                                            <td class="product-thumbnail">
                                                                <div class="pro-thumbnail-img">
                                                                    <img src="{{asset('frontend')}}/img/cart/3.jpg" alt="">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-left">
                                                                    <h6 class="product-title-2">
                                                                        <a href="#">dummy product name</a>
                                                                    </h6>
                                                                    <p>Brand: Brand Name</p>
                                                                    <p>Model: Grand s2</p>
                                                                    <p> Color: Black, White</p>
                                                                </div>
                                                            </td>
                                                            <td class="product-price">$560.00</td>
                                                            <td class="product-stock text-uppercase">in stoct</td>
                                                            <td class="product-add-cart">
                                                                <a href="#" title="Add To Cart">
                                                                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                                </a>
                                                            </td>
                                                            <td class="product-remove">
                                                                <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}
                                <!-- wishlist end -->
                                <!-- checkout start -->
                                <div class="tab-pane" id="checkout">
                                    <div class="checkout-content box-shadow p-30">
                                        <form action="{{route('checkout.address')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <!-- billing details -->
                                                <div class="col-md-6">
                                                    <div class="billing-details pr-10">
                                                        <div  style="border:1px solid #FFBF00; padding:10px; border-radius:4px; margin-bottom:15px;">
                                                            <h4>Md. Nahid Hasan</h4>
                                                            <span>hasan14@gmail.com</span><br/>
                                                            <span>01774641500</span>
                                                        </div>
                                                        <h6 class="widget-title border-left mb-20">Shipping Info</h6>
                                                        <input type="text" name="phone" value="{{old('phone')}}" id="name" placeholder="Phone here..."/>
                                                        <select class="custom-select" id="division" name="division">
                                                            @foreach ($data['division']  as $division)
                                                                <option value="{{$division->id}}">{{$division->name}}</option>

                                                            @endforeach

                                                        </select>
                                                        <select id="district" class="custom-select" name="district">
                                                            <option value="">Select District</option>
                                                        </select>
                                                        <select id="upazila" class="custom-select" name="thana">
                                                            <option value="" >Select Thana</option>
                                                        </select>
                                                        <textarea name="address" class="custom-textarea" placeholder="Your address here..."></textarea>
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
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#bank-transfer" >
                                                                    direct bank transfer
                                                                    </a>
                                                                </h4>
                                                                <div id="bank-transfer" class="panel-collapse collapse in" >
                                                                    <div class="payment-content">
                                                                    <p>Lorem Ipsum is simply in dummy text of the printing and type setting industry. Lorem Ipsum has been.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel">
                                                                <h4 class="payment-title box-shadow">
                                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                                    cheque payment
                                                                    </a>
                                                                </h4>
                                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                                    <div class="payment-content">
                                                                        <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel">
                                                                <h4 class="payment-title box-shadow">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >
                                                                    paypal
                                                                    </a>
                                                                </h4>
                                                                <div id="collapseThree" class="panel-collapse collapse" >
                                                                    <div class="payment-content">
                                                                        <p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                                                        <ul class="payent-type mt-10">
                                                                            <li><a href="#"><img src="{{asset('frontend')}}/img/payment/1.png" alt=""></a></li>
                                                                            <li><a href="#"><img src="{{asset('frontend')}}/img/payment/2.png" alt=""></a></li>
                                                                            <li><a href="#"><img src="{{asset('frontend')}}/img/payment/3.png" alt=""></a></li>
                                                                            <li><a href="#"><img src="{{asset('frontend')}}/img/payment/4.png" alt=""></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- payment-method end -->
                                                    <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">place order</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- checkout end -->
                                <!-- order-complete start -->

                                {{-- <div class="tab-pane" id="order-complete">
                                    <div class="order-complete-content box-shadow">
                                        <div class="thank-you p-30 text-center">
                                            <h6 class="text-black-5 mb-0">Thank you. Your order has been received.</h6>
                                        </div>
                                        <div class="order-info p-30 mb-10">
                                            <ul class="order-info-list">
                                                <li>
                                                    <h6>order no</h6>
                                                    <p>m 2653257</p>
                                                </li>
                                                <li>
                                                    <h6>order no</h6>
                                                    <p>m 2653257</p>
                                                </li>
                                                <li>
                                                    <h6>order no</h6>
                                                    <p>m 2653257</p>
                                                </li>
                                                <li>
                                                    <h6>order no</h6>
                                                    <p>m 2653257</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <!-- our order -->
                                            <div class="col-md-6">
                                                <div class="payment-details p-30">
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
                                                            <td class="order-total-price">$2425.00</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="bill-details p-30">
                                                    <h6 class="widget-title border-left mb-20">billing details</h6>
                                                    <ul class="bill-address">
                                                        <li>
                                                            <span>Address:</span>
                                                            28 Green Tower, Street Name, New York City, USA
                                                        </li>
                                                        <li>
                                                            <span>email:</span>
                                                            info@companyname.com
                                                        </li>
                                                        <li>
                                                            <span>phone : </span>
                                                            (+880) 19453 821758
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="bill-details pl-30">
                                                    <h6 class="widget-title border-left mb-20">billing details</h6>
                                                    <ul class="bill-address">
                                                        <li>
                                                            <span>Address:</span>
                                                            28 Green Tower, Street Name, New York City, USA
                                                        </li>
                                                        <li>
                                                            <span>email:</span>
                                                            info@companyname.com
                                                        </li>
                                                        <li>
                                                            <span>phone : </span>
                                                            (+880) 19453 821758
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

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



        order_btn.onclick = function() {

            if("{{auth()->user()}}") {
                  alert("Login");
            }


        alert("unkhon user!");
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
</script>

@endpush
