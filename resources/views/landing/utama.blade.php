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
                  <h4 class="text-center pt-2 text-dark">Ziswaf</h4>
                  <div class="col-md-3 text-center py-3 px-5">
                      
                    <i class="fa-solid fa-hand-holding-heart fa-2xl" style="color: #1c913c;"></i>

                      <h5 class="text-dark pt-2">Zakat</h5>
                      <p class="text-dark">Sedekahkan harta, berbagilah dengan mereka yang membutuhkan.</p>
                  </div>
                  <div class="col-md-3 text-center py-3 px-5">
                   
                  <i class="fa-solid fa-star-and-crescent fa-2xl" style="color: #1c913c;"></i>
                    
                   
                      <h5 class="text-dark pt-2">Infaq</h5>
                      <p class="text-dark">Derma dari hati, tak terbatas waktu dan materi, demi kepentingan khalayak umum.</p>
                  </div>
                  <div class="col-md-3 text-center py-3 px-5">
                <i class="fa-solid fa-hand-holding-droplet fa-2xl" style="color: #1c913c;"></i>
                    
                      <h5 class="text-dark pt-2">Sedekah</h5>
                      <p class="text-dark">Berikanlah bantuan dengan tulus, ringankan beban mereka yang terpuruk.</p>
                  </div>
                  <div class="col-md-3 text-center py-3 px-5">
                   <i class="fa-solid fa-building fa-2xl" style="color: #1c913c;"></i>
                      <h5 class="text-dark pt-2">Wakaf</h5>
                      <p class="text-dark">Tanamkan amal jariyah, beri manfaat untuk umat selamanya.</p>
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
    <h6 class="text-center">Nikmati Kemudahan Beramal dan Salurkan bantuanmu di manapun bersama DANAKO</h6>
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
                      <img src="${item.logo_link ?? "{{ asset('assets/images/image-solid.svg') }}"}" class="img-fluid" style="width: 526px; height: 279px; object-fit: cover;">
                    </div>
                    <div class="col-md-6 mx-auto p-sm-5 p-md-5 text-right">
                      <h3>${item.name}</h3>
                      <p>Ini adalah kampanye untuk mengumpulkan dana untuk tujuan ${item.name} yang lebih mulia untuk membantu kemanusia. Dengan melakukan donasi, Anda akan mendukung inisiatif yang akan memiliki dampak positif bagi umat manusia kedepanyan.</p>
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
                      <p>Ini adalah kampanye untuk mengumpulkan dana untuk tujuan ${item.name} yang lebih mulia untuk membantu kemanusia. Dengan melakukan donasi, Anda akan mendukung inisiatif yang akan memiliki dampak positif bagi umat manusia.</p>
                      <a href="{{ route('kategori', '') }}/${item.id}" class="btn btn-info text-white bg-danako-primary border-0 btn-lg">Donasi</a>
                    </div>
                    <div class="col-md-6 ">
                      <img src="${item.logo_link ?? "{{ asset('assets/images/image-solid.svg') }}"}" class="img-fluid" style="width: 526px; height: 279px; object-fit: cover;">
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


