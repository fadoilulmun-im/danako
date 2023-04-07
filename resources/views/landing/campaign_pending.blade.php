@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')


<div class="container pt-3 pb-3">
      <img src="{{ asset('') }}danako/img/Expand_left.svg" />
</div>

<section class="c-notverifikasi">
  <div class="d-flex justify-content-center flex-column"> <!-- tambahkan flex-column -->
    <div class="row">
      <div class="col-md-12">
        <div class="title">
          <h6>Mulai buat campaign di DANAKO</h6>
          <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor</p>
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
  </div>
</section>

@endsection


@push('after-script')




<script>

  </script>
@endpush


