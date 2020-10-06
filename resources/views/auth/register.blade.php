@extends('layouts.main')

@section('content')


<div class="wrapper">
            <div class="login-register-area ptb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 ml-auto mr-auto">
                            <div class="login-register-wrapper">
                                <div class="login-register-tab-list nav">
                                    <a class="active" data-toggle="tab" href="#">
                                        <h4> Register </h4>
                                    </a>
                                </div>
                                <div class="tab-content">
                                    <div id="lg1" class="tab-pane active" >
                                        <div class="login-form-container">
                                            @include('admin.partials.messages')
                                            <div class="login-form">
                                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                        {{-- <label for="name" >Name</label> --}}

                                                        
                                                            <input id="first_name" type="text" placeholder="First Name" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                                            @if ($errors->has('first_name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                        {{-- <label for="name" >Name</label> --}}

                                                        
                                                            <input id="last_name" type="text" placeholder="Last Name" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                                            @if ($errors->has('last_name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                        {{-- <label for="email">E-Mail Address</label> --}}

                                                        
                                                            <input id="phone" type="text" placeholder="Contact" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                                            @if ($errors->has('phone'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        {{-- <label for="email">E-Mail Address</label> --}}

                                                        
                                                            <input id="email" type="email" placeholder="E-Mail Address" class="form-control" name="email" value="{{ old('email') }}" required>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <!-- <div class="form-group" style="margin-bottom: 0px;">
                                                        {{-- <label for="email">E-Mail Address</label> --}}
                                                            <select class="form-group" name="division_id" id="division-id" style="font-size: 13px;background-color: #f7f7f7;border-color: #f7f7f7;">
                                                                <option value="" style="font-size: 13px;">Please select your Division</option>
                                                                @foreach ($divisions as $division)
                                                                    <option style="font-size: 13px;" value="{{ $division->id }}">{{ $division->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            {{-- <input id="street_address" type="text" placeholder="Street Address" class="form-control" name="street_address" value="{{ old('street_address') }}" required>

                                                            @if ($errors->has('street_address'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('street_address') }}</strong>
                                                                </span>
                                                            @endif --}}
                                                        
                                                    </div> -->


                                                   <!--  <div class="form-group" style="margin-bottom: 0px;">
                                                        {{-- <label for="email">E-Mail Address</label> --}}
                                                            <select class="form-group" name="district_id" id="district-id" style="font-size: 13px;background-color: #f7f7f7;border-color: #f7f7f7;">
                                                               {{--  <option value="" style="font-size: 13px;">Please select your District</option>
                                                                @foreach ($district as $district)
                                                                    <option style="font-size: 13px;" value="{{ $district->id }}">{{ $district->name }}</option>
                                                                @endforeach --}}
                                                            </select>
                                                            {{-- <input id="street_address" type="text" placeholder="Street Address" class="form-control" name="street_address" value="{{ old('street_address') }}" required>

                                                            @if ($errors->has('street_address'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('street_address') }}</strong>
                                                                </span>
                                                            @endif --}}
                                                        
                                                    </div> -->

                                                    <div class="form-group{{ $errors->has('street_address') ? ' has-error' : '' }}">
                                                        {{-- <label for="email">E-Mail Address</label> --}}

                                                        
                                                            <input id="street_address" type="text" placeholder="Street Address" class="form-control" name="street_address" value="{{ old('street_address') }}" required>

                                                            @if ($errors->has('street_address'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('street_address') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        {{-- <label for="password" >Password</label> --}}

                                                        
                                                            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                        
                                                    </div>

                                                    <div class="form-group">
                                                        {{-- <label for="password-confirm">Confirm Password</label> --}}

                                                        
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
                        </div>
                    </div>
                </div>
            </div>
</div>



{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#division-id").change(function() {
            var division = $("#division-id").val();

            // send AJAX request to server with this division

            $("#district-id").html("");

            var option = "";

            $.get("http://127.0.0.1:8000/get-districts/"+division, 
                function(data){

                    data = JSON.parse(data);
                    data.forEach(function(element){
                        option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
                    });
                $("#district-id").html(option);
            });
        })
    </script>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#division-id").change(function() {
            var division = $("#division-id").val();

            // send AJAX request to server with this division

            $("#district-id").html("");

            var option = "";

            $.get("http://127.0.0.1:8000/get-districts/"+division, 
                function(data){

                    data = JSON.parse(data);
                    data.forEach(function(element){
                        option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
                    });
                $("#district-id").html(option);
            });
        })
    </script>
@endsection