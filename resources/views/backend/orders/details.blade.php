@extends('backend.layouts.master')

@section('title', 'Order Details')

@section('content')
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row" style="display: block;">
              <div class="clearfix"></div>
              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order Details</h2>
                    <a href="{{route('admin.orders.manage')}}" class="btn btn-dark btn-sm pull-right">Order Manage</a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_title">
                    <div class="pull-left">
                        <h7><strong>Order Number: </strong> {{$order->order_number}}</h7> <br/>
                        <h7><strong>Order Status: </strong>{{$order->orderStatus->name}}</h7> <br/>
                        <h7><strong>Payment Status: </strong>{{$order->paymentStatus->name ?? ''}}</h7> <br/>
                        <h7><strong>Payment Method: </strong>{{$order->paymentMethod->name}}</h7> <br/>
                        @if ($order->paymentMethod->name != "Cash on delivery")
                            <h7><strong>Transaction id: </strong>{{$order->orderDetails->first()->payment_transaction_id}}</h7> <br/>
                        @endif
                        <h7><strong>Date: </strong> {{$order->created_at->format('d-m-Y')}} ({{$order->created_at->format('h:i A')}})</h7> <br>
                    </div>
                    <div class="pull-right" style="display: flex; align-items: center; height: 130px;">
                        {{-- hidden form for order status change --}}
                        <form id="cancel-form-{{$order->id}}" action="{{route('admin.order.cancel', $order->id)}}" method="POST" style="display:none;">@csrf</form>
                        <form id="confirmed-form-{{$order->id}}" action="{{route('admin.order.confirmed', $order->id)}}" method="POST" style="display:none;">@csrf</form>
                        <form id="shipped-form-{{$order->id}}" action="{{route('admin.order.shipped', $order->id)}}" method="POST" style="display:none;">@csrf</form>
                        <form id="deliverd-form-{{$order->id}}" action="{{route('admin.order.deliverd', $order->id)}}" method="POST" style="display:none;">@csrf</form>

                        <button type="submit" onclick="confirmAction('deliverd', {{$order->id}})" class="btn btn-success btn-sm pull-right">Deliverd</button>
                        <button type="submit" onclick="confirmAction('shipped', {{$order->id}})" class="btn btn-info btn-sm pull-right">Shipped</button>
                        <button type="button" onclick="confirmAction('confirmed', {{$order->id}})" class="btn btn-primary btn-sm pull-right">Confirmed</button>
                        <button type="button" onclick="confirmAction('cancel', {{$order->id}})" class="btn btn-danger btn-sm pull-right">Cancel Order</button>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                  <tr class="headings">
                                    <th class="column-title">Image </th>
                                    <th class="column-title">Title </th>
                                    <th class="column-title">Quantity </th>
                                    <th class="column-title">Price </th>
                                    <th class="column-title">Total Price </th>
                                  </tr>
                                </thead>
                                {{-- <pre>{{ print_r($products, true)}}</pre> --}}
                                <tbody>
                                    @php
                                        $subTotal = 0;
                                    @endphp
                                    @foreach ($order->orderDetails as $detail)
                                        @php
                                            $lineTotal = $detail->quantity * $detail->price;
                                            $subTotal += $lineTotal;
                                        @endphp
                                        <tr class="even pointer">
                                            <td class="text-cen align-middle ">
                                                <img src="{{asset('storage/' . $detail->product->image) }}" alt="Image" height="80px" width="150px"/>
                                            </td>
                                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$detail->product->title}}</td>
                                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$detail->quantity}}</td>
                                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$detail->price}}</td>
                                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$detail->quantity}}*{{$detail->price}} = {{$detail->total}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                        <tr class="headings">
                                            <th class="column-title">Coustomer Information</th>
                                        </tr>
                                        </thead>
                                        {{-- <pre>{{ print_r($products, true)}}</pre> --}}
                                            <tbody>
                                        <tr class="even pointer">
                                            @php
                                                $address = explode('|', $order->shipping_address)
                                            @endphp
                                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">
                                                <span><strong>Name: </strong>{{$order->customer->name}}</span> <br/>
                                                <span><strong>Email: </strong>{{$order->customer->email}}</span> <br/>
                                                <span><strong>Phone: </strong>{{$address[1]}}</span> <br/>
                                                <span><strong>Shipping Address: </strong>{{$address[3]}}->{{$address[4]}}->{{$address[5]}}, {{$address[2]}}</span> <br/>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">
                                            <tbody>
                                            <tr class="even pointer">
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Sub Total</td>
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{number_format($subTotal, 2)}}</td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Shipping Fee</td>
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">$ 100</td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Discount</td>
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">$ 00</td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Vat</td>
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">$ 00</td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;"><strong>TOTAL</strong></td>
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;"><strong>{{$subTotal + 100}}</strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('admin.order.invoice')}}" class="btn btn-success btn-sm pull-right">Invoice</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@push('script')
<script>
    function confirmAction(action, orderId) {
        let messages = {
            cancel: "Are you sure cancel this order?",
            confirmed: "Are you sure Confirmed this order?",
            shipped: "Are you sure Shipped this order?",
            deliverd: "Are you sure Deliverd this order?"
        }
        let titles = {
            cancel: "Yes, Cancel it!",
            confirmed: "Yes, Confirmed it!",
            shipped: "Yes, Shipped it!",
            deliverd: "Yes, Deliverd it!"
        }

        Swal.fire({
            // title: "Are you sure?",
            text: messages[action],
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: titles[action]
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(action + '-form-' + orderId).submit();
            }
        });
    }
</script>
@endpush
