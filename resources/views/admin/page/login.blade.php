<!DOCTYPE html>
<html lang="en">
    <head>
      <script>
        localStorage.getItem('_token') ? window.location.href = "{{ route('admin.dashboard') }}" : null;
      </script>
      <meta charset="utf-8" />
      <title>Log In | {{ config('env.app_name') }}</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
      <meta content="Coderthemes" name="author" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico">

      <!-- App css -->

      <link href="{{ asset('') }}assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

      <!-- icons -->
      <link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />

      <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">

    </head>

    <body class="loading authentication-bg authentication-bg-pattern">

        <div class="account-pages my-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="text-center">   
                            <a href="#">
                                <img src="{{ asset('') }}custom/images/logo.svg" alt="" height="35" class="mx-auto">
                            </a>
                            <h3 class="text-muted mt-2 mb-4">Dana Amanah Komunitas</h3>

                        </div>
                        <div class="card">
                            <div class="card-body p-4">
                                
                                <div class="text-center mb-3">
                                    <h4 class="text-uppercase mt-0">Sign In</h4>
                                </div>

                                <div id="alert"></div>

                                <form action="#" id="login">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email or Username</label>
                                        <input class="form-control" type="text" id="username" required placeholder="Enter your email or username">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input class="form-control" type="password" required id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="mb-3 d-grid text-center">
                                        <button class="btn btn-primary" type="submit" id="btn-login"> Log In </button>
                                    </div>
                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor -->
        <script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('') }}assets/libs/node-waves/waves.min.js"></script>
        <script src="{{ asset('') }}assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="{{ asset('') }}assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="{{ asset('') }}assets/libs/feather-icons/feather.min.js"></script>
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('') }}assets/js/app.min.js"></script>
        <script>
          $(document).ready(function() {
            $('#login').submit(function(e) {
              e.preventDefault();
              let username = $('#username').val();
              let password = $('#password').val();
              $.ajax({
                url: "{{ route('api.admin.login') }}",
                type: "POST",
                data: {
                  username: username,
                  password: password,
                  _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                  $('#btn-login').html(`
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                  `);

                  $('#btn-login').toggleClass('disabled');
                },
                success: function(response) {
                  if (response.meta.status == 'OK') {
                    localStorage.setItem('_token', response.data.access_token);
                    localStorage.setItem('_user_name', response.data.user.name);
                    localStorage.setItem('_user_username', response.data.user.username);
                    window.location.href = "{{ route('admin.dashboard') }}";
                  } else {
                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: response.meta.message,
                    })
                  }
                },
                error: function(response) {
                  $('#btn-login').toggleClass('disabled');
                  $('#btn-login').html('Log In');
                  let res = response.responseJSON;

                  $('#alert').html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      ${res.meta.message}
                    </div>
                  `)
                },
              });
            });
          })
        </script>
        
    </body>
</html>