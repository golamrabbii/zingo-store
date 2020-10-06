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
                                                        {{-- <a class="action-plus-2 p-action-none" title="Add To Cart" href="{{ url('/carts') }}">
                                                            <i class=" ti-shopping-cart"></i>
                                                        </a> --}}
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
                                                    <h2><a href="#">{{ $product->name }}</a></h2>
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
                                                        <form action="{{ url('/carts') }}" method="post">
    {{ csrf_field()  }}
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button class="custom_btn" type="submit">
        <i class="ti-shopping-cart"> </i> Add to cart
    </button>
</form>
                                                    </div> --}}

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>