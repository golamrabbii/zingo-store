@component('mail::message')

#Order Recieved

Thank you for your order.

**Order ID: #LI{{ $order->id }}

**Orderer Emil: {{ $order->email }}

**Orderer Name: {{ $order->name }}

**Orderer Address: {{ $order->shipping_address }}



**Items Ordered** <br>
@php
	$sub = 0;
@endphp
@foreach ($order->carts as $cart)
	@php
	    $sub_total = $cart->product_quantity * $cart->product->price;
	@endphp
	Product: {{ $cart->product->name }} <br>
	Price: {{ $cart->product->price }} &#2547; <br>
	Quantity: {{ $cart->product_quantity }} <br>
	@php
        $sub += $sub_total;
    @endphp
@endforeach


**Total Amount: {{ $sub }} &#2547;

You can get further details about order by logging into our website.


@component('mail::button', ['url' => url('/customer-invoice', $order->id), 'color' => 'green'])
Invoice
@endcomponent
{{-- <a href="{{ url('/invoice', $order->id) }}" style="margin-bottom: 10px;" class="btn btn-primary btn-sm">Invoice</a> --}}


Thank you again for choosing us.

Regards,<br>
{{ config('app.name') }}


@endcomponent