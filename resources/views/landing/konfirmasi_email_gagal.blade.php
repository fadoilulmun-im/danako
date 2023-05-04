@extends('landing.layouts.app')

@section('title')
  Konfirmasi Email
@endsection



@section('content')

<section class="email-confirm">
  <div class="card">
      {{-- <img src="{{ asset('') }}danako/img/logotext.png" alt="Image" class="img-fluid" style="margin-bottom: 60px;" /> --}}
      <img src="{{ asset('') }}danako/img/gagal.png" alt="Image" class="img-fluid pt-3"/>
       <h2 class="title text-danger">Email Gagal Verifikasi</h1>
      <p>Kami ingin memberitahukan bahwa kami tidak dapat memverifikasi email Anda untuk akun Anda. Ini mungkin disebabkan oleh beberapa faktor, termasuk kesalahan penulisan email Anda atau masalah teknis dengan sistem kami.</p>
    </div>
 </section>


@endsection


@push('after-script')
  <script>

  </script>
@endpush


