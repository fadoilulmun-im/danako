
<!DOCTYPE html>
<html lang="en">
    <head>
      @include('admin.layout.include.head')

      @yield('third-party-css')

      <!-- App css -->
      <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

      <!-- icons -->
      <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <!-- body start -->
    <body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>
      
      @yield('modal')
      <div class="modal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true" id="loading">
        <div class="modal-dialog modal-sm modal-dialog-centered justify-content-center">
          {{-- <div class="modal-content"> --}}
            <div class="spinner-border avatar-md text-primary" role="status"></div>
          {{-- </div> --}}
        </div>
      </div>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- Topbar Start -->
              @include('admin.layout.include.navbar')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
              @include('admin.layout.include.leftsidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page">
                <div class="content">

                  @yield('content')

                </div> <!-- content -->

                <!-- Footer Start -->
                @include('admin.layout.include.footer')
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
          @include('admin.layout.include.rightsidebar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>

        @yield('third-party-js')

        <!-- init js-->
        <script>
          function ajax(setting){
            setting.headers = {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            };

            if(localStorage.getItem('_token')){
              setting.headers['Authorization'] = 'Bearer '+localStorage.getItem('_token');
            }

            if(!setting.beforeSend){
              setting.beforeSend = function () {
                $('#loading').modal('show');
              };
            }
            
            if(!setting.complete){
              setting.complete = function () {
                $('#loading').modal('hide');
              };
            }
            
            if(!setting.error){
              setting.error = function (response) {
                let res = response.responseJSON
                let code = res.meta.code

                if (code === 401) {
                  window.location.href = "/";
                }
              };
            }

            $.ajax(setting);
          }
        </script>
        @yield('init-js')
        

        <!-- App js-->
        <script src="{{asset('assets/js/app.min.js')}}"></script>
        
    </body>
</html>