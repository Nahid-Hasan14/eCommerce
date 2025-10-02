
@php
    $address = explode('|', $data['order']->shipping_address);
@endphp


<td colspan="6">
    <div class="order-details-container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="order-content">
                    <div class="table-heading black-text">Details of Order #{{$data['order']->order_number}}</div>
                    <div class="order-info" style="padding: 15px;">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <h4 class="black-text">Order Info</h4>
                                <span class="black-text"><strong>Order Date: {{ date("d-M-Y", strtotime($data['order']->created_at)) }}</strong></span><br>
                                <sapn class="black-text"><strong>Total Price:</strong> {{__('currency')}} {{ $data['order']->total_price }}</sapn><br>
                                <span class="black-text"><strong>Status:</strong> {{ $data['order']->OrderStatus->name }}</span>
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
                            @foreach ($data['order_details'] as $order)
                            <div class="product-list">
                                <div class="media">
                                    <div class="media-left">
                                        <a>
                                            <img src="{{asset('storage')}}/{{ $order->product->image }}" height="80px" width="80px"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$order->product->title}}</h4>
                                        <span class="black-text"><strong>Price:</strong> {{__('currency')}} {{$order->price}} | <strong>Quantity:</strong> {{$order->quantity}} | <strong>Sub-total:</strong> {{__('currency')}} {{$order->price}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="order-summary-table text-right">
                                <span class="black-text"><strong>Sub Total:</strong> {{__('currency')}}{{$data['order']->total_price}}</span> <br>
                                <span class="black-text"><strong>Delivery fee:</strong> {{__('currency')}}0.00</span>
                                <h4 class="black-text"><strong>Total:</strong> {{__('currency')}}120.50</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary pull-right close-details-btn" onclick="closebtn('{{$data['order']->order_number}}')">Close</button>
            </div>
        </div>
    </div>
</td>

