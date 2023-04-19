@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')

<br>

<div class="container">
    <div class="title">
        <img src="{{ asset('') }}danako/img/Expand_left.svg" />
        <span>Zakat</span>
    </div>
  </div>

  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-12 form-bg">
          <h2 class="col-md-10 text-center mt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
          <div class="container">
            <p class="mb-4 mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, vestibulum ac ipsum. Praesent vitae vulputate urna. Pellentesque molestie felis ante, vitae viverra ipsum mattis id. In hac habitasse platea dictumst. Ut vel sagittis diam. Maecenas congue sollicitudin volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla porttitor nisl id eleifend fermentumLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, vestibulum ac ipsum. Praesent vitae vulputate urna. Pellentesque molestie felis ante, vitae viverra ipsum mattis id. In hac habitasse platea dictumst. Ut vel sagittis diam. Maecenas congue sollicitudin volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla porttitor nisl id eleifend fermentumLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, vestibulum ac ipsum. Praesent vitae vulputate urna. Pellentesque molestie felis ante, vitae viverra ipsum mattis id. In hac habitasse platea dictumst. Ut vel sagittis diam. Maecenas congue sollicitudin volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla porttitor nisl id eleifend fermentum</p>
          </div>
          <h2 class="text-center">Lorem ipsum dolor sit amet</h2>
          <div class="d-flex justify-content-center mt-5 mb-5">
            <a href="{{ url('hitung-profesi') }}" class="btn btn-primary btn-lg me-5 bg-danako-primary bt-zakat">Zakat Profesi</a>
            <a href="{{ url('hitung-maal') }}" class="btn btn-secondary btn-lg bg-danako-primary bt-zakat">Zakat Maal</a>
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


