@extends('landing.layouts.app')

@section('title')
  Home
@endsection



@section('content')
  <header class="header">
    <div class="container">
     <div class="text-center">
       <div class="text-header">
         <h1 class="color-primary">
          Satukan kebaikan <span class="text-white">Salurkan </span>
           <br>
           Kebermanfaatan
         </h1>
         <p class="text-white">Tak perlu sejuta untuk berdampak, mulai dari seribu</p>
       </div>
       <div class="btn-header pt-5">
         <a href="{{ url('Halaman-utama') }}" class="btn btn-primary btn-lg bg-danako-primary border-0 bt-index mx-5 ">Donasi sekarang</a>
         <a href="{{ url('ajukan-campaign') }}" class="btn btn-outline-secondary btn-lg mx-5 border-2 bt-index text-white">Ajukan campaign</a>
       </div>
     </div>
    </div>
  </header>
   
   
   <section class="hero py-4">
     <div class="container text-center">
       <h2 class="text-white">
         Kenapa pilih  
         <img src="{{ asset('danako/img/logo.png') }}" alt="logo" height="21px"/>
         ?
       </h2>
       <div class="row pilih-bg">
         <div class="col-md-4 py-3 px-5 " data-aos="fade-up">
           <div class="card p-2">
             <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
               <div class="icon">
                 <img src="{{ asset('') }}custom/icons/Time_progress_light-1.svg" alt="">
               </div>
               <h5 class="m-0">Cepat dan Tepat</h5>
             </div>
             <div class="card-body text-start text-hero">
              Kami mengutamakan kecepatan dan ketepatan dalam menyalurkan donasi. Hal ini tentunya akan sangat berguna bagi mereka yang saat ini sedang membutuhkan dana darurat.
             </div>
           </div>
         </div>
         <div class="col-md-4 py-3 px-5"  data-aos="fade-up">
           <div class="card p-2">
             <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
               <div class="icon">
                 <img src="{{ asset('') }}custom/icons/Done_all_round_light.svg" alt="">
               </div>
               <h5 class="m-0">Amanah</h5>
             </div>
             <div class="card-body text-start text-hero">
              Kami berkomitmen untuk menjaga kepercayaan Anda sebagai donatur. Oleh karena itu, kami selalu memastikan transparansi dan akuntabilitas dalam mengelola donasi yang diterima.
             </div>
           </div>
         </div>
         <div class="col-md-4 py-3 px-5"  data-aos="fade-up">
           <div class="card p-2">
             <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
               <div class="icon">
                 <img src="{{ asset('') }}custom/icons/Line_up_light.svg" alt="">
               </div>
               <h5 class="m-0">Berdampak</h5>
             </div>
             <div class="card-body text-start text-hero">
              Berikan dampak yang positif bagi mereka yang membutuhkan. Jadilah bagian dari perubahan bagi umat yang bermanfaat dan berdampak melalui platform DANAKO.
             </div>
           </div>
         </div>
       </div>
     </div>
 
   </section>
 
  <section class="pb-80">
    <div class="container" >
      <h2 class="text-center" style="font-size: 38px ; padding-top: 27px; padding-bottom: 47px;">Mereka yang  <spand class="title-gren">segera</spand> butuh bantuanmu</h2>
      <div class="container">

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" id="segera">
          <div class="text-center w-100">
            <div class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-end pt-4 d-none" id="lihat-semua">
          <a href="{{ url('all-campaign') }}" class="btn btn-primary btn-sm ms-auto rounded-3 bg-danako-primary border-0">Lihat semua</a>
        </div>
      </div>
    </div>
  </section>
 
 
   <section class="container"  style="background-color: #EEF4E6" >
     <div id="carouselExampleControls" class="carousel slide carousel-dark" data-bs-ride="carousel">
       <div class="carousel-inner container">
         <div class="carousel-item pt-5 pb-5 active">
           <div class="row">
             <div class="col-md-6">
               <p>Mereka yang sudah terbantu</p>
               <h2 class="color-primary">
                 Lorem ipsum dolor <span class="text-white">sit  amet</span>
                 <br>
                 consectetur
               </h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, vestibulum ac ipsum. Praesent vitae vulputate urna. Pellentesque molestie felis ante, vitae viverra ipsum mattis id. In hac habitasse platea dictumst. Ut vel sagittis diam. Maecenas congue sollicitudin volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla porttitor nisl id eleifend fermentum</p>
             </div>
             <div class="col-md-6">
               <img src="{{ asset('') }}danako/img/conten1.png" class="d-block w-100" alt="...">
             </div>         
           </div>
         </div>
         <div class="carousel-item pt-5 pb-5">
           <div class="row">
             <div class="col-md-6">
               <p>Mereka yang sudah terbantu</p>
               <h2 class="color-primary">
                 Lorem ipsum dolor <span class="text-white">sit  amet</span>
                 <br>
                 consectetur
               </h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, vestibulum ac ipsum. Praesent vitae vulputate urna. Pellentesque molestie felis ante, vitae viverra ipsum mattis id. In hac habitasse platea dictumst. Ut vel sagittis diam. Maecenas congue sollicitudin volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla porttitor nisl id eleifend fermentum</p>
             </div>
             <div class="col-md-6">
               <img src="{{ asset('') }}danako/img/conten1.png" class="d-block w-100" alt="...">
             </div>         
           </div>
         </div>
         <div class="carousel-item pt-5 pb-5">
           <div class="row">
             <div class="col-md-6">
               <p>Mereka yang sudah terbantu</p>
               <h2 class="color-primary">
                 Lorem ipsum dolor <span class="text-white">sit  amet</span>
                 <br>
                 consectetur
               </h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, vestibulum ac ipsum. Praesent vitae vulputate urna. Pellentesque molestie felis ante, vitae viverra ipsum mattis id. In hac habitasse platea dictumst. Ut vel sagittis diam. Maecenas congue sollicitudin volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla porttitor nisl id eleifend fermentum</p>
             </div>
             <div class="col-md-6">
               <img src="{{ asset('') }}danako/img/conten1.png" class="d-block w-100" alt="...">
             </div>         
           </div>
         </div>
       </div>
       <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
       </button>
       <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
       </button>
     </div>
   </section>
 
   <div class="container h-100 pt-5 pb-5">
     <div class="row align-items-center h-100">
       <div class="sponsor rounded">
         <h2 class="text-center">Lebih dari 25 <span class="color-primary">Perusahaan</span> dan <span class="color-primary">Institusi</span> telah mempercayai kami hingga tahun 2023</h2>
         <div class="container">
           <div class="slider">
           <div class="logos">
             <i class="fab fa-js fa-4x"></i>
             <i class="fab fa-linkedin-in fa-4x"></i>
             <i class="fab fa-dribbble fa-4x"></i>
             <i class="fab fa-medium-m fa-4x"></i>
             <i class="fab fa-github fa-4x"></i>
           </div>
           <div class="logos">
             <i class="fab fa-js fa-4x"></i>
             <i class="fab fa-linkedin-in fa-4x"></i>
             <i class="fab fa-dribbble fa-4x"></i>
             <i class="fab fa-medium-m fa-4x"></i>
             <i class="fab fa-github fa-4x"></i>
           </div>
         </div>
         <div class="slider">
           <div class="logos">
             <i class="fab fa-js fa-4x"></i>
             <i class="fab fa-linkedin-in fa-4x"></i>
             <i class="fab fa-dribbble fa-4x"></i>
             <i class="fab fa-medium-m fa-4x"></i>
             <i class="fab fa-github fa-4x"></i>
           </div>
           <div class="logos">
             <i class="fab fa-js fa-4x"></i>
             <i class="fab fa-linkedin-in fa-4x"></i>
             <i class="fab fa-dribbble fa-4x"></i>
             <i class="fab fa-medium-m fa-4x"></i>
             <i class="fab fa-github fa-4x"></i>
           </div>
         </div>
         </div>
       </div>
     </div>
   </div>

