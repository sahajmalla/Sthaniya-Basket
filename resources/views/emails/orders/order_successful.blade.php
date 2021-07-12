@component('mail::message')
# Hey {{ auth()->user()->firstname }},

<p>Your Order has been placed successfully!</p>
<p>Thank you for shopping with us.</p>
<p>You order and payment ID is: {{ $order->id }}.</p>
<p>Collection day: {{ $order->collection_day }}.</p>
<p>Collection time: {{ $order->collection_time }}pm.</p>

<p>Here is your invoice</p>

<table class="table" cellspacing="15">
    <thead>
        <tr>
            <th>Product name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->productPurchaseds as $item)
            <tr>
                <td scope="row">{{ $item->product->prod_name }}</td>
                <td>{{ $item->prod_quantity }}</td>
                <td>£{{ number_format((float) $item->product->price, 2, '.', '') }}</td>
                <td>£{{ number_format((float) $item->total_price, 2, '.', '') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p>Grand Total : £{{$order->order_total}}</p>

@component('mail::button', ['url' => route('order')])
    View Order Details
@endcomponent

Thanks,<br>
Sthaniya Basket
@endcomponent
