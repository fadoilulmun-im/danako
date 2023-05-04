@extends('landing.layouts.app')

@section('title')
  Kategori
@endsection



@section('content')


  <div class="container">
  <div class="title">
     
      <span>{{ $category->name }}</span>
  </div>
  </div>

  <!-- slider -->
  <div class="container pb-80">
    <div class="slider">
      <h2 class="text-center"><span class="title-gren">Tolong!</span>Mereka segera butuh bantuanmu</h2>
  
    </div>
  </div>





@endsection


@push('after-script')

@endpush


