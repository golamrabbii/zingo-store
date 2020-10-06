@extends('layouts.main')

@section('title')
    User - Zingo
@endsection

@section('content')

{{-- content --}}
    <div class="container mt-2">
        <div class="row">
        	<div class="col-md-3">
        		<div class="list-group">
        			<a class="list-group-item" href="#" style="text-align: center;">
        				@if (Auth::user()->avatar)
							<img class="img-xs rounded-circle" src="{{asset('images/user/'.Auth::user()->avatar)}}" alt="Profile image" style="width: 200px; margin-top: 2px;margin-bottom: 2px;">
						@else
							<img class="img-xs rounded-circle" src="{{asset('images/default/user.png')}}" alt="Profile image" style="width: 200px; margin-top: 2px;margin-bottom: 2px;">
						@endif
						{{-- <h4 style="font-size: 13px; float: right;margin-top: 27px;font-family: 'Poppins', sans-serif; font-weight: 600;">{{ $user->first_name.' '.$user->last_name }}</h4> --}}
        			</a>
        			<a class="list-group-item {{ Request::is('user') ? 'active':'' }}" href="{{ url('/user') }}">Dashboard</a>
        			<a class="list-group-item {{ Request::is('settings') ? 'active':'' }}" href="{{ url('/settings') }}">Update profile</a>
        			{{-- <a class="list-group-item {{ Request::is('user_carts') ? 'active':'' }}" href="{{ url('/user_carts') }}">Cart list</a> --}}
        			<a class="list-group-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">Log out</a>
        		</div>
        	</div>
        	<div class="col-md-9">
        		<div class="list-group">
	        		@yield('sub-content')
        		</div>
        	</div>
        </div>
    </div>


@endsection