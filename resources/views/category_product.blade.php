@extends('layouts.main')

@section('content')

{{-- content --}}
            <div class="container">
                <div class="row">

                    @include('layouts.sidebar')

                    <div class="col-lg-9 custom-margin-top">
                            <div class="shop-topbar-wrapper">
                                <div class="grid-list-options">
                                    <ul class="view-mode">
                                        <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid2"></i></a></li>
                                        <li><a href="#product-list" data-view="product-list"><i class="ti-view-list"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-sorting">
                                    <div class="shop-product-sorting nav">
                                        <a class="active" data-toggle="tab" href="#">All products <span class="badge badge-warning">{{ $category->name }}</span></a>
                                        {{-- <a  data-toggle="tab" href="#use-product"> USED BIKES </a>
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
                            @php
                            	$products = $category->products;
                            @endphp
                            	@if ($products->count() > 0)
                            		@include('layouts.all_products')
                            	@else
                            		<div class="alert alert-warning">
                            			No product has added yet in this category.
                            		</div>
                            	@endif
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
                                           
                                        </div>
                                        
                                    </div>
                                </div>
                                
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
                                            <a class="btn-style" href="{{ url('/carts') }}">add to cart</a>
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