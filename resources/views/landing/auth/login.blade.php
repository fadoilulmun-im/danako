@extends('landing.layouts.login')

@section('title')
    Dashboard
@endsection


@section('content')

<div class="left-section">
  <div class="card">
    <img src="{{ asset('danako/img/logotext.png') }}" alt="DANAKO">
    <h2>Masuk</h2>
    <p>Masuk untuk mulai berbuat kebaikan</p>
    <form action="" method="post">
      <div class="form-group">
        <label for="email" title="Email address">
          <span class="icon"><i class="fas fa-envelope"></i></span>
          <input type="email" id="email" name="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
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
      <button type="submit" class="login-btn">Masuk</button>
      <a href="#" class="hyperlnk">Belum punya akun? <b>Gabung Sekarang</b></a>
    </form>
    <p>atau lanjutkan dengan</p>
    <div class="circle-buttons">
      <a href="#" class="google"><i class="fab fa-google"></i></a>
      <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
    </div>    
  </div>
</div>

<div class="right-section shade background-image">
  
@endsection


@push('after-script')

@endpush


