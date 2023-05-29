<!doctype html>
<html lang="zxx">

<head>
    @include('landing.includes.meta')

    <title>@yield('title')</title>

    @stack('before-style')
    @include('landing.includes.style')
    @stack('after-style')
</head>

<body>

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
</body>

</html>
