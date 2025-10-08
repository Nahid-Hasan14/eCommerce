@extends('backend.layouts.master')

@section('title', 'Product Manage')

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
                    <h2>Products Manage: {{ ucwords($status?? 'All Products') }}</h2>
                    {{-- <button class="btn btn-dark btn-sm pull-right">Edit</button> --}}
                    <a href="{{route('admin.product.create')}}" class="btn btn-primary btn-sm pull-right">Create</a>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Id</th>
                            <th class="column-title">Image </th>
                            <th class="column-title">Title </th>
                            <th class="column-title">Stock </th>
                            <th class="column-title">Color </th>
                            <th class="column-title">Size </th>
                            <th class="column-title">Price </th>
                            {{-- <th class="column-title">Description</th> --}}
                            <th class="column-title">Status</th>
                            <th class="column-title">Action </th>
                          </tr>
                        </thead>
                        {{-- <pre>{{ print_r($products, true)}}</pre> --}}
                        @foreach ($products as $product)
                            <tbody>
                          <tr class="even pointer">
                            <td class="text-cen align-middle ">{{$product->id}}</td>
                            <td class="text-cen align-middle ">
                                @if ($product->image)
                                   <img src="{{asset('storage/' . $product->image)}}" alt="Image" height="80px" width="150px"/>
                                @else
                                  <h3>No Image Found</h3>
                                @endif
                            </td>
                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$product->title}}</td>
                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$product->stock}}</td>
                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$product->color}}</td>
                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$product->size}}</td>
                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$product->price}}</td>
                            {{-- <td class="text-cen align-middle " style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$product->description}}</i></td> --}}
                            <td class="text-cen align-middle ">{{$product->status == 1 ? 'Public' : 'Draft'}}</td>
                            <td class="text-cen align-middle">
                                @if ($product->status == 1)
                                    <a href="{{route('admin.product.status' , $product->id)}}" class="btn btn-dark btn-sm">Disable</a>
                                @else
                                     <a href="{{route('admin.product.status', $product->id)}}" class="btn btn-dark btn-sm">Enable</a>
                                @endif
                                <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{route('admin.product.delete', $product->id)}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
