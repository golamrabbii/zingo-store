@extends('admin.main')

@section('title')
    Add customer - eBuy
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Add customer</h4>
                  {{-- <p class="card-description">
                    Basic form elements
                  </p> --}}
                  <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                        <label for="name" >First Name</label>

                                                        
                                                            <input id="first_name" type="text" placeholder="First Name" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                                            @if ($errors->has('first_name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                        <label for="name" >Last Name</label>

                                                        
                                                            <input id="last_name" type="text" placeholder="Last Name" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                                            @if ($errors->has('last_name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                        <label for="email">Contact</label>

                                                        
                                                            <input id="phone" type="text" placeholder="Contact" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                                            @if ($errors->has('phone'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label for="email">E-Mail Address</label>

                                                        
                                                            <input id="email" type="email" placeholder="E-Mail Address" class="form-control" name="email" value="{{ old('email') }}" required>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group" style="margin-bottom: 0px;">
                                                        <label for="city">City</label>
                                                            <select class="form-group custom-select" name="city" id="city" style="font-size: 13px;background-color: #f7f7f7;border-color: #f7f7f7;">
                                                                <option value="" selected disabled style="font-size: 13px;">Please select city</option>
                                                                
                                                                <option style="font-size: 13px;" value="Dhaka">Dhaka</option>
                                                                <option style="font-size: 13px;" value="Others">Others</option>
                                                            </select>
                                                    </div>

                                                    {{-- <div class="form-group" style="margin-bottom: 0px;">
                                                        <label for="email">Division</label>
                                                            <select class="form-group custom-select" name="division_id" id="division-id" style="font-size: 13px;background-color: #f7f7f7;border-color: #f7f7f7;">
                                                                <option value="" style="font-size: 13px;">Please select your Division</option>
                                                                @foreach ($divisions as $division)
                                                                    <option style="font-size: 13px;" value="{{ $division->id }}">{{ $division->name }}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>


                                                    <div class="form-group" style="margin-bottom: 0px;">
                                                        <label for="email">District</label>
                                                            <select class="form-group custom-select" name="district_id" id="district-id" style="font-size: 13px;background-color: #f7f7f7;border-color: #f7f7f7;">
                                                                <option value="" style="font-size: 13px;">Please select your District</option>
                                                            </select>
                                                    </div> --}}

                                                    <div class="form-group{{ $errors->has('street_address') ? ' has-error' : '' }}">
                                                        <label for="email">Street Address</label>

                                                        
                                                            <input id="street_address" type="text" placeholder="Street Address" class="form-control" name="street_address" value="{{ old('street_address') }}" required>

                                                            @if ($errors->has('street_address'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('street_address') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label for="password" >Password</label>

                                                        
                                                            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password-confirm">Confirm Password</label>

                                                        
                                                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-6 col-md-offset-4" style="padding-left: 0px;">
                                                            <button type="submit" class="btn btn-info" style="border-radius: 5px;width: 75%; height: 40px;">
                                                                Register
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                </div>
              </div>
            </div>
        </div>
    </div>

@endsection
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
    