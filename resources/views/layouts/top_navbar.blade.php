<!--Navbar-->

<nav class="navbar navbar-light bg-light" style="background-color: #02e8a7!important; padding-top: 2px; padding-bottom: 2px;">
	<div class="container">
		<div class="navbar-nav mr-auto">
			<!--  -->
		</div>
		<div class="navbar-nav ml-auto">

			{{-- <div>
		        <span style="font-size: 12px; margin-right: 1px;"><a href="{{ url('/carts') }}">Cart</a></span>
		    </div> --}}

			@if (Auth::guest())
		        <div>
		        	<span style="font-size: 12px; margin-right: 2px;"><a href="{{ route('login') }}">Login</a></span>
		        	<!-- <span style="font-size: 12px; margin-right: 2px; color: #a5a5a5;">/</span>
		        	<span style="font-size: 12px; margin-right: 15px;"><a href="{{ route('register') }}">Register</a></span> -->
		        </div>
		    @else
		  
				<p style="font-size: 12px; margin-bottom: 0px; margin-right: 20px;">
					<a class="dropdown-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
						@if (Auth::user()->avatar)
							<img class="img-xs rounded-circle" src="{{asset('images/user/'.Auth::user()->avatar)}}" alt="Profile image" style="width: 15px; margin-right: 10px;margin-top: 2px;margin-bottom: 2px;">
						@else
							<img class="img-xs rounded-circle" src="{{asset('images/default/user.png')}}" alt="Profile image" style="width: 15px; margin-right: 10px;margin-top: 2px;margin-bottom: 2px;">
						@endif
						
						Hello,
					    {{ Auth::user()->first_name }} 
					    
					    <span class="caret"></span>
					</a>
				</p>
				<div class="collapse" id="collapseExample">
			  		<div class="card card-body" style="padding-bottom: 3px;padding-top: 3px;font-size: 12px;background: rgba(28, 35, 49, 0.4);text-align: right; margin-right: 15px;float: right;display: table;">
			  			<ul>
			  				<li>
			  					<a href="{{ url('/user') }}">
					                Profile
					                <i style="margin-left: 10px;" class="fa fa-user" aria-hidden="true"></i>
					            </a>
			  				</li>
			  				<li>
			  					<a href="{{ route('logout') }}" onclick="event.preventDefault();
			                                                     document.getElementById('logout-form').submit();">
			                                            Logout
			                                            <i style="margin-left: 10px;" class="fa fa-sign-out" aria-hidden="true"></i>
					            </a>
					  		</li>
			  			</ul>
			  			
			    		
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                {{ csrf_field() }}
			            </form>
			  		</div>
				</div>
			@endif
		</div>
	  	
    <!-- Links -->
    {{-- <ul class="navbar-nav ml-auto" style="float: right; text-align: right; padding-right: 15px;">
      @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" >
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
    </ul> --}}
    <!-- Links -->

  
  <!-- Collapsible content -->
	</div>
</nav>
<!--/.Navbar-->

