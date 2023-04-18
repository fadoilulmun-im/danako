@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')


{{-- <div class="container pt-3 pb-3">
      <img src="{{ asset('') }}danako/img/Expand_left.svg" />
</div> --}}

<section class="c-notverifikasi mb-4 mt-4">
  <div class="d-flex justify-content-center flex-column"> <!-- tambahkan flex-column -->
    <div class="row">
      <div class="col-md-12">
        <div class="title">
          <h6>Mulai buat campaign di <span class="color-primary">Danako</span></h6>
          <p>Dan ringankan beban tanggungan dikala membutuhkan!</p>
        </div>
      </div>
    </div>

    <div class="row container">
      <div class="col-md-6 pt-5">
        <div class="card text-center">
          <img src="{{ asset('') }}danako/img/campaign/keungulan.png" class="card-img-top mx-auto d-block my-5 konten" alt="Responsive image">
        </div>
      </div>
      
      <div class="col-md-6 pt-5">
        <div class="card text-center">
          <img src="{{ asset('') }}danako/img/campaign/langkah.png" class="card-img-top mx-auto d-block my-5 konten" alt="Responsive image" >
        </div>
      </div>

    </div>

    <a href="{{ url('buat-campaign') }}" class="btn btn-outline-success text-black btn-lg bg-white mt-4 ">Lanjut</a>

  </div>
</section>

@endsection


@push('after-script')




<script>

  </script>
@endpush


