<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Landing Page</title>
  <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('custom/css/style.css') }}">

</head>
<body class="bg-dark">

  <nav class="navbar navbar-landing bg-white">
    <div class="container">
      <div class="logo">
        <a href="/">
          <img src="{{ asset('custom/images/logo.svg') }}" alt="logo">
        </a>
      </div>

      <div class="search">
        <input type="text" class="search-landing" placeholder='&#xF002; Coba cari "Bencana alam"'>
      </div>

      <div class="menu-landing">
        <a href="#" class="menu-link-landing">Prosedur</a>
        <a href="#" class="menu-link-landing">FAQs</a>
        <a href="#" class="menu-link-landing">Tentang Kami</a>
      </div>

      <div class="login">
        <a href="{{route('admin.dashboard')}}" class="btn btn-success-landing login d-flex align-items-center">
          Masuk
          <img src="{{ asset('custom/icons/arrow-login.svg') }}" class="ms-2">
        </a>
      </div>
    </div>
  </nav>

  <header class="header">
    <div class="text-center">
      <div class="text-header">
        <h1 class="h1-header color-success-landing">
          Lorem ipsum dolor <span class="text-white">sit  amet</span>
          consectetur
        </h1>
        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc</p>
      </div>
      <div class="btn-header mt-4">
        <button class="btn btn-success-landing">Donasi Sekarang</button>
        <button class="btn btn-outline-white-landing">Ajukan Campaign</button>
      </div>
    </div>
  </header>
  
  <section class="hero py-4">
    <div class="container text-center">
      <h2 class="text-white">
        Kenapa pilih  
        <img src="{{ asset('custom/images/logo.svg') }}" alt="logo" height="21px"/>
        ?
      </h2>
      <div class="row">
        <div class="col-4 py-3 px-5">
          <div class="card p-2">
            <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
              <div class="icon">
                <img src="{{ asset('') }}custom/icons/Time_progress_light-1.svg" alt="">
              </div>
              <h5 class="m-0">Cepat dan Tepat</h5>
            </div>
            <div class="card-body text-start text-hero">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, Lorem ipsum dolor sit amet, consectetur 
            </div>
          </div>
        </div>
        <div class="col-4 py-3 px-5">
          <div class="card p-2">
            <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
              <div class="icon">
                <img src="{{ asset('') }}custom/icons/Done_all_round_light.svg" alt="">
              </div>
              <h5 class="m-0">Cepat dan Tepat</h5>
            </div>
            <div class="card-body text-start text-hero">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, Lorem ipsum dolor sit amet, consectetur 
            </div>
          </div>
        </div>
        <div class="col-4 py-3 px-5">
          <div class="card p-2">
            <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
              <div class="icon">
                <img src="{{ asset('') }}custom/icons/Line_up_light.svg" alt="">
              </div>
              <h5 class="m-0">Cepat dan Tepat</h5>
            </div>
            <div class="card-body text-start text-hero">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, Lorem ipsum dolor sit amet, consectetur 
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <footer class="py-4 text-footer footer">
    <div class="container">
      <div class="row align-items-center mb-4">
        <div class="col-6 text-start">
          <h5 class="color-success-landing m-0">Tentang Kami</h5>
        </div>
        <div class="col-6 text-end">
          <div class="logo">
            <img src="{{ asset('custom/images/logo.svg') }}" alt="logo">
          </div>
        </div>
      </div>
      <div class="row align-items-center mb-5">
        <div class="col-6 text-start">
          <p class="m-0">E-mail: cs.lmizakat@gmail.com</p>
          <p class="m-0">Alamat: Gedung Sehati, Jl. Barata Jaya XXII No.20, Baratajaya,</p>
          <p class="m-0">Kec. Gubeng, Kota SBY, Jawa Timur 60284</p> 
          <p class="m-0">Telp: (031) 5053883</p>
        </div>
        <div class="col-6 text-end">
          <p class="m-0">DANAKO telah mendapatkan izin sesuai dengan</p>
          <p class="m-0">SK Menkumham: AHU-1279.AH.01.04 Thn.2009</p>
          <p class="m-0">SK Menteri Agama RI: No.672 Thn 2021</p>
          <p class="m-0">SK BWI: 3.3.00231 Thn.2019</p>
        </div>
      </div>
      <div class="row align-items-end">
        <div class="col-6 text-start">
          Copyright ©2023 All rights reserved | ICT IT LMI
        </div>
        <div class="col-6 text-end">
          <span class="icon-footer">
            <img src="{{ asset('custom/icons/facebook.svg') }}" alt="">
          </span>
          <span class="icon-footer">
            <img src="{{ asset('custom/icons/telegram.svg') }}" alt="">
          </span>
          <span class="icon-footer">
            <img src="{{ asset('custom/icons/youtube.svg') }}" alt="">
          </span>
          <span class="icon-footer">
            <img src="{{ asset('custom/icons/instagram.svg') }}" alt="">
          </span>
        </div>
      </div>
    </div>
  </footer>


  <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>