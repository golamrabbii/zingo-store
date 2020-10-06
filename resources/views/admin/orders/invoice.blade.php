<!DOCTYPE html>
<html>
<head>
  <title>
    Invoice - #EB{{ $order->id }}
  </title>

    <link rel="stylesheet" href="{{asset('admin_css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/ebuy_small.png')}}" />
    {{-- datatable --}}
    <link rel="stylesheet" href="{{asset('admin_css/datatables.min.css')}}">
    <style type="text/css">
      .content-wrapper {
        background-color: #fff;
      }
      .head-invoice {
        background-color: #eee;
      }
      .site-logo {
        padding-top: 35px;
        padding-left: 20px;
      }
      .site-address {
        padding-top: 20px;
        padding-right: 20px;
      }
      .invoice-right-top h3 {
        padding-right: 20px;
        margin-top: 20px;
        color: #0ec591;
      }
      .invoice-left-top {
        border-left: 4px solid #0ec591;
        padding-left: 20px;
        padding-top: 20px;
      }
      .description-invoice {
        margin-top: 15px;
      }
      thead {
        background-color: #0ec591;
        color: #fff;
        font-weight: 600;
      }
      .authority h6 {
          margin-top: 20px;
          color: #0ec591;
        }
          .thanks p {
            color: #333;
            font-weight: normal;
            margin-top: 20px;
            font-family: sans-serif;
          }
          .site-address p {
            line-height: 6px;
          }
          .address p {
            line-height: 6px;
          }
    </style>
</head>
<body>

  <div class="content-wrapper">
    <div class="head-invoice">
      <div class="float-left site-logo">
        <?php $image_path = '/images/zingo.png'; ?>
          <img src="{{public_path() . $image_path}}" alt="logo" style="width: 20%;" />
      </div>
      <div class="float-right site-address">
        {{-- <h3 style="font-weight: 600">Zingo <strong style="font-size: 16px;">online shop</strong></h3> --}}
            <table style="padding-top: 10px;">
                <tr>
                    <td><p><b>Address</b></p></td>
                    <td style="width: 10px;"><p><b>:</b></p></td>
                    <td><p>Rupayan Millennium Square,</p></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width: 10px;"></td>
                    <td><p>Bir Uttam Rafiqul Islam Avenue,</p></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width: 10px;"></td>
                    <td><p>Uttar Badda, Dhaka- 1212</p></td>
                </tr>
                <tr>
                    <td><p><b>Phone</b></p></td>
                    <td style="width: 10px;"><p><b>:</b></p></td>
                    <td><p>+8801312-281055</p></td>
                </tr>
                <tr>
                    <td><p><b>E-mail</b></p></td>
                    <td style="width: 10px;"><p><b>:</b></p></td>
                    <td><p>support@getzingo.co</p></td>
                </tr>
            </table>
            {{-- <p style="padding-top: 10px;"><b>Address:</b> Rupayan Millennium Square,</p>
            <p><b style="display: none;">Address:</b>Bir Uttam Rafiqul Islam Avenue,</p>
            <p><b style="display: none;">Address:</b>Uttar Badda, Dhaka- 1212</p>
            <p><b>Phone:</b> +8801312-281055</p>
            <p><b>E-mail:</b> support@getzingo.co</p> --}}
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="description-invoice">
      <div class="invoice-left-top float-left">
        <h5>Invoice to</h5>
        <h3>{{ $order->name }}</h3>
        <div class="address">
          <p style="padding-top: 10px;"><strong>Shipping address: </strong>{{ $order->shipping_address }}</p>
          <p><strong>Phone: </strong>{{ $order->phone }}</p>
          <p><strong>E-mail: </strong>{{ $order->email }}</p>
        </div>
      </div>
      <div class="invoice-right-top float-right">
        <h3>Invoioce #EB{{ $order->id }}</h3>
        @php
          $timestamp = strtotime($order->created_at);
          $newDate = date('d F, Y', $timestamp);
        @endphp
        <p style="padding-top: -10px; color: #555;">{{ $newDate }}</p>
        <p style="padding-top: 45px;"><strong>Payment method: </strong>{{ $order->payment->name }}</p>
      </div>
      <div class="clearfix"></div>
    </div>
              <h3 style="margin-top: 10px;">Products</h3>
              @if ($order->carts->count() > 0)
                                <table class="table table-bordered table-stripe">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Qantity</th>
                                            <th>Total</th>
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
                                                <td>{{ $cart->product->name }}</td>
                                                <td>BDT. {{ $cart->product->price }}</td>
                                                <td>{{ $cart->product_quantity }}</td>
                                                @php
                                                    $sub_total = $cart->product_quantity * 
                                              
                                                    $cart->product->price;
                                                @endphp
                                                
                                                <td>BDT. {{ $sub_total }}</td>
                                                


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
                                        <td colspan="4" style="text-align: right;">Sub Total</td>
                                        <td colspan="1"><strong>BDT. {{ $sub }}</strong></td>
                                      </tr>
                                      <tr>
                                        <td colspan="4" style="text-align: right;">Shipping</td>
                                        <td colspan="1">BDT. {{ $shipping_cost }}</td>
                                      </tr>
                                      <tr>
                                        <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
                                        <td colspan="1"><strong>BDT. {{ $total }}</strong></td>
                                      </tr>
                                    </tfoot>
                                </table>
                                @endif
                                <div class="thanks mt-3">
                                  <p>** Thank you for your shopping.</p>
                                </div>

                                <div class="authority float-right mt-5">
                                  <?php $image_path = '/images/signature.jpg'; ?>
                                  <img src="{{ public_path() . $image_path }}" width="20%;">
                                  <h6>Authority Signature</h6>
                                </div>
                                <div class="clearfix"></div>
  </div>
</body>
</html>