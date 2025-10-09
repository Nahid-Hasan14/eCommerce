@foreach ($orders as $order)
<a href="{{route('admin.order.details', [$order->id, Str::slug($order->order_number)]) }}" class="search-item"
     style="padding:8px; border-bottom:1px solid #eee; cursor:pointer; display:flex; align-items:center; justify-content:space-between;">

     <span style="color: #000">{{ $order->order_number }}</span>
     <span class="pull-right"> 📞 {{ $order->phone }}</span>
</a>
@endforeach
