<script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('admin_js/off-canvas.js')}}"></script>
  <script src="{{asset('admin_js/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('admin_js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
  {{-- datatable --}}
 <script src="{{asset('admin_js/datatables.min.js')}}"></script>
 {{-- <script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script> --}}
  <script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    } );
  </script>

  <script type="text/javascript">
        $("#division-id").change(function() {
            var division = $("#division-id").val();

            // send AJAX request to server with this division

            $("#district-id").html("");

            var option = "";

            $.get("http://localhost/zingo/public/get-districts/"+division, 
                function(data){

                    data = JSON.parse(data);
                    data.forEach(function(element){
                        option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
                    });
                $("#district-id").html(option);
            });
        })
    </script>