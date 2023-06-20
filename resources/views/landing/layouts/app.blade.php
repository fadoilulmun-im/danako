<!doctype html>
<html lang="zxx" class="h-100">

<head>
    @include('landing.includes.meta')

    <title>@yield('title')</title>

    @stack('before-style')
    @include('landing.includes.style')
    @stack('after-style')

    <style>
         .loader {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Efek spinner */
        @keyframes spinner {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Mengatur animasi spinner pada loader */
        .loader img {
            animation: spinner 1s linear infinite;
        }
    </style>
</head>

<body>

    <div id="loader" class="loader">
        <img src="{{ asset('danako/img/icon - yellow green.png') }}" alt="Loader" style="width: 100px; height: 100px;">
    </div>
    

    <div id="konten" class="pt-5" style="display: none;">
        @include('landing.includes.navbar')
        @yield('content')
        @include('landing.includes.footer')
    </div>

    @stack('before-script')
    @include('landing.includes.script')
    @stack('after-script')

    <script>
        // Fungsi untuk menampilkan tampilan setelah penundaan 10 detik
        function showContent() {
            var loader = document.getElementById('loader');
            var konten = document.getElementById('konten');

            // Menampilkan tampilan dan menyembunyikan loader
            konten.style.display = 'block';
            loader.style.display = 'none';
        }

        // Panggil fungsi showContent setelah penundaan 10 detik
        setTimeout(showContent, 2000);
    </script>
</body>

</html>
