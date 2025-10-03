@extends('backend.layouts.master')

@section('title', 'Orders Manage')

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
                    <h2>product Manage</h2>
                        <div class="form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Search</button>
                                </span>
                            </div>
                        </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Order Id</th>
                            <th class="column-title">Customer </th>
                            <th class="column-title">Date </th>
                            <th class="column-title">Price </th>
                            <th class="column-title">Payment Status </th>
                            <th class="column-title">Status </th>
                            <th class="column-title">Action </th>
                            {{-- <th class="column-title">Description</th> --}}
                          </tr>
                        </thead>
                        {{-- <pre>{{ print_r($products, true)}}</pre> --}}

                            <tbody>
                          @foreach ($orders as $order)
                                <tr class="even pointer">
                                    <td class="text-cen align-middle ">{{$order->order_number}}</td>
                                    <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$order->customer->name}}</td>
                                    <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$order->created_at->format('Y-m-d')}} ({{$order->created_at->format('h:i A')}})</td>
                                    <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$order->total_price}}</td>
                                    <td class="text-cen align-middle text-center" style="max-width: 150px; word-wrap: break-word;">{{$order->paymentStatus->name}}</td>
                                    <td class="text-cen align-middle text-center" style="max-width: 150px; word-wrap: break-word;">{{$order->orderStatus->name}}</td>
                                    {{-- <td class="text-cen align-middle " style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$product->description}}</i></td> --}}
                                    <td class="text-cen align-middle">
                                        <a href="{{route('order.details', $order->id)}}" class="btn btn-dark btn-sm">View</a>
                                    </td>
                                </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $orders->links('pagination::bootstrap-4')}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
