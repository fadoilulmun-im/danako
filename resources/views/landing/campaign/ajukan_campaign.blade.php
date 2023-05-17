@extends('landing.layouts.app')

@section('title', 'Ajukan Campaign')

@push('after-style')
  <style>
    /* body{
      background-image: url("{{ asset('danako/img/bgcard.png') }}");
      background-position: center;
      background-size: cover;
    } */
  </style>
@endpush

@section('content')


{{-- <div class="container pt-3 pb-3">
     
</div> --}}

<section class="c-notverifikasi mb-4 mt-4">
  <div class="d-flex justify-content-center flex-column"> <!-- tambahkan flex-column -->
    <div class="row">
      <div class="col-md-12">
        <div class="title py-3 px-4" style="height: unset; width: unset">
          <h6>Mulai buat campaign di <span class="color-primary">Danako</span></h6>
          <p class="m-0">Dan ringankan beban tanggungan dikala membutuhkan!</p>
        </div>
      </div>
    </div>

    <div class="row container">
      <div class="col-md-6 pt-5">
        <div class="card text-center">
          <img src="{{ asset('') }}danako/img/campaign/keungulan.png" class="card-img-top mx-auto d-block my-5 konten" alt="Responsive image">
        </div>
      </div>
      
      <div class="col-md-6 pt-5">
        <div class="card text-center">
          <img src="{{ asset('') }}danako/img/campaign/langkah.png" class="card-img-top mx-auto d-block my-5 konten" alt="Responsive image" >
        </div>
      </div>

    </div>

    <button type="button" onclick="cekVerified()" class="btn btn-danako btn-block btn-lg mt-4 w-50 fw-bold">Lanjut</button>

  </div>
</section>

@endsection


@push('after-script')
  <script>
    const cekVerified = () => {
      $.ajax({
        headers: {
          'Authorization': 'Bearer '+ localStorage.getItem('_token'),
        },
        url: "{{ route('api.user.cekVerified') }}",
        method: "GET",
        beforeSend: () => {
          Swal.fire({
            title: 'Mohon Tunggu',
            html: 'Sedang memproses data',
            allowOutsideClick: false,
            showConfirmButton: false,
            onBeforeOpen: () => {
              Swal.showLoading()
            }
          });
        },
        success: function (response) {
          const data = response.data;
          // console.log(data);
          if(data.status){
            window.location.href = "{{ url('pilih-kategori') }}";
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Untuk mulai membuat campaign anda harus verifikasi akun terlebih dahulu!',
              showCancelButton: true,
              confirmButtonText: `Verifikasi`,
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "{{ url('profile') }}";
              }
            })
          }
        },
        error: (response) => {
          const res = response.responseJSON;

          if(res.meta.code == 401){
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Untuk mulai membuat campaign anda harus login terlebih dahulu!',
              showCancelButton: true,
              confirmButtonText: `Login`,
            }).then((result) => {
              if (result.isConfirmed) {
                localStorage.clear();
                sessionStorage.setItem('redirect', window. location. href);
                window.location.href = "{{ route('login') }}";
              }
            })
          }
          else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: res.meta.message,
            });
          }
        }
      })
    }
  </script>
@endpush


