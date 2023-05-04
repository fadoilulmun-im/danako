<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <script src="https://kit.fontawesome.com/5fde2fdc76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap">
    <link rel="stylesheet" href="{{ asset('') }}users/login/style.css">
    <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
</head>

<body>
    <div class="left-section">
        <div class="card">
            <img src="{{ asset('users/login/logo.svg') }}" alt="DANAKO">
            <h2>Daftar</h2>
            <p>Daftar akun untuk mulai berbuat kebaikan</p>
            <form action="" method="post" id="register">
                <div class="form-group">
                    <label for="nama-pengguna" title="Nama Lengkap">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <input type="text" id="name" name="name" placeholder="Nama Lengkap">
                    </label>
                </div>
                <div class="form-group">
                    <label for="username" title="Username">
                        <span class="icon"><i class="fa-sharp fa-solid fa-at"></i></span>
                        <input type="text" id="username" name="username" placeholder="Username">
                    </label>
                </div>
                {{-- <div class="form-group">
                    <label for="nomor-telepon" title="Nomor Telepon">
                        <span class="icon"><i class="fa-solid fa-phone"></i></span>
                        <input type="text" id="phone_number" name="phone_number" placeholder="Nomor Telepon">
                    </label>
                </div> --}}
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
                <button type="submit" class="signup-btn">Daftar</button>
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

    <script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#register').submit(function(e) {
                e.preventDefault();
                var name = $('input[name="name"]').val();
                var username = $('input[name="username"]').val();
                var email = $('input[name="email"]').val();
                var password = $('input[name="password"]').val();

                $.ajax({
                    url: "{{ route('api.user.register') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        name: name,
                        email: email,
                        username: username,
                        password: password,
                        token: "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        $('.signup-btn').html(`<i class="fa fa-spinner fa-spin"></i>`);
                    },
                    success: function(response) {
                        window.location.href = "{{ route('konfirmasi-email') }}";
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
                        $('.signup-btn').html(`Daftar`);
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
        });
    </script>

</body>

</html>
