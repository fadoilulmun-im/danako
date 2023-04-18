@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')

 <div class="container">
        <div class="title">
            <img src="{{ asset('') }}danako/img/Expand_left.svg" />
            <span>Ziswaf</span>
        </div>
      </div>

      <div class="container">
        <div class="row">

            <div class="col-md-3 mb-4">
              <div class="card">
                <div class="container">
                  <div class="card-body">
                    <div class="card-body d-flex align-items-center">
                      <img src="https://via.placeholder.com/60" alt="Card image cap" class="rounded-circle me-3">
                      <h5 class="card-title mb-0">Zakat</h5>
                    </div>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla, elementum in diam sit amet, Lorem ipsum dolor sit amet, consectetur adipisci.</p>
                  </div>
                  <img src="{{ asset('') }}danako/img/ziswaf/1.png" class="card-img-top" alt="...">
                </div>
              </div>
            </div>
          
            <div class="col-md-3 mb-4">
              <div class="card">
                <div class="container">
                  <img src="{{ asset('') }}danako/img/ziswaf/1.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <div class="card-body d-flex align-items-center">
                      <img src="https://via.placeholder.com/60" alt="Card image cap" class="rounded-circle me-3">
                      <h5 class="card-title mb-0">Zakat</h5>
                    </div>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla, elementum in diam sit amet, Lorem ipsum dolor sit amet, consectetur adipisci.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                  <div class="container">
                    <div class="card-body">
                      <div class="card-body d-flex align-items-center">
                        <img src="https://via.placeholder.com/60" alt="Card image cap" class="rounded-circle me-3">
                        <h5 class="card-title mb-0">Zakat</h5>
                      </div>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla, elementum in diam sit amet, Lorem ipsum dolor sit amet, consectetur adipisci.</p>
                    </div>
                    <img src="{{ asset('') }}danako/img/ziswaf/1.png" class="card-img-top" alt="...">
                  </div>
                </div>
              </div>
            
              <div class="col-md-3 mb-4">
                <div class="card">
                  <div class="container">
                    <img src="{{ asset('') }}danako/img/ziswaf/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <div class="card-body d-flex align-items-center">
                        <img src="https://via.placeholder.com/60" alt="Card image cap" class="rounded-circle me-3">
                        <h5 class="card-title mb-0">Zakat</h5>
                      </div>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla, elementum in diam sit amet, Lorem ipsum dolor sit amet, consectetur adipisci.</p>
                    </div>
                  </div>
                </div>
              </div>

          </div>
      </div>

@endsection


@push('after-script')




<script>

  </script>
@endpush


