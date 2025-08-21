@extends('backend.layouts.master')

@section('title', 'Product Create')

@section('content')
    <div class="right_col" role="main">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="dashboard_graph">
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Product Create</h2>
                                        <a href="" class="btn btn-info btn-sm pull-right">Manage</a>
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
                                                    @foreach ($categories as $category)
                                                       <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label for="title">Product Brand<span class="required">*</span></label>
                                                <select class="form-control">
                                                    <option value="">-- Select Brand --</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label label-align" for="title">Product Title<span class="required">*</span></label>
                                                <input type="text" name="title" required class="form-control ">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label label-align" for="first-name">Description<span class="required">*</span></label>
                                                <textarea type="text" name="description" rows="8" id="first-name" required class="form-control "></textarea>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <label class="col-form-label label-align" for="title">Product Price<span class="required">*</span></label>
                                                <input type="number" name="price" step="0.01" required class="form-control ">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label class="col-form-label label-align" for="title">Product Stock<span class="required">*</span></label>
                                                <input type="number" name="stock" required class="form-control ">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <label class="col-form-label label-align" for="title">Product Color<span class="required">*</span></label>
                                                <input type="text" name="color" required class="form-control ">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label class="col-form-label label-align" for="title">Product Size<span class="required">*</span></label>
                                                <input type="text" name="size" required class="form-control ">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label label-align" for="first-name">product Image<span class="required">*</span></label>
                                                <input type="file" id="first-name" name="image" required class="form-control ">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <a href="{{route('product.index')}}" class="btn btn-dark" type="button">Back</a>
                                                <button class="btn btn-success" type="submit">Create</button>
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
                                                    <input type="radio"  name="status" value="1" checked/> Public
                                                </label>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="status" value="0"/> Draft
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
