<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Dashboard - 
    @yield('title', 'Zingo')
  </title>
  <!-- plugins:css -->
  @include('admin.layouts.css_link')

  
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.layouts.topbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      
      @include('admin.layouts.sidebar')

<!-- partial -->
      <div class="main-panel">
       

        @yield('content')


        @include('admin.layouts.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->

    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  @include('admin.layouts.js_link')


</body>

</html>