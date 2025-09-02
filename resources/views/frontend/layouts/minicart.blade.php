@foreach ($items as $item)
<div id="minicart" class="single-cart clearfix">
    <div class="row">
        <div class="col-md-3">
            <div class="cart-img f-left">
            <a href="#">
                <img src="{{ asset('storage') }}/{{$item->attributes->image}}" height="120px" width="100px"  alt="Cart Product" />
            </a>
            {{-- <div class="del-icon">
                <a href="#">
                    <i class="zmdi zmdi-close"></i>
                </a>
            </div> --}}
            </div>
        </div>
        <div class="col-md-9">
        <div class="cart-info">
        <h6 class="text-capitalize">
            <a href="#">{{$item->name}}</a><br>
            Price: ${{number_format($item->price)}}
        </h6>
        </div>
        </div>
</div>
@endforeach
