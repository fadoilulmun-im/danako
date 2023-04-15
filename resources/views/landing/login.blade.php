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
</head>

<body style="background-color: #666666;">
    <div class="left-section">
        <div class="card">
            <img src="{{ asset('') }}users/login/logo.svg" alt="DANAKO">
            <h2>Masuk</h2>
            <p>Masuk untuk mulai berbuat kebaikan</p>
            <form action="#" method="post" id="login">
                <div class="form-group">
                    <label for="email" title="Email address">
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                        <input type="email" id="email" name="email" placeholder="Email" required
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
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
                <button type="submit" class="login-btn" id="btn-login">Masuk</button>
                <a href="{{route('register')}}" class="hyperlnk">Belum punya akun? <b>Gabung Sekarang</b></a>
            </form>
            <p>atau lanjutkan dengan</p>
            <div class="circle-buttons">
                <a href="{{route('google.login') }}" class="google"><i class="fab fa-google"></i></a>
                <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
    </div>

    <div class="right-section shade background-image">

    </div>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vb26e4fa9e5134444860be286fd8771851679335129114"
        integrity="sha512-M3hN/6cva/SjwrOtyXeUa5IuCT0sedyfT+jK/OV+s+D0RnzrTfwjwJHhd+wYfMm9HJSrZ1IKksOdddLuN6KOzw=="
        data-cf-beacon='{"rayId":"7af0d289ce7ea137","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.3.0","si":100}'
        crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            $('#login').submit(function(e) {
                e.preventDefault();
                let email = $('#email').val();
                let password = $('#password').val();
                $.ajax({
                    url: "{{ route('api.user.login') }}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        email: email,
                        password: password
                    },
                    beforeSend: function() {
                        $('#btn-login').html(`
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                  `);

                        $('#btn-login').toggleClass('disabled');
                    },
                    success: function(response) {
                        console.log('success', response)
                        window.location.href = "{{ route('landing') }}";
                    },
                    error: function(response) {

                        $('#btn-login').toggleClass('disabled');
                        $('#btn-login').html('Log In');
                        let res = response.responseJSON;

                        $('#alert').html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  `)
                    },
                });
            });
        })
    </script>

</body>

</html>
