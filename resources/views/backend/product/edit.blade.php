{{-- <pre>{{print_r($products, true)}}</pre> --}}
@extends('backend.layouts.master')

@section('title', 'Product Edit')

@section('content')
    <div class="right_col" role="main">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <form action="{{route('product.update', $product->id)}}" method="POST"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="dashboard_graph">
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>product Edit</h2>
                                        <a href="{{route('product.index')}}" class="btn btn-info btn-sm pull-right">Manage</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />
                                        {{-- For errors mrssage --}}
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                         <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <label for="title">Product Category<span class="required">*</span></label>
                                                <select class="form-control">
                                                    <option value="">-- Select Category --</option>
                                                    <option value="mobile">Mobile</option>
                                                    <option value="camera">Camera</option>
                                                    <option value="electronics">Electronics</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="title">Product Brand<span class="required">*</span></label>
                                                <select class="form-control">
                                                    <option value="">-- Select Brand --</option>
                                                    <option value="sumsung">Sumsung</option>
                                                    <option value="vivo">Vivo</option>
                                                    <option value="dji">Dji</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label label-align" for="title">Product Title<span class="required">*</span></label>
                                                <input type="text" name="title" value="{{$product->title}}" required class="form-control ">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label label-align" for="first-name">Description<span class="required">*</span></label>
                                                <textarea type="text" name="description" rows="8" id="first-name" required class="form-control ">{{$product->description}}</textarea>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <label class="col-form-label label-align" for="price">Product Price<span class="required">*</span></label>
                                                <input type="number" name="price" step="0.01" value="{{$product->price}}"  required class="form-control ">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label class="col-form-label label-align" for="stock">Product Stock<span class="required">*</span></label>
                                                <input type="number" name="stock" value="{{$product->stock}}"  required class="form-control ">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <label class="col-form-label label-align" for="color">Product Color<span class="required">*</span></label>
                                                <input type="text" name="color" value="{{$product->color}}"  required class="form-control ">
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                                <label class="col-form-label label-align" for="size">Product Size<span class="required">*</span></label>
                                                <input type="text" name="size" value="{{$product->size}}" required class="form-control ">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                {{-- <label class="col-form-label label-align"
                                                for="first-name">Image
                                            </label> --}}
                                                <img src="{{asset('storage/' . $product->image)}}" alt="Image" height="200px" width="400px"/>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label label-align" for="first-name">Product Image<span class="required">*</span></label>
                                                <input type="file" name="image" id="first-name" class="form-control ">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <a href="{{route('product.index')}}" class="btn btn-dark" type="button">Back</a>
                                                <button class="btn btn-success" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                                <div class="col-md-3 col-sm-3 bg-white">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Status</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="col-md-12 col-sm-12">
                                                <label>
                                                    <input type="radio" class="flat" name="status" value="1" checked/> Public
                                                </label>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" class="flat" name="status" value="0"/> Draft
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
