@extends('landing.layouts.app')

@section('title')
  Kategori
@endsection



@section('content')


  

  <!-- slider -->
  <div class="container pb-80">
    <div class="slider">
      <h2 class="text-center"><span class="title-gren px-3">PROSEDUR</span>MULAI CAMPAIGN DI DANAKO</h2>
      <div class="row container pt-3">
        <div class="col-md-3">
          <img src="{{ asset('danako/img/p1.png') }}" class="img img-fluid" />
        </div>
        <div class="col-md-3">
          <img src="{{ asset('danako/img/p2.png') }}" class="img img-fluid" />
        </div>
        <div class="col-md-3">
          <img src="{{ asset('danako/img/p3.png') }}" class="img img-fluid" />
        </div>
        <div class="col-md-3">
          <img src="{{ asset('danako/img/p4.png') }}" class="img img-fluid" />
        </div>
      </div>
    </div>
  </div>





@endsection


@push('after-script')

@endpush


