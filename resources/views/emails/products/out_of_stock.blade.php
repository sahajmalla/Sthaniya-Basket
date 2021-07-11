@component('mail::message')
# Hey {{ $userTrader->firstname }},

<p>Your product {{ $product->prod_name }} with the id: {{ $product->id}} is out of stock.</p>
<p>Please restock the {{ $product->prod_name }} if you wish to keep selling it.</p> 

@component('mail::button', ['url' => 'http://localhost:8000/products'])
    View Product
@endcomponent

Thanks,<br>
Sthaniya Basket
@endcomponent
