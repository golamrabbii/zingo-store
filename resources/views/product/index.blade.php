@extends('layouts.main')

@section('content')

{{-- content --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-3 custom-margin-top">
                        @include('layouts.sidebar')
                    </div>

                    <div class="col-md-9 custom-margin-top">
                        <div class="widget">
                            <h3>Products</h3>
                            <div class="row">

                                @foreach ($products as $product)
                        
                                <div class="col-md-4">
                                    <div class="card custome-card effect8">
                                        {{-- <img class="card-img-top" src="{{ asset('images/products/mt.jpg') }}" alt="Card image"> --}}
                                        
                                        @php $i=1; @endphp

                                        @foreach ($product->images as $image)
                                            
                                            @if ($i > 0)
                                                <img class="card-img-top" src="{{ asset('images/products/'. $image->image) }}" alt="{{ $product->name }}">
                                            @endif
                                            
                                            @php $i--; @endphp

                                        @endforeach

                                        <div class="card-body">
                                            <a href="{{ url('/product', $product->slug) }}" style="color: #1c2331;"><h5 class="card-title custome-title">{{ $product->name }}</h5></a>
                                            <p class="card-text custome-card-text">&#2547;  {{ $product->price }}</p>
                                            <a href="{{ url('/carts') }}" class="btn btn-outline-info"><i class="fa fa-shopping-cart"> <span style="padding-left: 10px;">Add to cart</span></i></a>
                                            <a href="{{ url('/product', $product->slug) }}" class="btn btn-dark" style="float: right; padding-left: 20px; padding-right: 20px;"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach

                            </div>
                        </div>  
                    
                    </div>
                </div>
            </div>

@endsection