@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection


@section('title')
    Dashboard
@endsection



@section('content')
  <header class="header">
    <div class="container">
     <div class="text-center">
       <div class="text-header">
         <h1 class="color-primary">
           Lorem ipsum dolor <span class="text-white">sit  amet</span>
           <br>
           consectetur
         </h1>
         <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc</p>
       </div>
       <div class="btn-header pt-5">
         <button type="button" class="btn btn-primary btn-lg bg-danako-primary border-0 bt-index mx-5 ">Large button</button>
         <button type="button" class="btn btn-outline-secondary btn-lg mx-5 border-2 bt-index text-white">Large button</button>
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
         <div class="col-md-4 py-3 px-5">
           <div class="card p-2">
             <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
               <div class="icon">
                 <img src="{{ asset('') }}custom/icons/Time_progress_light-1.svg" alt="">
               </div>
               <h5 class="m-0">Cepat dan Tepat</h5>
             </div>
             <div class="card-body text-start text-hero">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, Lorem ipsum dolor sit amet, consectetur 
             </div>
           </div>
         </div>
         <div class="col-md-4 py-3 px-5">
           <div class="card p-2">
             <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
               <div class="icon">
                 <img src="{{ asset('') }}custom/icons/Done_all_round_light.svg" alt="">
               </div>
               <h5 class="m-0">Cepat dan Tepat</h5>
             </div>
             <div class="card-body text-start text-hero">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, Lorem ipsum dolor sit amet, consectetur 
             </div>
           </div>
         </div>
         <div class="col-md-4 py-3 px-5">
           <div class="card p-2">
             <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
               <div class="icon">
                 <img src="{{ asset('') }}custom/icons/Line_up_light.svg" alt="">
               </div>
               <h5 class="m-0">Cepat dan Tepat</h5>
             </div>
             <div class="card-body text-start text-hero">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel. Ut erat metus, posuere et dictum sit amet, Lorem ipsum dolor sit amet, consectetur 
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
 
         <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
           <div class="col">
             <div class="card h-100">
               <img src="{{ asset('') }}danako/img/category/1.png" class="card-img-top" alt="...">
               <div class="card-body">
                 <p>Nov 2023</p>
                 <h5 class="card-title">Gemba Cianjur</h5>
                 <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
                 <div class="progress">
                   <div class="progress-bar bg-danako" role="progressbar" style="width: 60%;  border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
                 <div class="row">
                   <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                   <div class="col-6 text-end pt-2">46 hari lagi</div>
                 </div>
               </div>
             </div>
           </div>
           <div class="col">
             <div class="card h-100">
               <img src="{{ asset('') }}danako/img/category/1.png" class="card-img-top" alt="...">
               <div class="card-body">
                 <p>Nov 2023</p>
                 <h5 class="card-title">Gemba Cianjur</h5>
                 <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
                 <div class="progress">
                   <div class="progress-bar bg-danako" role="progressbar" style="width: 60%;  border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
                 <div class="row">
                   <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                   <div class="col-6 text-end pt-2">46 hari lagi</div>
                 </div>
               </div>
             </div>
           </div>
           <div class="col">
             <div class="card h-100">
               <img src="{{ asset('') }}danako/img/category/1.png" class="card-img-top" alt="...">
               <div class="card-body">
                 <p>Nov 2023</p>
                 <h5 class="card-title">Gemba Cianjur</h5>
                 <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
                 <div class="progress">
                   <div class="progress-bar bg-danako" role="progressbar" style="width: 60%;  border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
                 <div class="row">
                   <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                   <div class="col-6 text-end pt-2">46 hari lagi</div>
                 </div>
               </div>
             </div>
           </div>
           <div class="col">
             <div class="card h-100">
               <img src="{{ asset('') }}danako/img/category/1.png" class="card-img-top" alt="...">
               <div class="card-body">
                 <p>Nov 2023</p>
                 <h5 class="card-title">Gemba Cianjur</h5>
                 <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
                 <div class="progress">
                   <div class="progress-bar bg-danako" role="progressbar" style="width: 60%;  border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
                 <div class="row">
                   <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                   <div class="col-6 text-end pt-2">46 hari lagi</div>
                 </div>
               </div>
             </div>
           </div>
         </div>
 
         <div class="d-flex justify-content-end pt-4">
           <button type="button" class="btn btn-primary btn-sm ms-auto rounded-3 bg-danako-primary border-0">Lihat semua</button>
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
         <h2 class="text-center">Lebih dari 50 Perusahaan dan Institusi telah mempercayai kami hingga tahun 2023</h2>
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

  </script>
@endpush


