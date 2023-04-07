@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')

<br>
<section class="c-notverifikasi">
  <div class="d-flex justify-content-center flex-column"> <!-- tambahkan flex-column -->
    <div class="row">
      <div class="col-lg-12">
        <div class="konten-verifikasi">
          <div class="col-1 pt-2">
            <img src="{{ asset('') }}danako/img/Expand_left.svg"/>
          </div>
          <img src="{{ asset('') }}danako/img/gagal.png" alt="Image" />
          <p class="title-pending ">Data Anda Sedang Diverifikasi</p>
          <p class="title-konten ">Anda sudah melakukan verifikasi akun. Dan sekarang akun anda sedang kami lakukan validasi, silahkan tunggu 3x24 jam</p>
          <p class="title-konten " >Jika ada pertanyaan lebih lanjut silahkan Hubungi Kami</p>
        </div>
      </div>
    </div>
      
      

    </div>
  </div>
</section>

@endsection


@push('after-script')




<script>

  </script>
@endpush


