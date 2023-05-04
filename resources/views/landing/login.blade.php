<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://kit.fontawesome.com/5fde2fdc76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap">
    <link rel="stylesheet" href="{{ asset('') }}users/login/style.css">
    <meta name="robots" content="noindex, follow">
    <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
    @if (isset($access_token))
        <script>
            localStorage.setItem('_token', '{{$access_token}}');
            window.location.href = "{{ route('afterlogin') }}";
        </script>
    @endif
</head>

<body style="background-color: #666666;">
    <div class="left-section">
        <div class="card">
            <img src="{{ asset('') }}users/login/logo.svg" alt="DANAKO">
            <h2>Masuk</h2>
            <p>Masuk untuk mulai berbuat kebaikan</p>
            <form action="#" method="post" id="login">
                <div class="form-group">
                    <label for="username" title="Username">
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                        <input type="text" id="username" name="username" placeholder="Username or Email" required>
                    </label>
                </div>
                <div class="form-group">
                    <label for="password" title="Password">
                        <span class="icon"><i class="fas fa-lock"></i></span>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <i class="far fa-eye" id="togglePassword" style="margin-left: -19px; cursor: pointer;"></i>
                    </label>
                </div>
                <a href="#" class="hyperlnk">Lupa kata sandi?</a>
                <div id="btn-login" style="width: 100%">
                    <button type="submit" class="login-btn">Masuk</button>
                </div>
                <a href="{{route('register')}}" class="hyperlnk">Belum punya akun? <b>Gabung Sekarang</b></a>
            </form>
            <p>atau lanjutkan dengan</p>
            <div class="circle-buttons">
                <a href="{{route('google.login') }}" class="google"><i class="fab fa-google"></i></a>
                <a href="{{route('facebook.login') }}" class="facebook"><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
    </div>

    <div class="right-section shade background-image">

    </div>

    {{-- <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script> --}}
    {{-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vb26e4fa9e5134444860be286fd8771851679335129114"
        integrity="sha512-M3hN/6cva/SjwrOtyXeUa5IuCT0sedyfT+jK/OV+s+D0RnzrTfwjwJHhd+wYfMm9HJSrZ1IKksOdddLuN6KOzw=="
        data-cf-beacon='{"rayId":"7af0d289ce7ea137","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.3.0","si":100}'
        crossorigin="anonymous"></script> --}}
        
    
    <script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#login').submit(function(e) {
                e.preventDefault();
                let username = $('#username').val();
                let password = $('#password').val();
                $.ajax({
                    url: "{{ route('api.user.login') }}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        username: username,
                        password: password,
                        _token: "{{ csrf_token() }}",
                    },
                    beforeSend: function() {
                        $('.login-btn').attr('disabled', true);
                        $('.login-btn').html(`<i class="fa fa-spinner fa-spin"></i>`);
                    },
                    success: function(response) {
                        const data = response.data;
                        localStorage.clear();
                        localStorage.setItem('_token', response.data.access_token);
                        window.location.href = "{{ route('afterlogin') }}";
                    },
                    error: function(response) {
                        let res = response.responseJSON;
                        Swal.fire({
                            title: 'ERROR',
                            text: res.meta.message,
                            icon: 'error',
                        })
                    },
                    complete: function(response) {
                        $('.login-btn').attr('disabled', false);
                        $('.login-btn').html(`Masuk`);
                    },
                });
            });

            $('#togglePassword').click(function(e){
                const input = $('#password');
                $(this).toggleClass('fa-eye fa-eye-slash');
                if(input.attr('type') == 'password'){
                    input.attr('type', 'text');
                }else{
                    input.attr('type', 'password');
                }
            })
        })
    </script>

</body>

</html>
