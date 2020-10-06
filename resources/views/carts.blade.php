@extends('layouts.main')

@section('title')
    Carts list
@endsection

@section('content')

<div class="wrapper">
            {{-- <div class="login-register-area ptb-50"> --}}
                {{-- <div class="container">
                    <div class="row">
                        <div class="col-lg-7 ml-auto mr-auto"> --}}
                            <div class="login-register-wrapper">
                                <div class="login-register-tab-list nav" style="margin-top: 40px; margin-bottom: 0px;">
                                    <a class="active" data-toggle="tab" href="#">
                                        <h4> Carts list </h4>
                                    </a>
                                </div>
                                
                                @if (App\Cart::totalItems() > 0)
                                    <div class="product-cart-area pt-120 pb-130">
                <div class="container">
                    @include('admin.partials.messages')
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">#</th>
                                            <th class="product-name">products name</th>
                                            <th class="product-price">products</th>
                                            <th class="product-name">price</th>
                                            <th class="product-price">quantity</th>
                                            <th class="product-quantity">total</th>
                                            <th class="product-subtotal">delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sub = 0;
                                        @endphp
                                        @foreach (App\Cart::totalCarts() as $cart)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    {{ $loop->index + 1 }}
                                                </td>
                                                <td class="product-name">
                                                    <a href="{{ url('/product', $cart->product->slug) }}">{{ $cart->product->name }}</a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    @php $i=1; @endphp

                                                    @foreach ($cart->product->images as $image)
                                                        
                                                        @if ($i > 0)
                                                            <a href="#"><img style="width: 80px;" src="{{ asset('images/products/'. $image->image) }}" alt=""></a>
                                                        @endif
                                                        
                                                        @php $i--; @endphp

                                                    @endforeach
                                                    
                                                </td>
                                                <td class="product-price"><span class="amount">&#2547; {{ $cart->product->price }}</span></td>
                                                <td class="product-quantity">
                                                    <form action="{{ url('/cart_update', $cart->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                    <div class="quantity-range">
                                                        <input name="product_quantity" class="input-text qty text" type="number" step="1" min="0" value="{{ $cart->product_quantity }}" title="Qty" size="4">
                                                    </div>
                                                    
                                                        <div class="update-cart">
                                                            <button class="custom_btn-style"><span><i class="fa fa-check" aria-hidden="true"></i></span></button>
                                                        </div>
                                                    </form>
                                                </td>
                                                @php
                                                    $sub_total = $cart->product_quantity * $cart->product->price;
                                                @endphp
                                                
                                                <td class="product-subtotal">&#2547; {{ $sub_total }}</td>
                                                <td class="product-cart-icon product-subtotal">
                                                    {{-- <form action="{{ url('/cart_delete', $cart->id) }}" method="post">
                                                        {{ csrf_field() }} --}}
                                                        <a class="custom_delete" href="#deleteModal{{ $cart->id }}" data-toggle="modal"><i class="ti-trash"></i></a>
                                                    {{-- </form> --}}
                                                </td>


                                                <!-- Delete Modal start -->
                                                <div class="modal fade" id="deleteModal{{ $cart->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      {{-- <div class="modal-body">
                                                        ...
                                                      </div> --}}
                                                      <div class="modal-footer">
                                                        <form action="{{ url('/cart_delete', $cart->id) }}" method="post">
                                                          {{ csrf_field() }}
                                                          <button type="submit" class="btn btn-danger" style="font-weight: 400; font-size: 12px;">YES, delete permanently</button>
                                                        </form>
                                                        <button type="button" class="btn btn-success" data-dismiss="modal" style="font-weight: 400; font-size: 12px;">NO</button>
                                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <!-- Delete Modal end -->


                                            </tr>
                                            @php
                                                $sub += $sub_total;
                                            @endphp
                                        @endforeach
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-shiping-update">
                                <div class="cart-shipping">
                                    <a class="btn-style cr-btn" href="{{ url('/') }}">
                                        <span>continue shopping</span>
                                    </a>
                                </div>
                                <div class="update-checkout-cart">
                                    {{-- <form action="{{ url('/cart_update', $cart->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="update-cart">
                                            <button class="btn-style cr-btn"><span>update</span></button>
                                        </div>
                                    </form> --}}
                                    
                                    <div class="update-cart">
                                        <a class="btn-style cr-btn" href="{{ url('/checkout') }}">
                                            <span>checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-sm-6">
                            <div class="discount-code">
                                <!-- <h4>enter your discount code</h4> -->
                                <div class="coupon">
                                    <!-- <input type="text"> -->
                                    <!-- <input class="cart-submit" type="submit" value="enter"> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6">
                            <div class="shop-total">
                                <h3>cart total</h3>
                                <ul>
                                    @php
                                        $tax = App\Setting::first()->tax;
                                        $with_tax_total = $sub * ( $tax/100 );
                                        $shipping_cost = App\Setting::first()->shipping_cost;
                                        $total = $sub + $with_tax_total + $shipping_cost;
                                    @endphp
                                    <li>
                                        sub total
                                        <span style="font-weight: 600;">&#2547; {{ $sub }}</span>
                                    </li>
                                   <!--  <li>
                                        tax ( 5% )
                                        <span>&#2547; {{ $with_tax_total }}</span>
                                    </li> -->
                                   <!--  <li class="order-total">
                                        shipping
                                        <span>&#2547; {{ $shipping_cost }}</span>
                                    </li> -->
                                    <li>
                                        order total
                                        <span style="font-weight: 600;">&#2547; {{ $sub }}</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- <div class="cart-btn text-center mb-15">
                                <a href="#">payment</a>
                            </div> -->
                            <div class="continue-shopping-btn text-center">
                                <a href="{{ url('/') }}">continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                @else
                                    <div class="alert alert-warning" style="margin-top: 20px;">

                                        <h5>
                                            There is no items in your cart.
                                        </h5>

                                        <div class="cart-shipping" style="margin-top: 20px;">
                                            <a class="btn-style cr-btn" href="{{ url('/') }}">
                                                <span>continue shopping</span>
                                            </a>
                                        </div>
                                        
                                    </div>
                                @endif

                           {{--  </div>
                        </div>
                    </div> --}}
                </div>
            {{-- </div> --}}
</div>


@endsection