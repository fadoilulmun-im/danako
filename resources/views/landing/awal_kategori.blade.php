@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')


<section class=" py-4">
    <div class="container-fluid text-center">
     
      </h2>
      <div class="row py-3 px-4">
        <div class="col-md-4 py-3 px-4">
          <div class="card p-2">
            <h2>Gempa Cianjur Lorem</h2>
            <div class="card-body text-start text-hero">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, Lorem ipsum dolor sit amet, consectetur 
            </div>
            <p>Lihat Detail Campaign</p>
            <img src="{{ asset('') }}danako/img/awal.png">
          </div>
        </div>
        
        <div class="col-md-8 py-3 px-4 rounded-2" style="background-color: #EEF4E6;">
          <h6 class="pt-5">Uluran tangan anda sudah membantu mereka sejauh ini...</h6>
          <p class="pb-4">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor</p>
          <div class="card p-2">
            <div class="row">
              <div class="col-md-6">
                <div class="card p-2">
                  <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
                    <div class="icon">
                      <h6 class="m-0">Pemberian bantuan berast</h6>
                    </div>
                    <h6 class="m-0">Selasa 30 Februari 2023</h6>
                  </div>
                  <div class="card-body text-start text-hero">
                    em ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla, elementum in diam...
                  </div>
                  <a href="#" class="pt-2">Lihat detail bantuan</a>
                  <img src="{{ asset('') }}danako/img/awal1.png" class="img-fluid pt-2 pb-4"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="card p-2">
                  <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
                    <div class="icon">
                      <h6 class="m-0">Pemberian bantuan berast</h6>
                    </div>
                    <h6 class="m-0">Selasa 30 Februari 2023</h6>
                  </div>
                  <div class="card-body text-start text-hero">
                    em ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla, elementum in diam...
                  </div>
                  <a href="#" class="pt-2">Lihat detail bantuan</a>
                  <img src="{{ asset('') }}danako/img/awal1.png" class="img-fluid pt-2 pb-4"> 
                </div>
              </div>
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


