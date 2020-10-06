<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>
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
            	<h4 style="text-align: center; margin-bottom: 35px; font-family: 'Roboto', sans-serif;">Admin Login</h4>
            	@include('admin.partials.messages')
              <form action="{{ url('/submit') }}" method="post">
              	{{ csrf_field() }}
                <div class="form-group">
                  <label class="label">E-mail</label>
                  <div class="input-group">
                    <input type="text" name="email" class="form-control" placeholder="E-mail">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-info submit-btn btn-block">Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  {{-- <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Keep me signed in
                    </label>
                  </div> --}}
                  <a href="{{ route('admin.password.request') }}" class="text-small forgot-password text-black">Forgot Password</a>
                </div>
               {{--  <div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" src="{{asset('admin_images/images/file-icons/icon-google.svg')}}" alt="">Log in with Google</button>
                </div> --}}
                {{-- <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="#" class="text-black text-small">Create new account</a>
                </div> --}}
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