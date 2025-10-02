@extends('frontend.layouts.master')

@section('title', 'Product Details')
@push('style')
<style>
    .thumbnail img {
        height: 62px;
        width: auto;
        object-fit: cover;
    }
</style>
@endpush
@section('content')
  <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Product Details</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li>Product Details</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mb-80">
                                <div class="row">
                                    <!-- imgs-zoom-area start -->
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="imgs-zoom-area">
                                            <img id="main_image" src="{{ asset('storage/'.$data['product']->image) }}" height="300px" alt="{{$data['product']->title }}">
                                            @php
                                                $images = explode('|',$data['product']->images)
                                            @endphp
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                                        {{-- First thamnail --}}
                                                        <div class="p-c">
                                                            <a href="#" class="thumbnail" data-image="{{ asset('storage/'.$data['product']->image) }}" data-zoom-image="img/product/2.jpg">
                                                                <img src="{{ asset('storage/'.$data['product']->image) }}" alt="{{$data['product']->title }}">
                                                            </a>
                                                        </div>
                                                        @foreach ($images as $image)
                                                            <div class="p-c">
                                                            <a href="#" class="thumbnail" data-image="{{ asset('storage/'.$image) }}" data-zoom-image="img/product/2.jpg">
                                                                <img src="{{ asset('storage/'.$image) }}" height="62px" alt="{{$data['product']->title }}">
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- imgs-zoom-area end -->
                                    <!-- single-product-info start -->
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <div class="single-product-info">
                                            <h3 class="text-black-1">{{$data['product']->title}}</h3>
                                            <h6 class="brand-name-2">Brand: {{$data['product']->brand->name}}</h6>
                                            <!--  hr -->
                                            <hr>
                                            <!-- single-pro-color-rating -->
                                            <div class="single-pro-color-rating clearfix">
                                                <div class="sin-pro-color f-left">
                                                    <p class="f-left" style="font-size: 16px">Color: {{ucwords($data['product']->color)}}</p> <br>
                                                    <p class="f-left" style="font-size: 16px">Size: {{ucwords($data['product']->size)}}</p> <br>
                                                    <p class="f-left" style="font-size: 16px">Stock: {{ucwords($data['product']->stock)}}</p>
                                                </div>
                                                {{-- <div class="pro-rating sin-pro-rating f-right">
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <span class="text-black-5">( 27 Rating )</span>
                                                </div> --}}
                                            </div>
                                            <!-- hr -->
                                            <hr>
                                            <!-- single-product-price -->
                                            <h3 class="pro-price">Price: {{__('currency')}} {{$data['product']->price}}</h3>
                                            <!--  hr -->
                                            <hr>
											<div>
												<a href="javascript:void(0)" onclick="addToCart({{ $data['product']->id }})" class="button extra-small button-black" >
													<span class="text-uppercase">Add to cart</span>
												</a>
											</div>
                                        </div>
                                    </div>
                                    <!-- single-product-info end -->
                                </div>
								<!-- single-product-tab -->
								<div class="row">
									<div class="col-md-12">
										<!-- hr -->
										<hr>
										<div class="single-product-tab">
											<ul class="reviews-tab mb-20">
												<li  class="active"><a href="#description" data-toggle="tab">description</a></li>
												{{-- <li ><a href="#information" data-toggle="tab">information</a></li>
												<li ><a href="#reviews" data-toggle="tab">reviews</a></li> --}}
											</ul>
											<div class="tab-content">
												<div role="tabpanel" class="tab-pane active" id="description">
													<p>{{$data['product']->description}}</p>
												</div>
												{{-- <div role="tabpanel" class="tab-pane" id="information">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, neque fugit inventore quo dignissimos est iure natus quis nam illo officiis,  deleniti consectetur non ,aspernatur.</p>
													<p>rerum blanditiis dolore dignissimos expedita consequatur deleniti consectetur non exercitationem.</p>
												</div> --}}
												{{-- <div role="tabpanel" class="tab-pane" id="reviews">
													<!-- reviews-tab-desc -->
													<div class="reviews-tab-desc">
														<!-- single comments -->
														<div class="media mt-30">
															<div class="media-left">
																<a href="#"><img class="media-object" src="{{asset('frontend')}}/img//author/1.jpg" alt="#"></a>
															</div>
															<div class="media-body">
																<div class="clearfix">
																	<div class="name-commenter pull-left">
																		<h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
																		<p class="mb-10">27 Jun, 2017 at 2:30pm</p>
																	</div>
																	<div class="pull-right">
																		<ul class="reply-delate">
																			<li><a href="#">Reply</a></li>
																			<li>/</li>
																			<li><a href="#">Delate</a></li>
																		</ul>
																	</div>
																</div>
																<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas .</p>
															</div>
														</div>
														<!-- single comments -->
														<div class="media mt-30">
															<div class="media-left">
																<a href="#"><img class="media-object" src="{{asset('frontend')}}/img//author/2.jpg" alt="#"></a>
															</div>
															<div class="media-body">
																<div class="clearfix">
																	<div class="name-commenter pull-left">
																		<h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
																		<p class="mb-10">27 Jun, 2017 at 2:30pm</p>
																	</div>
																	<div class="pull-right">
																		<ul class="reply-delate">
																			<li><a href="#">Reply</a></li>
																			<li>/</li>
																			<li><a href="#">Delate</a></li>
																		</ul>
																	</div>
																</div>
																<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas .</p>
															</div>
														</div>
													</div>
												</div> --}}
											</div>
										</div>
										<!--  hr -->
										<hr>
									</div>
								</div>
                            </div>
                            <!-- single-product-area end -->
                            <div class="related-product-area">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title text-left mb-40">
                                            <h2 class="uppercase">related product</h2>
                                            <h6>There are many variations of passages of brands available,</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="active-related-product">
                                        <!-- product-item start -->
                                        @foreach ($data['reletedProducts'] as $reletedProduct)
                                            <div class="col-xs-12">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="{{route('product.details', $reletedProduct->id)}}">
                                                            <img src="{{asset('storage/'.$reletedProduct->image)}}" alt="{{$reletedProduct->title}}" height="200px"/>
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title">
                                                            <a href="{{route('product.details', $reletedProduct->id)}}">{{$reletedProduct->title}}</a>
                                                        </h6>
                                                        <div class="pro-rating">
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                        </div>
                                                        <h3 class="pro-price">{{__('currency')}} {{$reletedProduct->price}}</h3>
                                                        <ul class="action-button">
                                                            <li>
                                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="productQuickViewModal" data-id="{{ $reletedProduct->id }}"><i class="zmdi zmdi-zoom-in"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" onclick="addToCart({{ $reletedProduct->id }})" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- product-item end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <!-- widget-categories -->
                            <!-- widget-product -->
                            <aside class="widget widget-product box-shadow">
                                <h6 class="widget-title border-left mb-20">recent products</h6>
                                <!-- product-item start -->
                                @foreach ($data['recentProducts'] as $recentProduct)
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="{{route('product.details', $recentProduct->id)}}">
                                                <img src="{{asset('storage/'.$recentProduct->image)}}" alt="{{$recentProduct->title}}" height="80px"/>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="{{route('product.details', $recentProduct->id)}}">{{$recentProduct->title}}</a>
                                            </h6>
                                            <h3 class="pro-price">{{__('currency')}} {{$recentProduct->price}}</h3>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- product-item end -->
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->

        </section>
@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelectorAll('.thumbnail');
        const mainImage = document.getElementById('main_image');

        thumbnails.forEach(function(thumbnail) {
            thumbnail.addEventListener('click', function(e) {
                e.preventDefault();

                const newImage = this.getAttribute('data-image');
                mainImage.setAttribute('src', newImage);
            });
        });
    });
</script>
@endpush
