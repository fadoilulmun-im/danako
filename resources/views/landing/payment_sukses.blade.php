@extends('landing.layouts.app')

@section('title', 'Payment Sukses')

@section('content')

<br>
<section class="c-notverifikasi pt-5">
    <div class="d-flex justify-content-center flex-column"> <!-- tambahkan flex-column -->
      <div class="row">
        <div class="col-lg-12">
          <div class="konten-verifikasi">
            {{-- <div class="col-1 pt-2">
             
            </div> --}}
            <img src="{{ asset('') }}danako/img/sukses.png" alt="Image"  class="pt-3"/>
            <p class="title-pending pt-3">Pembayaran Anda Berhasil</p>
            {{-- <p class="title-konten pt-2">Anda sudah melakukan verifikasi akun. Dan sekarang akun anda sedang kami lakukan validasi, silahkan tunggu 3x24 jam</p> --}}
            <p class="title-konten pt-4" >Jika ada pertanyaan lebih lanjut silahkan Hubungi Kami</p>
          </div>
        </div>
      </div>
        
        

      </div>
    </div>
  </section>
  <br>

@endsection


@push('after-script')




<script>

  </script>
@endpush


