<x-mail::message>
@if(auth('customer')->check())
    <h2>Thank You{{ ucfirst(auth('customer')->user()->name) }}!</h2>
@endif

Your order has been placed successfully.


Order ID: #{{ $order->order_number }}

**Total:** ${{ number_format($order->total_price, 2) }}

@component('mail::button', ['url' => route('customer.profile', $order->id)])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
