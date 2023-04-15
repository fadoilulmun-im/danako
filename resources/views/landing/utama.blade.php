@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')

<section class="h-utama">
    <div class="container-fluid">
        <div class="banner">
            <div class="row ">
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc</p>
                    <h2 class="pb-3">Lorem ipsum dolor sit  amet consectetur.</h1>
                    <button type="button" class="btn btn-primary btn-lg">Large button</button>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('') }}danako/img/campaignunggulan.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
  </section>

  <section class="info-danako">
    <div class="container">
        <div class="banner-info">
            <div class="row container">
                <h4 class="text-center pt-2">Lorem Ipsum</h4>
                <div class="col-md-3 text-center py-3 px-5">
                    <img src="{{ asset('') }}danako/img/Ellipse67.png">
                    <h5>Zakat</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla</p>
                </div>
                <div class="col-md-3 text-center py-3 px-5">
                    <img src="{{ asset('') }}danako/img/Ellipse67.png">
                    <h5>Zakat</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla</p>
                </div>
                <div class="col-md-3 text-center py-3 px-5">
                    <img src="{{ asset('') }}danako/img/Ellipse67.png">
                    <h5>Zakat</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla</p>
                </div>
                <div class="col-md-3 text-center py-3 px-5">
                    <img src="{{ asset('') }}danako/img/Ellipse67.png">
                    <h5>Zakat</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla</p>
                </div>
            </div>
        </div>
    </div>
  </section>

  <section class="pt-5 pb-5">
    <h1 class="text-center">Kategori lainnya</h1>

    <div id="kategori">
      <div class="text-center w-100">
        <div class="spinner-border" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    </div>
    
  </section>

  <div class="my-div information-container">
    <div class="container">
     <h1 class="title pt-5">Download Aplikasi DANAKO!</h1>
     <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla, elementum in diam sit amet, Lorem ipsum dolor sit amet, consectetur adipisci</h6>
     <div class="text-center">
       <img src="{{ asset('') }}danako/img/category/googleplay.png" style="padding-top: 24px; padding-bottom: 41px;" />
     </div>
    </div>
   </div>


@endsection


@push('after-script')
  <script>
    $(document).ready(function(){
      $.ajax({
        url: "{{ route('api.master.categories.list') }}?",
        type: "GET",
        dataType: "json",
        success: function(response){
          let data = response.data;
          $('#kategori').html(``);
          data.forEach((item, index) => {
            if(index % 2 != 0){
              $('#kategori').append(`
                <div class="konten-kanan container pt-5">
                  <div class="row">
                    <div class="col-md-6 ">
                      <img src="${item.logo_link ?? "{{ asset('') }}danako/img/kategori.png"}" class="img-fluid" style="width: 526px; height: 279px; object-fit: cover;">
                    </div>
                    <div class="col-md-6 mx-auto p-sm-5 p-md-5 text-right">
                      <h3>${item.name}</h3>
                      <p>Donate to our Environment Cause to reduce plastic pollution, fight climate change, protect our planet’s wildlife, and fund our collective dream of a sustainable future.</p>
                      <button type="button" class="btn btn-info text-white bg-danako-primary border-0 btn-lg">Donasi</button>
                    </div>
                  </div>
                </div>
              `)
            }else{
              $('#kategori').append(`
                <div class="konten-kanan container pt-5">
                  <div class="row">
                    <div class="col-md-6 mx-auto p-sm-5 p-md-5">
                      <h3>${item.name}</h3>
                      <p>Donate to our Environment Cause to reduce plastic pollution, fight climate change, protect our planet’s wildlife, and fund our collective dream of a sustainable future.</p>
                      <button type="button" class="btn btn-info text-white bg-danako-primary border-0 btn-lg">Donasi</button>
                    </div>
                    <div class="col-md-6 ">
                      <img src="${item.logo_link ?? "{{ asset('') }}danako/img/kategori.png"}" class="img-fluid" style="width: 526px; height: 279px; object-fit: cover;">
                    </div>
                  </div>
                </div>
              `)
            }
            
          });
        }
      })
    })
  </script>
@endpush


