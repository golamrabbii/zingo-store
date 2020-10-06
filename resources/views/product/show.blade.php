@extends('layouts.main')

@section('title')
    {{ $product->name }} - eBuy
@endsection

@section('content')

{{-- content --}}
            
			<div class="container">
                <div>
                @include('admin.partials.messages')
            </div>
                <div class="row">
					
					<div class="product-details-area fluid-padding-3 ptb-130">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-details-img-content">
                                <div class="product-details-tab mr-40">
                                    {{-- <div class="product-details-large tab-content">
                                    	@foreach ($product->images as $image)
                                    		<div class="tab-pane active" id="pro-details1">
                                            	<div class="easyzoom easyzoom--overlay">
                                                	<a href="{{ asset('images/products/'. $image->image) }}">
                                                    	<img src="{{ asset('images/products/'. $image->image) }}" alt="">
                                                	</a>
                                            	</div>
                                        	</div>
                                    	@endforeach
                                    </div>
                                    <div class="product-details-small nav mt-12 product-dec-slider owl-carousel">
                                    	@foreach ($product->images as $image)
                                    		<a class="active" href="#pro-details1">
                                            	<img src="{{ asset('images/products/'. $image->image) }}" alt="">
                                        	</a>
                                    	@endforeach
                                    </div> --}}
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
									  <div class="carousel-inner">
									  	@php $i = 1; @endphp
									    @foreach ($product->images as $image)
									    	<div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
										      	<img class="d-block w-100" src="{{ asset('images/products/'. $image->image) }}" alt="First slide">
										    </div>
										@php $i++; @endphp
									    @endforeach
									    
									  </div>
									  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
									    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
									    <span class="sr-only">Previous</span>
									  </a>
									  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
									    <span class="carousel-control-next-icon" aria-hidden="true"></span>
									    <span class="sr-only">Next</span>
									  </a>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details-content">
                                <h2>{{ $product->name }}</h2>
                                <!-- <div class="quick-view-rating">
                                    <i class="fa fa-star reting-color"></i>
                                    <i class="fa fa-star reting-color"></i>
                                    <i class="fa fa-star reting-color"></i>
                                    <i class="fa fa-star reting-color"></i>
                                    <i class="fa fa-star reting-color"></i>
                                    <span> ( 01 Customer Review )</span> 
                                </div> -->
                                <br>
                                <div class="product-price">
                                    <span>&#2547;  {{ $product->price }}</span>
                                </div>
                                <div class="product-overview">
                                    <h5 class="pd-sub-title">Product Description</h5>
                                    <p>{{ $product->discription }}</p>
                                </div>
                                <!-- <div class="product-color">
                                    <h5 class="pd-sub-title">Product color</h5>
                                    <ul>
                                        <li class="red">b</li>
                                        <li class="pink">p</li>
                                        <li class="blue">b</li>
                                        <li class="sky2">b</li>
                                        <li class="green">y</li>
                                        <li class="purple2">g</li>
                                    </ul>
                                </div> -->
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
                                        <a class="btn-hover cr-btn" href="#"><span><i class="icofont icofont-heart-alt"></i></span></a>
                                    </div>
                                </div>
                                <!-- <div class="product-categories">
                                    <h5 class="pd-sub-title">Categories</h5>
                                    <ul>
                                        <li>
                                            <a href="#">fashion ,</a>
                                        </li>
                                        <li>
                                            <a href="#">electronics ,</a>
                                        </li>
                                        <li>
                                            <a href="#">toys ,</a>
                                        </li>
                                        <li>
                                            <a href="#">food ,</a>
                                        </li>
                                        <li>
                                            <a href="#">jewellery </a>
                                        </li>
                                    </ul>
                                </div> -->
                                <div class="product-share">
                                    <h5 class="pd-sub-title">Share</h5>
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-social-pinterest"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="icofont icofont-social-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>

@endsection