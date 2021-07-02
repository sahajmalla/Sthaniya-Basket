@component('mail::message')
# Hey {{ auth()->user()->firstname }},

<p>Your shop {{$shop->shopName }} has been created successfully!</p>

@component('mail::button', ['url' => ''])
    View Shop
@endcomponent

Thanks,<br>
Sthaniya Basket
@endcomponent
