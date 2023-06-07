<!doctype html>
<html lang="zxx">

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

    <div id="content" style="display: none;">
        @include('landing.includes.navbar')
        <section class="account-section pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="account-information">
                            <div class="profile-thumb">
                                <img width="100" src="{{ asset('') }}danako/img/akun.png" alt="account holder image" id="img-profile-now">
                                <h3 id="name-now">Loading...</h3>
                                <p id="username-now">Loading..</p>
                                <p id="status" class="pt-3">
                                    <i class="fas fa-check-circle text-primary me-2"></i>
                                   
                                </p>
                                  
                            </div>
    
                            <ul>
                                <li>
                                    <a href="/profile" class="<?php echo (request()->is('profile')) ? 'active' : ''; ?>">
                                        <i class='bx bx-heart'></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="/donasi" class="<?php echo (request()->is('donasi*')) ? 'active' : ''; ?>">
                                        <i class='bx bx-heart'></i>
                                        Donasi Anda
                                    </a>
                                </li>
                                <li>
                                   
                                    <a href="/profile-campaign" class="<?php echo (request()->is('profile-campaign*')) ? 'active' : ''; ?>">
                                        <i class='bx bx-heart'></i>
                                        Campaign Anda
                                    </a>
                                </li>
                                
                                {{-- <li>
                                    <a href="#">
                                        <i class='bx bx-lock-alt' ></i>
                                        Change Password
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bx-coffee-togo'></i>
                                        Delete Account
                                    </a>
                                </li> --}}
                                
                                <li>
                                    <a href="#" onclick="logout()">
                                        <i class='bx bx-log-out'></i>
                                        Log Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
    
                    <div class="col-md-9">
                        @yield('content')    
                    </div>
                </div>
            </div>
        </section> 
        @include('landing.includes.footer')
    </div>
 
    @stack('before-script')
    @include('landing.includes.script')
    @stack('after-script')

    <script>
$(document).ready(() => {
  $.ajax({
    url: "{{ route('api.me') }}",
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}",
      'Authorization': 'Bearer ' + localStorage.getItem('_token'),
    },
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      const data = response.data;
      if (data.detail && data.detail.status === 'verified') {
        $('#status').find('.text-primary').text(data.detail.status);
        $('#status').show();
      }
      $('#name-now').text(data.name);
      $('#username-now').text(data.username);
      $('#img-profile-now').attr('src', data.photo_profile);
    }
  });
});



    </script>

<script>
    // Fungsi untuk menampilkan tampilan setelah penundaan 10 detik
    function showContent() {
        var loader = document.getElementById('loader');
        var content = document.getElementById('content');

        // Menampilkan tampilan dan menyembunyikan loader
        content.style.display = 'block';
        loader.style.display = 'none';
    }

    // Panggil fungsi showContent setelah penundaan 10 detik
    setTimeout(showContent, 2000);
</script>

</body>

</html>
