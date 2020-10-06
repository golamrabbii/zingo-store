<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Password Reset - Lara Invoice</title>
  <!-- plugins:css -->
  
  @include('admin.layouts.css_link')

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
                <h4 style="text-align: center; margin-bottom: 35px; font-family: 'Roboto', sans-serif;">Admin Password Reset</h4>
                
                @if (session('status'))
                    <div class="alert alert-success" style="font-size: 12px;">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('admin.password.email') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        {{-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> --}}

                                                        <div class="form-group">
                                                            <input id="email" type="email" class="form-control" name="email" placeholder="E-mail address" value="{{ old('email') }}" required>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-6 col-md-offset-4">
                                                            <button type="submit" class="btn btn-info" style="border-radius: 5px; height: 40px; margin-left: -15px;">
                                                                Send Password Reset Link
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2019 | Lara Invoice System. All rights reserved by Mahfuz Shuvo.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('admin.layouts.js_link')

</body>

</html>