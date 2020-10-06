@extends('admin.main')

@section('title')
    Orders - eBuy
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header">
                  View Order #LI{{ $order->id }}
                </div>
                <div class="card-body">
                  <h4 class="card-title">Order information</h4>
                  
                  {{-- <p class="card-description">
                    Add class
                    <code>.table-striped</code>
                  </p> --}}
                  {{-- <p>
                  	<a href="{{ url('/add_order') }}" style="text-decoration: underline; font-size: 13px; float: right;
                  	margin-bottom: 20px; ">+ Add brands</a>
                  </p> --}}
                  <div class="row">
                    <div class="col-md-8 border-right">
                      <p><strong>Orderer name: </strong>{{ $order->name }}</p>
                      <p><strong>Orderer Phone: </strong>{{ $order->phone }}</p>
                      <p><strong>Orderer email: </strong>{{ $order->email }}</p>
                      <p><strong>Orderer shipping address: </strong>{{ $order->shipping_address }}</p>
                    </div>
                    <div class="col-md-4">
                      <p><strong>Orderer payment: </strong>{{ $order->payment->name }}</p>
                      <p><strong>Orderer transection id: </strong>{{ $order->transection_id }}</p>
                    </div>
                  </div>
                  
                  <hr>

                  <h4>Order items</h4>
                  @if ($order->carts->count() > 0)
                                    <div class="product-cart-area pt-120 pb-130">
                <div class="container">
                    @include('admin.partials.messages')
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
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
                                        @foreach ($order->carts as $cart)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    {{ $loop->index + 1 }}
                                                </td>
                                                <td>
                                                    <a href="{{ url('/product', $cart->product->slug) }}">{{ $cart->product->name }}</a>
                                                </td>
                                                <td>
                                                    @php $i=1; @endphp

                                                    @foreach ($cart->product->images as $image)
                                                        
                                                        @if ($i > 0)
                                                            <a href="#"><img style="width: 80px;" src="{{ asset('images/products/'. $image->image) }}" alt=""></a>
                                                        @endif
                                                        
                                                        @php $i--; @endphp

                                                    @endforeach
                                                    
                                                </td>
                                                <td><span class="amount">&#2547; {{ $cart->product->price }}</span></td>
                                                <td>
                                                    <form action="{{ url('/cart_update', $cart->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                    <div class="quantity-range">
                                                        <input style="width: 50px;padding-left: 5px" name="product_quantity" class="input-text qty text" type="number" step="1" min="0" value="{{ $cart->product_quantity }}" title="Qty" size="4">
                                                    </div>
                                                    
                                                        <div class="update-cart">
                                                            <button class="custom_btn-style"><span><i class="fa fa-check" aria-hidden="true"></i></span></button>
                                                        </div>
                                                    </form>
                                                </td>
                                                @php
                                                    $sub_total = $cart->product_quantity * $cart->product->price;
                                                @endphp
                                                
                                                <td>&#2547; {{ $sub_total }}</td>
                                                <td>
                                                    {{-- <form action="{{ url('/cart_delete', $cart->id) }}" method="post">
                                                        {{ csrf_field() }} --}}
                                                        <a class="custom_delete" href="#deleteModal{{ $cart->id }}" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
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
                                                $qty = $cart->product_quantity;
                                                $user = App\User::where('id', $cart->user_id)->first();
                                            @endphp
                                        @endforeach
                                        @php
                                            $tax = App\Setting::first()->tax;
                                            $with_tax_total = $sub * ( $tax/100 );
                                            $shipping_cost = $qty * App\Setting::first()->shipping_cost;

                                            if ($user->city == "Dhaka") {
                                                $shipping_cost = $shipping_cost + 30;
                                            }
                                            else {
                                                $shipping_cost = $shipping_cost + 60;
                                            }

                                            $total = $sub + $with_tax_total + $shipping_cost;
                                        @endphp
                                       
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td colspan="5" style="text-align: right;">Shipping</td>
                                        <td colspan="2">&#2547; {{ $shipping_cost }}</td>
                                      </tr>
                                      <tr>
                                        <td colspan="5" style="text-align: right;">Total amount</td>
                                        <td colspan="2"><strong>&#2547; {{ $total }}</strong></td>
                                      </tr>
                                    </tfoot>
                                </table>
                                @endif
                                <a href="{{ url('/invoice', $order->id) }}" style="margin-bottom: 10px;" class="btn btn-primary btn-sm">Generate Invoice</a>
                                {{-- <form action="{{ url('/invoice', $order->id) }}" method="get" style="margin-bottom: 10px;">
                                    {{ csrf_field() }}
                                    <input style="font-size: 12px;" type="submit" name="" value="Generate Invoice" class="btn btn-primary btn-sm">
                                  </form> --}}
                                <div style="display: flex;">
                                  @if ($order->is_completed)
                                  <form action="{{ url('/completed', $order->id) }}" method="post" style="margin-right: 10px;">
                                    {{ csrf_field() }}
                                    <input style="font-size: 12px;" type="submit" name="" value="Complete order" class="btn btn-danger btn-sm">
                                  </form>
                                @else
                                  <form action="{{ url('/completed', $order->id) }}" method="post" style="margin-right: 10px;">
                                    {{ csrf_field() }}
                                    <input style="font-size: 12px;" type="submit" name="" value="Complete order" class="btn btn-success btn-sm">
                                  </form>
                                @endif

                                @if ($order->is_paid)
                                  <form action="{{ url('/paid', $order->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input style="font-size: 12px;" type="submit" name="" value="Paid order" class="btn btn-danger btn-sm" >
                                  </form>
                                @else
                                  <form action="{{ url('/paid', $order->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input style="font-size: 12px;" type="submit" name="" value="Paid order" class="btn btn-success btn-sm">
                                  </form>
                                @endif
                                </div>
                                
                                
                                
                              </div>
                            </div>
                          </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
@endsection