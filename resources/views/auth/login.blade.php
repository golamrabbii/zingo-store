@extends('layouts.main')

@section('content')
{{-- <div class="container">
    <div class="row"> --}}
<div class="wrapper">
            <div class="login-register-area ptb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 ml-auto mr-auto">
                            <div class="login-register-wrapper">
                                <div class="login-register-tab-list nav">
                                    <a class="active" data-toggle="tab" href="#">
                                        <h4> Login </h4>
                                    </a>
                                </div>
                                <div class="tab-content">
                                    <div id="lg1" class="tab-pane active" >
                                        <div class="login-form-container">
                                            @include('admin.partials.messages')
                                            <div class="login-form">
                                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        {{-- <label for="email">E-Mail Address</label> --}}

                                                        
                                                            <input id="email" type="email" placeholder="E-Mail Address" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
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
                                                    <div class="button-box">
                                                        <div class="login-toggle-btn">
                                                            <label>
                                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                            </label>
                                                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-8 col-md-offset-4" style="padding-left: 0px;">
                                                            <button type="submit" class="btn btn-info" style="border-radius: 5px;width: 50%; height: 40px;">
                                                                Login
                                                            </button>
                                                        </div>
                                                    </div>
                                                   <!--  <div class="butto-box" style="float: left;">
                                                        <div class="login-toggle-btn new_acc">
                                                            <a href="{{ route('register') }}" style="text-decoration: underline; font-family: arial;">Create a new account?</a>
                                                        </div>
                                                    </div> -->
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div id="lg2" class="tab-pane">
                                        <div class="login-form-container">
                                            <div class="login-form">
                                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <label for="name" >Name</label>

                                                        
                                                            <input id="name" type="text" placeholder="Name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                            @if ($errors->has('name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('name') }}</strong>
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
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        {{-- <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        </div>
    {{-- </div>
</div> --}}
@endsection
