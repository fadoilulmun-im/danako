@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')


<div class="container pt-3 pb-3">
     
</div>

<section class="c-notverifikasi">
  <div class="d-flex justify-content-center flex-column"> <!-- tambahkan flex-column -->
  

    <div class="row pt-5">
      <div class="col-md-12">
        <div class="konten-verifikasi">
          <p class="title-pending pt-5">Data Anda Sedang Diverifikasi</p>
          <p class="title-konten pt-2">Silahkan tunggu pihak Danako mengonfirmasi data anda dalam waktu maksimal 3x24 jam</p>
          <p class="title-konten pt-4" >Jika ada pertanyaan lebih lanjut silahkan <span class="color-primary">Hubungi Kami</span></p>
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


