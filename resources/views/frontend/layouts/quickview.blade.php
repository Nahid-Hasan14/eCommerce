
<div class="modal-product clearfix">
    <div class="product-images">
        <div class="main-image images">
            <img alt="{{$product->title}}" src="{{asset('storage/'.$product->image)}}" height="400px">
        </div>
    </div><!-- .product-images -->

    <div class="product-info">
        <h1>{{ $product->title }}</h1>
        <div class="price-box-3">
            <div class="s-price-box">
                <span class="new-price">{{__('currency')}} {{$product->price}}</span>
                <span class="old-price">£190.00</span>
            </div>
        </div>
        <a href="{{route('product.details', $product->id)}}" class="see-all">See Details</a>
        <div class="quick-add-to-cart">
            <div class="cart">
                <button class="single_add_to_cart_button add-to-cart"  onclick="addToCart({{ $product->id }})">Add to cart</button>
            </div>
        </div>
        <div class="quick-desc">
            {{$product->description}}
        </div>
        <div class="social-sharing">
            <div class="widget widget_socialsharing_widget">
                <h3 class="widget-title-modal">Share this product</h3>
                <ul class="social-icons clearfix">
                    <li>
                        <a class="facebook" href="#" target="_blank" title="Facebook">
                            <i class="zmdi zmdi-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a class="google-plus" href="#" target="_blank" title="Google +">
                            <i class="zmdi zmdi-google-plus"></i>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="#" target="_blank" title="Twitter">
                            <i class="zmdi zmdi-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a class="pinterest" href="#" target="_blank" title="Pinterest">
                            <i class="zmdi zmdi-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a class="rss" href="#" target="_blank" title="RSS">
                            <i class="zmdi zmdi-rss"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- .product-info -->
</div><!-- .modal-product -->