@endsection


@push('after-script')
  <script>
$(document).ready(function(){
  $.ajax({
    url: "{{ route('api.master.campaigns.pagination') }}?per_page=4",
    type: "GET",
    success: function(response){
      let data = response.data.data;
      $('#segera').html('');
      data.forEach(item => {
        let img_src = item.img_path ? "{{ asset('uploads') }}" + item.img_path : "{{ asset('assets/images/image-solid.svg') }}";
        let img_size = item.img_path ? 'width="300" height="200"' : '';
        $('#segera').append(`
          <div class="col">
            <div class="card h-100" onclick="detail(${item.id})">
              <img src="${img_src}" class="card-img-top ${img_size}" alt="..." onerror="this.src='{{ asset('assets/images/image-solid.svg') }}'">
              <div class="card-body">
                <p>${new Date(item.start_date).toLocaleDateString("id", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</p>
                <h5 class="card-title">${item.title.split(' ').slice(0,4).join(' ')}${item.title.split(' ').length > 4 ? '...' : ''}</h5>
                <p class="card-text">${item.description.split(" ").slice(0, 16).join(" ")}${item.description.split(" ").length > 16 ? "..." : ""}</p>
                <div class="progress">
                  <div class="progress-bar bg-danako" role="progressbar" style="width: 10%;  border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="row">
                  <div class="col-6 text-start text-success pt-2">Rp ${new Intl.NumberFormat().format(item.target_amount)}</div>
                  <div class="col-6 text-end pt-2">${days(new Date(item.end_date), new Date())} hari lagi</div>
                </div>
              </div>
            </div>
          </div>
        `)
      });
      $('#lihat-semua').toggleClass('d-none');
    },
    error: function(response){
      $('#segera').html('Ada kesalahan server')
    }
  })
});


  </script>
@endpush


