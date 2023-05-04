@extends('landing.layouts.app')

@section('title')
  Konfirmasi Email
@endsection



@section('content')

<section class="email-confirm">
  <div class="card">
      {{-- <img src="{{ asset('') }}danako/img/logotext.png" alt="Image" class="img-fluid" style="margin-bottom: 60px;" /> --}}
      <img src="{{ asset('') }}danako/img/sukses.png" alt="Image"  class="pt-3"/>
       <h2 class="title">Email Berhasil Verifikasi</h1>
      <p>Terimakasih atas pendaftaran Anda di Danako. Kami ingin memberitahukan bahwa pesanan Anda telah kami terima dan sedang diproses untuk akun.</p>
    </div>
 </section>


@endsection


@push('after-script')
  <script>

  </script>
@endpush


