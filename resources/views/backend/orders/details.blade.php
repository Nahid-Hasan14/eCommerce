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
                    <a href="{{route('orders.manage')}}" class="btn btn-dark btn-sm pull-right">Order Manage</a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_title">
                    <div class="pull-left">
                        <h7><strong>Order Id: </strong> #E6757</h7> <br/>
                        <h7><strong>Status: </strong> Panding</h7> <br/>
                        <h7><strong>Date: </strong> 25 Aug 2025</h7> <br>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="btn btn-success btn-sm pull-right">Deliverd</a>
                        <a href="#" class="btn btn-info btn-sm pull-right">Shipped</a>
                        <a href="#" class="btn btn-primary btn-sm pull-right">Confirmed</a>
                        <a href="#" class="btn btn-danger btn-sm pull-right">Cancel Order</a>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
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
                                    <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">
                                        <span><strong>Name: </strong>Md. Jabbar Ali</span> <br/>
                                        <span><strong>Email: </strong>jabbar@example.com</span> <br/>
                                        <span><strong>Phone: </strong>01774641500</span> <br/>
                                        <span><strong>Shipping Address: </strong>Division, District, Thana, Kochakata-5660, Dholuabari</span> <br/>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12">
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
                                  <tr class="even pointer">
                                    <td class="text-cen align-middle ">
                                        <img src="" alt="Image" height="80px" width="150px"/>
                                    </td>
                                    <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Title</td>
                                    <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">3</td>
                                    <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">1200</td>
                                    <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">3600</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6"></div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">
                                            <tbody>
                                            <tr class="even pointer">
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Sub Total</td>
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">$ 3600</td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Shipping Fee</td>
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">$ 150</td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Discount</td>
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">$ 70</td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Vat</td>
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">$ 10</td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">TOTAL</td>
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">3830</td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Payment Method</td>
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Bkash</td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Payment Status</td>
                                                <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Unpaid</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
