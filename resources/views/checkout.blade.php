@extends('layouts.main')

@section('title')
    Checkout
@endsection

@section('content')

<div class="wrapper">
    <div class="login-register-wrapper">
        <div class="login-register-tab-list nav" style="margin-top: 40px; margin-bottom: 0px;">
            <a class="active" data-toggle="tab" href="#">
                <h4> Checkout items </h4>
            </a>
        </div>
   		

        <div class="checkout-area pt-130 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="coupon-accordion">
                                <!-- ACCORDION START -->
                                <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                                <div id="checkout-login" class="coupon-content">
                                    <div class="coupon-info">
                                        <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                                        <form action="#">
                                            <p class="form-row-first">
                                                <label>Username or email <span class="required">*</span></label>
                                                <input type="text" />
                                            </p>
                                            <p class="form-row-last">
                                                <label>Password  <span class="required">*</span></label>
                                                <input type="text" />
                                            </p>
                                            <p class="form-row">					
                                                <input type="submit" value="Login" />
                                                <label>
                                                    <input type="checkbox" />
                                                     Remember me 
                                                </label>
                                            </p>
                                            <p class="lost-password">
                                                <a href="#">Lost your password?</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                <!-- ACCORDION END -->	
                                <!-- ACCORDION START -->
                                <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                                <div id="checkout_coupon" class="coupon-checkout-content">
                                    <div class="coupon-info">
                                        <form action="#">
                                            <p class="checkout-coupon">
                                                <input type="text" placeholder="Coupon code" />
                                                <input type="submit" value="Apply Coupon" />
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                <!-- ACCORDION END -->						
                            </div>
                        </div>
                    </div>
                    <form action="{{ url('/checkout_store') }}" method="post">
                                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            {{-- <form action="{{ url('/checkout_store') }}" method="post">
                                {{ csrf_field() }} --}}
                                <div class="checkbox-form">						
                                    <h3>Billing Details</h3>

                                    @include('admin.partials.messages')

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Name <span class="required">*</span></label>										
                                                <input type="text" placeholder="" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" name="name" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Shipping address <span class="required">*</span></label>
                                                <textarea type="text" name="shipping_address" required>{{ Auth::check() ? Auth::user()->street_address.', '.Auth::user()->city : '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Email Address <span class="required">*</span></label>										
                                                <input type="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" name="email" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Phone  <span class="required">*</span></label>										
                                                <input type="text" value="{{ Auth::check() ? Auth::user()->phone : '' }}" name="phone" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="order-notes">
                                                <div class="checkout-form-list mrg-nn">
                                                    <label>Order Notes</label>
                                                    <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery." name="message" ></textarea>
                                                </div>                                  
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Payment Method  <span class="required">*</span></label>
                                                <select name="payment_method_id" required id="payments" style="font-size: 13px">
                                                <option value="">Select a payment method</option>
                                                <!-- <option value="">Cash on Delivery</option> -->
                                                @foreach ($payments as $payment)
                                                    <option style="font-size: 13px" value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                                                @endforeach
                                                </select>

                                                @foreach ($payments as $payment)
                                                        
                                                        @if ($payment->short_name == "cash")
                                                            <div class="hidden" id="payment_{{ $payment->short_name }}">
                                                                <div class="card mt-2">
                                                                    <div class="card-body">
                                                                        <h4>For <span style="color: #a5a85a;">Cash on Delivery</span>, there is nothing necessary. Just click on finish. </h4>
                                                                        <br>
                                                                        <small>You will get your product within 2 or 3 working days.</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="hidden" id="payment_{{ $payment->short_name }}">
                                                                <div class="card mt-2">
                                                                    <div class="card-body">
                                                                        <h4>{{ $payment->name }} Payment</h4>
                                                                        <br>
                                                                        <p>
                                                                            <strong>{{ $payment->name }} No.: </strong>{{ $payment->no }}
                                                                            <br>
                                                                            <strong>Account type: </strong>{{ ucfirst($payment->type) }}
                                                                        </p>
                                                                        <br>
                                                                            <small>Please send the above money to confirm your order. And give <span style="color: #a5a85a;">Transection number</span> below there.</small>

                                                                            
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        @endif

                                                @endforeach
                                                <div class="checkout-form-list hidden" style="padding-top: 20px;" id="transection">
                                                    <input style="font-size: 13px;" name="transection_id" type="text" value="" placeholder="Transection id" />
                                                </div>
                                            </div>
                                        </div>
                                        			
                                    </div>

                                </div>
                               
                            {{-- </form> --}}
                        </div>	
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name" style="font-weight: 600;">Product</th>
                                                <th class="product-total" style="font-weight: 600;">Total</th>
                                            </tr>							
                                        </thead>
                                        <tbody>
                                            @php
                                                $sub = 0;
                                            @endphp
                                        	@foreach (App\Cart::totalCarts() as $cart)
                                                @php
                                                    $sub_total = $cart->product_quantity * $cart->product->price;
                                                @endphp
	                                            <tr class="cart_item">
	                                                <td class="product-name">
	                                                    {{ $cart->product->name }} <strong class="product-quantity"> × {{ $cart->product_quantity }}</strong>
	                                                </td>
	                                                <td class="product-total">
	                                                    <span class="amount">&#2547; {{ $cart->product->price * $cart->product_quantity }}</span>
	                                                </td>
	                                            </tr>
	                                            {{-- <tr class="cart_item">
	                                                <td class="product-name">
	                                                    Vestibulum dictum	<strong class="product-quantity"> × 1</strong>
	                                                </td>
	                                                <td class="product-total">
	                                                    <span class="amount">£50.00</span>
	                                                </td>
	                                            </tr> --}}
                                                @php
                                                    $sub += $sub_total;
                                                    $qty = $cart->product_quantity;
                                                @endphp
	                                        @endforeach
                                        </tbody>
                                        @php

                                            $tax = App\Setting::first()->tax;
                                            $with_tax_total = $sub * ( $tax/100 );
                                            $shipping_cost = $qty * App\Setting::first()->shipping_cost;

                                            if (Auth::user()->city == "Dhaka") {
                                                $shipping_cost = $shipping_cost + 30;
                                            }
                                            else {
                                                $shipping_cost = $shipping_cost + 60;
                                            }

                                            $total = $sub + $with_tax_total + $shipping_cost;
                                        @endphp
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">&#2547; {{ $sub }}</span></td>
                                            </tr>
                                            <tr class="cart-subtotal">
                                                <th>Shipping cost</th>
                                                <td><span class="amount">&#2547; {{ $shipping_cost }}</span></td>
                                            </tr> 
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">&#2547; {{ $total }}</span></strong>
                                                </td>
                                            </tr>								
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method mt-40">
                                    <div class="payment-accordion">
                                        <div class="panel-group" id="faq">
                                           <!--  <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><a data-toggle="collapse" aria-expanded="true" data-parent="#faq" href="#payment-1">Direct Bank Transfer.</a></h5>
                                                </div>
                                                <div id="payment-1" class="panel-collapse collapse show">
                                                    <div class="panel-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                            </div> -->
                                           <!--  <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-2">Cheque Payment</a></h5>
                                                </div>
                                                <div id="payment-2" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                            </div> -->
                                           <!--  <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-3">PayPal</a></h5>
                                                </div>
                                                <div id="payment-3" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                       {{--  <form action="{{ url('/checkout_store') }}" method="post">
                                            {{ csrf_field() }} --}}

                                            <div class="order-button-payment">
                                                <input type="submit" value="Place order" name="submit" />
                                            </div>
                                            
                                       {{--  </form> --}}
                                        								
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>



    </div>
            
</div>


@endsection
@section('scripts')
    <script type="text/javascript">
        $("#payments").change(function(){
            $payment_mthod = $("#payments").val();
            if ($payment_mthod == "cash") {

                $("#payment_cash").addClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#payment_rocket").addClass('hidden');
                $("#transection").addClass('hidden');


            } else if ($payment_mthod == "bkash") {

                $("#payment_bkash").removeClass('hidden');
                $("#payment_rocket").addClass('hidden');
                $("#payment_cash").addClass('hidden');
                $("#transection").removeClass('hidden');

            } else if ($payment_mthod == "rocket") {

                $("#payment_rocket").removeClass('hidden');
                $("#payment_cash").addClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#transection").removeClass('hidden');

            } else {

                $("#payment_rocket").addClass('hidden');
                $("#payment_cash").addClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#transection").addClass('hidden');

            }

        })
    </script>
@endsection