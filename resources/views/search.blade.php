@extends('layouts.main')

@section('content')

{{-- content --}}
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 custom-margin-top">
                            <div class="product-sidebar-area pr-60">
                                <div class="sidebar-widget pb-55">
                                    <h3 class="sidebar-widget">
                                    	<a href="{{ url('/') }}">
                                    		<i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    	</a>
                                     Search Products for 
                                     <span class="badge badge-primary">{{ $search }}</span>
                                 	</h3>
                                    <div class="sidebar-search">
                                        <form action="{{ url('/search') }}" method="get">
                                            <input type="text" name="search" placeholder="Search Products...">
                                            <button><i class="ti-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="sidebar-widget pb-50">
                                    <h3 class="sidebar-widget">by categories</h3>
                                    <div class="widget-categories">
                                        <ul>
                                        	@foreach (App\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                                        		<li><a href="#main-{{ $parent->id}}" data-toggle="collapse" data-parent="#accordion">{{ $parent->name }}</a></li>
                                        		<div class="panel-collapse collapse in" id="main-{{ $parent->id}}" style="margin-left: 30px;">
                                        			@foreach (App\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
		                                        		<li style="margin-bottom: 16px;"><a href="#">- {{ $child->name }}</a></li>
		                                        	@endforeach
		                                        </div>
                                        	@endforeach
                                            {{-- <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Jewelry</a></li>
                                            <li><a href="#">Accessories</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                               {{--  <div class="sidebar-widget mb-55">
                                    <h3 class="sidebar-widget">by price</h3>
                                    <div class="price_filter mr-60">
                                        <div id="slider-range"></div>
                                        <div class="price_slider_amount">
                                            <div class="label-input">
                                                <label>price : </label>
                                                <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                            </div>
                                            <button type="button">Filter</button> 
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-widget mb-55">
                                    <h3 class="sidebar-widget">by color</h3>
                                    <div class="product-color">
                                        <ul>
                                            <li class="blue">b</li>
                                            <li class="yellow">y</li>
                                            <li class="gray">g</li>
                                            <li class="puce">pu</li>
                                            <li class="black">b</li>
                                            <li class="pink">p</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar-widget mb-45">
                                    <h3 class="sidebar-widget">product tags</h3>
                                    <div class="product-tags">
                                        <ul>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bag</a></li>
                                            <li><a href="#">Women</a></li>
                                            <li><a href="#">Tie</a></li>
                                            <li><a href="#">Women</a></li>
                                            <li><a href="#">Dress</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar-widget mb-55">
                                    <h3 class="sidebar-widget">compare</h3>
                                    <div class="product-compare">
                                        <ul>
                                            <li><a href="#">Gloriori GSX 250 R <span><i class="fa fa-trash-o" aria-hidden="true"></i></span></a></li>
                                            <li><a href="#">Klager GSX 250 R<span><i class="fa fa-trash-o" aria-hidden="true"></i></span></a></li>
                                            <li><a href="#">Maxclon ZPE 54 <span><i class="fa fa-trash-o" aria-hidden="true"></i></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="compare-text-btn">
                                        <div class="compare-text">
                                            <h5>Clear All</h5>
                                        </div>
                                        <div class="compare-btn">
                                            <a href="#">Compare</a>
                                        </div>
                                    </div>
                                </div> --}}
                    
                            </div>
                        </div>

                    <div class="col-lg-9 custom-margin-top">
                            <div class="shop-topbar-wrapper">
                                <div class="grid-list-options">
                                    <ul class="view-mode">
                                        <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid2"></i></a></li>
                                        <li><a href="#product-list" data-view="product-list"><i class="ti-view-list"></i></a></li>
                                    </ul>
                                </div>
                                {{-- <div class="product-sorting">
                                    <div class="shop-product-sorting nav">
                                        <a class="active" data-toggle="tab" href="#new-product">NEW BIKES </a>
                                        <a  data-toggle="tab" href="#use-product"> USED BIKES </a>
                                        <a data-toggle="tab" href="#accessory-product">ACCESSORIES</a>
                                    </div>
                                    <div class="sorting sorting-bg-1">
                                        <form>
                                            <select class="select">
                                                <option value="">Default softing </option>
                                                <option value="">Sort by news</option>
                                                <option value="">Sort by price</option>
                                            </select>
                                        </form>
                                    </div>
                                </div> --}}
                            </div>

                            @include('admin.partials.messages')

                            <div class="grid-list-product-wrapper tab-content">
                                <div id="new-product" class="product-grid product-view tab-pane active">
                                    <div class="row">

                                        @foreach ($products as $product)
                                            <div class="product-width col-md-6 col-xl-3 col-lg-6">
                                            <div class="product-wrapper mb-35" style="width: auto; height: 355px;">
                                                <div class="product-title-spreed">
                                                    <h4 style="padding-top: 45px;"></h4>
                                                </div>
                                                <div class="product-img">
                                                    @php $i=1; @endphp

                                                    @foreach ($product->images as $image)
                                                        
                                                        @if ($i > 0)
                                                            <a href="{{ url('/product', $product->slug) }}">
                                                                <img src="{{ asset('images/products/'. $image->image) }}" alt="{{ $product->name }}">
                                                            </a>
                                                        @endif
                                                        
                                                        @php $i--; @endphp

                                                    @endforeach
                                                      
                                                </div>
                                                <div class="product-action">
                                                        <form action="{{ url('/carts') }}" method="post">
                                                            {{ csrf_field()  }}
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <button class="custom_btn" type="submit">
                                                                <i class="ti-shopping-cart"></i>
                                                            </button>
                                                        </form>
                                                        <a class="action-cart-2" title="Wishlist" href="#">
                                                            <i class=" ti-heart"></i>
                                                        </a>
                                                        <a class="action-reload" title="Quick View" data-toggle="modal" data-target="#" href="#exampleModal{{ $product->id }}">
                                                            <i class=" ti-zoom-in"></i>
                                                        </a>
                                                    </div>
                                                    <div class="product-content-wrapper">
                                                        <div class="product-title-spreed">
                                                            <h4><a href="#" style="font-size: 15px;">{{ $product->name }}</a></h4>
                                                            {{-- <span>155 cc</span> --}}
                                                        </div>
                                                        <div class="product-price" style="position: inherit;margin-top: 25px;">
                                                            <span style="font-size: 13px;">&#2547;  {{ $product->price }}</span>
                                                        </div>
                                                    </div>
                                                <div class="product-list-details" id="product-list">
                                                    <h2><a href="product-details.html">{{ $product->name }}</a></h2>
                                                    <div class="quick-view-rating">
                                                        <i class="fa fa-star reting-color"></i>
                                                        <i class="fa fa-star reting-color"></i>
                                                        <i class="fa fa-star reting-color"></i>
                                                        <i class="fa fa-star reting-color"></i>
                                                        <i class="fa fa-star reting-color"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>&#2547;  {{ $product->price }}</span>
                                                    </div>
                                                    <p>{{ $product->discription }}</p>
                                                    {{-- <div class="shop-list-cart">
                                                        <a href="{{ url('/carts') }}"><i class="ti-shopping-cart"></i> Add to cart</a>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="paginations text-center mt-20">
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="active"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
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