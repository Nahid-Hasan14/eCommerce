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
                            <th class="column-title">Items </th>
                            <th class="column-title">Price </th>
                            <th class="column-title">Status </th>
                            <th class="column-title">Action </th>
                            {{-- <th class="column-title">Description</th> --}}
                          </tr>
                        </thead>
                        {{-- <pre>{{ print_r($products, true)}}</pre> --}}

                            <tbody>
                          <tr class="even pointer">
                            <td class="text-cen align-middle ">#E9723</td>
                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Md Jobbar Ali</td>
                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">02/aug/25</td>
                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">2</td>
                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">420</td>
                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">Pending</td>
                            {{-- <td class="text-cen align-middle " style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$product->description}}</i></td> --}}
                            <td class="text-cen align-middle">
                                <a href="{{route('order.details')}}" class="btn btn-dark btn-sm">View</a>
                            </td>
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
@endsection
