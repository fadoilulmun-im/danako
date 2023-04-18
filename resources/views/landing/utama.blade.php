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
                    <p class="text-dark">Tak perlu sejuta untuk berdampak, mulai dari seribu</p>
                    <h1 class="pb-3 color-primary">Satukan kebaikan<br><span class="text-dark">Salurkan kebermanfaatan.</span> </h1>
                    <button type="button" class="btn btn-primary btn-lg bg-danako-primary border-0 border-5">Donasi sekarang</button>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('') }}danako/img/campaignunggulan.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
  </section>

  <a href="{{ url('ziswaf') }}">
    <section class="info-danako">
      <div class="container">
          <div class="banner-info">
              <div class="row container">
                  <h4 class="text-center pt-2 text-black">Lorem Ipsum</h4>
                  <div class="col-md-3 text-center py-3 px-5">
                      <img src="{{ asset('') }}danako/img/Ellipse67.png">
                      <h5>Zakat</h5>
                      <p>Sedekahkan harta, berbagilah dengan mereka yang membutuhkan.</p>
                  </div>
                  <div class="col-md-3 text-center py-3 px-5">
                      <img src="{{ asset('') }}danako/img/Ellipse67.png">
                      <h5>Infaq</h5>
                      <p>Derma dari hati, tak terbatas waktu dan materi, demi kepentingan khalayak umum.</p>
                  </div>
                  <div class="col-md-3 text-center py-3 px-5">
                      <img src="{{ asset('') }}danako/img/Ellipse67.png">
                      <h5>Sedekah</h5>
                      <p>Berikanlah bantuan dengan tulus, ringankan beban mereka yang terpuruk.</p>
                  </div>
                  <div class="col-md-3 text-center py-3 px-5">
                      <img src="{{ asset('') }}danako/img/Ellipse67.png">
                      <h5>Wakaf</h5>
                      <p>Tanamkan amal jariyah, beri manfaat untuk umat selamanya.</p>
                  </div>
              </div>
          </div>
      </div>
    </section>
  </a>

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
                      <a href="{{ route('kategori', '') }}/${item.id}" class="btn btn-info text-white bg-danako-primary border-0 btn-lg">Donasi</a>
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
                      <a href="{{ route('kategori', '') }}/${item.id}" class="btn btn-info text-white bg-danako-primary border-0 btn-lg">Donasi</a>
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


