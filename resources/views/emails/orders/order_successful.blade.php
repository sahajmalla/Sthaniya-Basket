@component('mail::message')
# Hey {{ auth()->user()->firstname }},

<p>Your Order has been placed successfully!</p>
<p>Thank you for shopping with us.</p>
<p>You order ID is: {{ $order->id }}.</p>
<p>Collection day: {{ $order->collection_day }}.</p>
<p>Collection time: {{ $order->collection_time }}pm.</p>

@component('mail::button', ['url' => route('order')])
    View Order Details
@endcomponent

Thanks,<br>
Sthaniya Basket
@endcomponent
