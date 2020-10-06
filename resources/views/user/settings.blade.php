@extends('user.main')

@section('title')
    Update profile - Zingo Strore
@endsection

@section('sub-content')

{{-- content --}}
    <div class="container">
    	<div class="card">
    		<div class="card-body">
    			{{-- <div class="login-form-container"> --}}
                                            @include('admin.partials.messages')
                                            <div class="login-form">
                                                <form class="form-horizontal" method="POST" action="{{ url('/update_user') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                        {{-- <label for="name" >Name</label> --}}

                                                        
                                                            <input style="font-size: 13px;" id="first_name" type="text" placeholder="First Name" class="form-control" name="first_name" value="{{ $user->first_name }}" required autofocus>

                                                            @if ($errors->has('first_name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                        {{-- <label for="name" >Name</label> --}}

                                                        
                                                            <input style="font-size: 13px;" id="last_name" type="text" placeholder="Last Name" class="form-control" name="last_name" value="{{ $user->last_name }}" required autofocus>

                                                            @if ($errors->has('last_name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                        {{-- <label for="email">E-Mail Address</label> --}}

                                                        
                                                            <input style="font-size: 13px;" id="phone" type="text" placeholder="Contact" class="form-control" name="phone" value="{{ $user->phone }}" required>

                                                            @if ($errors->has('phone'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        {{-- <label for="email">E-Mail Address</label> --}}

                                                        
                                                            <input style="font-size: 13px;" id="email" type="email" placeholder="E-Mail Address" class="form-control" name="email" value="{{ $user->email }}" required>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('street_address') ? ' has-error' : '' }}">
                                                        {{-- <label for="email">E-Mail Address</label> --}}

                                                        
                                                            <input style="font-size: 13px;" id="street_address" type="text" placeholder="Street Address" class="form-control" name="street_address" value="{{ $user->street_address }}" required>

                                                            @if ($errors->has('street_address'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('street_address') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    @php
                                                        $dhk = "Dhaka";
                                                        $o = "Others";
                                                    @endphp

                                                    <div class="form-group" style="margin-bottom: 0px;">
                                                        {{-- <label for="email">E-Mail Address</label> --}}
                                                            <select class="form-group" name="district_id" style="font-size: 13px;background-color: #fff;border: 1px solid #ced4da;border-radius: 5px;">
                                                                <option value="" disabled style="font-size: 13px;">Please select city</option>
                                                                    <option style="font-size: 13px;" value="Dhaka" {{ $user->city == $dhk ? 'selected':'' }}>Dhaka</option>
                                                                    <option style="font-size: 13px;" value="Others" {{ $user->city == $o ? 'selected':'' }}>Others</option>
                                                            </select>
                                                           
                                                        
                                                    </div>

                                                    {{-- <div class="form-group" style="margin-bottom: 0px;">
                                                        <label for="email">E-Mail Address</label>
                                                            <select class="form-group" name="district_id" style="font-size: 13px;background-color: #fff;border: 1px solid #ced4da;border-radius: 5px;">
                                                                <option value="" style="font-size: 13px;">Please select your District</option>
                                                                @foreach ($district as $district)
                                                                    <option style="font-size: 13px;" value="{{ $district->id }}" {{ $user->district_id == $district->id ? 'selected':'' }}>{{ $district->name }}</option>
                                                                @endforeach
                                                            </select>
                                                           
                                                        
                                                    </div>

                                                    <div class="form-group" style="margin-bottom: 0px;">
                                                        <label for="email">E-Mail Address</label>
                                                            <select class="form-group" name="division_id" style="font-size: 13px;background-color: #fff;border: 1px solid #ced4da;border-radius: 5px;">
                                                                <option value="" style="font-size: 13px;">Please select your Division</option>
                                                                @foreach ($divisions as $division)
                                                                    <option style="font-size: 13px;" value="{{ $division->id }}" {{ $user->division_id == $division->id ? 'selected':'' }}>{{ $division->name }}</option>
                                                                @endforeach
                                                            </select>
                                                          
                                                        
                                                    </div> --}}
                                                    <div class="form-group{{ $errors->has('shipping_address') ? ' has-error' : '' }}">
                                                        {{-- <label for="email">E-Mail Address</label> --}}

                                                        
                                                            <textarea style="font-size: 13px;" id="shipping_address" placeholder="Shipping Address (optional)" class="form-control" name="shipping_address" rows="2">{{ $user->shipping_address }}</textarea>

                                                            @if ($errors->has('shipping_address'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('shipping_address') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        {{-- <label for="password" >Password</label> --}}

                                                        
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