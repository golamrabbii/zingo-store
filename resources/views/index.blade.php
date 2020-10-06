
@extends('layouts.main')

@section('content')

{{-- content --}}
            <div class="container">
                <div class="row">

                    @include('layouts.sidebar')

                    <div class="col-lg-9 custom-margin-top">
                        @include('layouts.slider_image')
                            <div class="shop-topbar-wrapper">
                                <div class="grid-list-options">
                                    <ul class="view-mode">
                                        <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid2"></i></a></li>
                                        <li><a href="#product-list" data-view="product-list"><i class="ti-view-list"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-sorting">
                                    <div class="shop-product-sorting nav">
                                        <a class="active" data-toggle="tab" href="#">All products</a>
                                       {{--  <a  data-toggle="tab" href="#use-product"> USED BIKES </a>
                                        <a data-toggle="tab" href="#accessory-product">ACCESSORIES</a> --}}
                                    </div>
                                    {{-- <div class="sorting sorting-bg-1">
                                        <form>
                                            <select class="select">
                                                <option value="">Default softing </option>
                                                <option value="">Sort by news</option>
                                                <option value="">Sort by price</option>
                                            </select>
                                        </form>
                                    </div> --}}
                                </div>
                            </div>
                            @include('admin.partials.messages')
                            @include('layouts.all_products')

                            <!-- <div class="paginations text-center mt-20">
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="active"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div> -->
                        </div>

                    </div>
                </div>
        

    <!-- modal -->
            @foreach ($products as $product)
                <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="icofont icofont-close" aria-hidden="true"></span>
                </button>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="qwick-view-left">
                                <div class="quick-view-learg-img">
                                    <div class="quick-view-tab-content tab-content">
                                        <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                            @php $i=1; @endphp

                                            @foreach ($product->images as $image)
                                                
                                                @if ($i > 0)
                                                    <img src="{{ asset('images/products/'. $image->image) }}" alt="{{ $product->name }}">
                                                @endif
                                                
                                                @php $i--; @endphp

                                            @endforeach
                                            {{-- <img src="assets/img/quick-view/l1.jpg" alt=""> --}}
                                        </div>
                                        {{-- <div class="tab-pane fade" id="modal2" role="tabpanel">
                                            <img src="assets/img/quick-view/l2.jpg" alt="">
                                        </div>
                                        <div class="tab-pane fade" id="modal3" role="tabpanel">
                                            <img src="assets/img/quick-view/l3.jpg" alt="">
                                        </div> --}}
                                    </div>
                                </div>
                                {{-- <div class="quick-view-list nav" role="tablist">
                                    <a class="active" href="#modal1" data-toggle="tab" role="tab">
                                        <img src="assets/img/quick-view/s1.jpg" alt="">
                                    </a>
                                    <a href="#modal2" data-toggle="tab" role="tab">
                                        <img src="assets/img/quick-view/s2.jpg" alt="">
                                    </a>
                                    <a href="#modal3" data-toggle="tab" role="tab">
                                        <img src="assets/img/quick-view/s3.jpg" alt="">
                                    </a>
                                </div> --}}
                            </div>
                            <div class="qwick-view-right">
                                <div class="qwick-view-content">
                                    <h3>{{ $product->name }}</h3>
                                    <div class="price">
                                        <span class="new">&#2547;  {{ $product->price }}</span>
                                        {{-- <span class="old">$120.00  </span> --}}
                                    </div>
                                    <div class="rating-number">
                                        <div class="quick-view-rating">
                                            <i class="fa fa-star reting-color"></i>
                                            <i class="fa fa-star reting-color"></i>
                                            <i class="fa fa-star reting-color"></i>
                                            <i class="fa fa-star reting-color"></i>
                                            <i class="fa fa-star reting-color"></i>
                                        </div>
                                    </div>
                                    <p>{{ $product->discription }}</p>
                                    <div class="quick-view-select">
                                        <div class="select-option-part">
                                            {{-- <label style="font-size: 16px; color: #001232;">In stock: </label> --}}
                                            <span class="badge badge-warning" style="font-size: 16px;">{{$product->quantity < 0 ? 'No item is available' : $product->quantity.' item in stock'}}</span>
                                            {{-- <select class="select">
                                                <option value="">- Please Select -</option>
                                                <option value="">900</option>
                                                <option value="">700</option>
                                            </select> --}}
                                        </div>
                                        {{-- <div class="select-option-part">
                                            <label>Color*</label>
                                            <select class="select">
                                                <option value="">- Please Select -</option>
                                                <option value="">orange</option>
                                                <option value="">pink</option>
                                                <option value="">yellow</option>
                                            </select>
                                        </div> --}}
                                    </div>

                                    <div class="quickview-plus-minus">
                                        <div class="cart-plus-minus">
                                            <input type="text" value="1" name="qtybutton" class="cart-plus-minus-box">
                                        </div>
                                        <div class="quickview-btn-cart">
                                            <form action="{{ url('/carts') }}" method="post">
                                                {{ csrf_field()  }}
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button style="border-style: none;" class="btn-style" type="submit">
                                                    <i class="ti-shopping-cart"></i> add to cart
                                                </button>
                                            </form>
                                        </div>
                                        <div class="quickview-btn-wishlist">
                                            <a class="btn-hover" href="#"><i class="icofont icofont-heart-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

@endsection