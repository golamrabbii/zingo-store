{{-- <nav class="navbar navbar-light bg-light" style="background-color: #1c2331!important; ">
                <div class="container"> --}}
                    {{-- <a class="navbar-brand">Navbar</a> --}}
                    {{-- <img src="{{ asset('images/logo_f.png') }}" width="15%" alt="">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </nav> --}}
<!--Navbar-->
@if (Request::path() != 'login')
  @include('layouts.top_navbar')
@endif

<nav class="navbar navbar-light bg-light" style="background-color: #fffff">
<div class="container">
  
  <!-- Navbar brand -->
  {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
  <a href="{{ url('/') }}">
    <img src="{{ asset('images/zingo.png') }}" width="10%" alt="">
  </a>
  <!-- Collapse button -->

  @if (Request::path() != 'login')
    <div class="navbar-nav ml-auto mt-2 mb-2">
    <div class="container" style="border: 1px solid #d42a4b;">
      <span class="custom_count" style="font-size: 12px; margin-right: 5px; top: 30px; right: 75px;">{{ App\Cart::totalItems() }}</span>
      <a style="color: #d42a4b;" href="{{ url('/carts_list') }}">Cart</a>
      <i class="fa fa-shopping-cart" aria-hidden="true" style="color: #d42a4b;"></i>
    </div>
  </div>
  @endif
  
  {{-- <button style="right: 80px; color: #d42a4b; border: 1px solid" type="button" data-badge="{{ App\Cart::totalItems() }}" class="d-block btn btn-outline badge-notification">
    <a style="color: #d42a4b;" href="{{ url('/carts_list') }}">Carts</a>
  </button> --}}


 {{--  <button class="navbar-toggler" type="button" data-parent="#accordion" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent15" aria-expanded="false" aria-label="Toggle navigation" style="border-color: rgba(0, 0, 0, 0);"><span class="navbar-toggler-icon" style="background-image: url('https://mdbootstrap.com/img/svg/hamburger2.svg?color=fff');
};"></span></button> --}}

  <!-- Collapsible content -->
 {{--  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- Links -->
    <ul class="navbar-nav mr-auto" style="float: right; text-align: right; padding-right: 10px;">
      <li class="nav-item active" >
        <a class="nav-link" href="{{ url('/') }}" style="color: white;">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item" >
        <a class="nav-link" href="{{ url('/about') }}" style="color: white;">About us</a>
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="{{ url('/contact') }}" style="color: white;">Contact</a>
      </li> 
    </ul>
    <!-- Links -->

  </div> --}}
  <!-- Collapsible content -->
</div>
</nav>
<!--/.Navbar-->