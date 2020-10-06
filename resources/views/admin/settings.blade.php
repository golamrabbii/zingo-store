@extends('admin.main')

@section('title')
    Settings - Zingo Strore
@endsection

@section('content')

{{-- content --}}
    <div class="container">
    	<h4 class="mt-2 ml-3">Admin profile update</h4>
    	<div class="card">
    		<div class="card-body">
    			{{-- <div class="login-form-container"> --}}
                                            @include('admin.partials.messages')
                                            <div class="login-form">
                                                <form class="form-horizontal" method="POST" action="{{ url('/update_admin') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <label for="name" >Name</label>

                                                        
                                                            <input style="font-size: 13px;" id="name" type="text" placeholder="Name" class="form-control" name="name" value="{{ $admin->name }}" required autofocus>

                                                            @if ($errors->has('name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    {{-- <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                        <label for="name" >Name</label>

                                                        
                                                            <input style="font-size: 13px;" id="last_name" type="text" placeholder="Last Name" class="form-control" name="last_name" value="{{ $user->last_name }}" required autofocus>

                                                            @if ($errors->has('last_name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div> --}}

                                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                        <label for="phone">Phone Number</label>

                                                        
                                                            <input style="font-size: 13px;" id="phone" type="text" placeholder="Contact" class="form-control" name="phone" value="{{ $admin->phone }}" required>

                                                            @if ($errors->has('phone'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label for="email">E-Mail Address</label>

                                                        
                                                            <input style="font-size: 13px;" id="email" type="email" placeholder="E-Mail Address" class="form-control" name="email" value="{{ $admin->email }}" required>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>
                                                   
                                                    

                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label for="password" >Password</label>

                                                        
                                                            <input style="font-size: 13px;" id="password" type="password" class="form-control" placeholder="New password (optional)" name="password" >

                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    {{-- <div class="form-group">
                                                       
                                                            <input style="font-size: 13px;" id="password-confirm" type="password" placeholder="Confirm new password" class="form-control" name="password_confirmation" >
                                                        
                                                    </div> --}}

                                                    <div class="form-group">
                                                        <div class="col-md-6 col-md-offset-4" style="padding-left: 0px;">
                                                            <button type="submit" class="btn btn-info" style="border-radius: 5px;width: 75%; height: 40px;">
                                                                Update profile
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        {{-- </div> --}}
    		</div>
    	</div>
        
    </div>


@endsection