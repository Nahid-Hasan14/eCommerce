{{-- <pre>{{print_r($products, true)}}</pre> --}}
@extends('backend.layouts.master')

@section('title', 'Product Edit')

@push('style')
  //Style for Multiple image delete button
<style>
    .image-wrapper {
        position: relative;
        display: inline-block;
        overflow: hidden;
        margin-right: 7px;
    }

    .image-wrapper img {
        display: block;
        transition: 0.3s ease;
        border-radius: 8px;
    }

    .image-wrapper:hover img {
        opacity: 0.6;
    }

    .image-wrapper .delete-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(255, 0, 0, 0.8);
        color: #fff;
        font-size: 20px;
        padding: 8px 14px;
        border-radius: 50%;
        text-decoration: none;
        opacity: 0;
        transition: 0.3s ease;
    }

    .image-wrapper:hover .delete-btn {
        opacity: 1;
    }
</style>

@endpush

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
                                                <label for="category_id">Category<span class="required">*</span></label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option value="">-- Select Category --</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                                <label for="brand_id">Brand<span class="required">*</span></label>
                                                <select name="brand_id" id="brand_id" class="form-control">
                                                    <option value="">-- Select Brand --</option>
                                                    @foreach ($brands as $brand)
                                                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label label-align" for="title">Title<span class="required">*</span></label>
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
                                                <label class="col-form-label label-align" for="price">Price<span class="required">*</span></label>
                                                <input type="number" name="price" step="0.01" value="{{$product->price}}"  required class="form-control ">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label class="col-form-label label-align" for="stock">Stock<span class="required">*</span></label>
                                                <input type="number" name="stock" value="{{$product->stock}}"  required class="form-control ">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <label class="col-form-label label-align" for="color">Color<span class="required">*</span></label>
                                                <input type="text" name="color" value="{{$product->color}}"  required class="form-control ">
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                                <label class="col-form-label label-align" for="size">Size<span class="required">*</span></label>
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
                                                <label class="col-form-label label-align" for="image">Cover Photo<span class="required"></span></label>
                                                <input type="file" name="image" id="image" class="form-control ">
                                            </div>
                                        </div>
                                        @if ($product->images)
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 images-gap">
                                                @foreach (explode('|', $product->images) as $key => $image)
                                                <div class="image-wrapper position-relative">
                                                    <img src="{{asset('storage')}}/{{$image}}" class="images" id="{{$key}}" alt="Image" height="150px" width="150px"/>
                                                    <a class="delete-btn" href="{{$product->id . '/' . $key}}">X</a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label label-align" for="images">Images<span class="required"></span></label>
                                                <input type="file" name="images[]" id="images" class="form-control" multiple>
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

@push('script')

<script>

    let image = document.getElementsByClassName("delete-btn");


    for(let i=0; i<image.length; i++ ){
            image[i].addEventListener("click", function(e){
            e.preventDefault();
            let image_href = e.target.href.split('/').reverse();
            let image_index = image_href[0];


            $.ajax({
                type: "POST",
                url:"{{route('product.image.delete')}}",
                dataType: "json",
                data: {
                        image_index:image_index,
                        _token:"{{csrf_token()}}"
                    },

                success: function(res){
                    // console.log(res)
                    if(res.success) {
                        e.target.classList.add('d-none')
                        document.getElementById(res.image_index).classList.add('d-none')

                        console.log(res.message)
                    }
                },

                error: function(error){
                    console.log(error)
                }
            })
        });
    }
</script>

@endpush

