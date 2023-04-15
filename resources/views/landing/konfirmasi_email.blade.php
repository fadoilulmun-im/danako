@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')

<section class="email-confirm">
  <div class="card">
      {{-- <img src="{{ asset('') }}danako/img/logotext.png" alt="Image" class="img-fluid" style="margin-bottom: 60px;" /> --}}
      <img src="{{ asset('') }}danako/img/icon/centang.png" alt="Image" style="width: 87px;
      height: 87px;" />
       <h2 class="title">Cek email masuk</h1>
      <p>Kami telah mengirimi email konfirmasi untuk aktivasi akun anda. Silahkan cek di folder spam apabila tidak menemukan email masuk di inbox</p>
    </div>
 </section>


@endsection


@push('after-script')




<script>

  </script>
@endpush


