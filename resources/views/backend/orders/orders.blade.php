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
                    <h2>Orders Manage: {{ ucwords($status?? 'All Orders')}}</h2>
                        <div class="form-group pull-right top_search">
                            <div class="input-group">
                                <input id="productSearch" type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Search</button>
                                </span>
                                <div id="searchResults"
                                    style="position:absolute; margin-top:5px; top:100%; left:0; right:0;
                                        background:#fff; border:1px solid #ddd;
                                        z-index:9999; display:none; max-height:250px;
                                        overflow-y:auto;">
                                </div>
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
                                        <a href="{{route('admin.order.details', $order->id)}}" class="btn btn-dark btn-sm">View</a>
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

@push('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("productSearch");
        const resultsBox = document.getElementById("searchResults");

        searchInput.addEventListener("keyup", function() {
            let query = this.value.trim();

            if(query.length < 3) {
                resultsBox.style.display = "none";
                return;
            }

            $.ajax({
                url: `/admin/search-order?q=${query}`,
                type: "GET",
                dataType: "json",
                success: function(responce) {
                    console.log(responce)

                    if(responce.html.trim() !== '') {
                        resultsBox.innerHTML = responce.html;
                        resultsBox.style.display = "block";
                    } else {
                        resultsBox.innerHTML = '<div style="padding:8px;">No products found</div>';
                        resultsBox.style.display = "block";
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                    resultsBox.innerHTML = '<div style="padding:8px; color: red;">Sorry, an error occurred while searching.</div>';
                    resultsBox.style.display = "block";
                }
            })
        })

        //click out of input hide search result
        document.addEventListener("click", function(e) {
            if (!searchInput.contains(e.target) && !resultsBox.contains(e.target)) {
                resultsBox.style.display = "none";
            }
        })
    })
</script>
@endpush
