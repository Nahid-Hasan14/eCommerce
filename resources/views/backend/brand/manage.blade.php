@extends('backend.layouts.master')

@section('title', 'brand')

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
                    <h2>Brand Manage</h2>
                    {{-- <button class="btn btn-dark btn-sm pull-right">Edit</button> --}}
                    <a href="{{route('brand.create')}}" class="btn btn-primary btn-sm pull-right">Create</a>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Id</th>
                            <th class="column-title">Image </th>
                            <th class="column-title">Brand </th>
                            {{-- <th class="column-title">Description</th> --}}
                            <th class="column-title">Status</th>
                            <th class="column-title">Action </th>
                          </tr>
                        </thead>
                        {{-- <pre>{{ print_r($categories, true)}}</pre> --}}
                        @foreach ($brands as $brand)
                            <tbody>
                          <tr class="even pointer">
                            <td class="text-cen align-middle ">{{$brand->id}}</td>
                            <td class="text-cen align-middle ">
                                @if ($brand->image)
                                   <img src="{{asset('storage/' . $brand->image)}}" alt="Image" height="80px" width="150px"/>
                                @else
                                  <h3>No Image Found</h3>
                                @endif
                            </td>
                            <td class="text-cen align-middle " style="max-width: 150px; word-wrap: break-word;">{{$brand->name}}</td>
                            {{-- <td class="text-cen align-middle " style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$brand->description}}</i></td> --}}
                            <td class="text-cen align-middle ">{{$brand->status== 1 ? "Public" : "Draft"}}</td>
                            <td class="text-cen align-middle">
                                @if ($brand->status == 1)
                                <a href="{{route('brand.status', $brand->id)}}" class="btn btn-dark btn-sm">Disable</a>
                                @else
                                <a href="{{route('brand.status', $brand->id)}}" class="btn btn-dark btn-sm">Enable</a>
                                @endif
                                <a href="{{route('brand.edit', $brand->id)}}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{route('brand.delete', $brand->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
