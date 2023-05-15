@extends('landing.layouts.app')

@section('title', 'Detail Campaign')

@push('after-style')
<style>
 #social-links ul {
        padding-left: 0;
    }
    #social-links ul li {
        display: inline-block;
    }
    #social-links ul li a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px; /* Ubah sesuai ukuran yang Anda inginkan */
        height: 50px; /* Ubah sesuai ukuran yang Anda inginkan */
        border-radius: 50%; /* Membuat ikon menjadi lingkaran */
        margin: 5px; /* Ubah sesuai jarak antara ikon */
        font-size: 25px;
        background-color: #ccc;
        color: #fff;
    }
     #social-links .fa-facebook{
           color: #0d6efd;
     }
     #social-links .fa-twitter{
           color: deepskyblue;
     }
     #social-links .fa-linkedin{
           color: #0e76a8;
     }
     #social-links .fa-whatsapp{
          color: #25D366
     }
     #social-links .fa-reddit{
          color: #FF4500;;
     }
     #social-links .fa-telegram{
          color: #0088cc;
     }

     #social-links .fa-instagram{
          color: #FF4500;
     }



.modal-footer {
display: block
}

.ur {
border: none;
background-color: #e6e2e2;
border-bottom-left-radius: 4px;
border-top-left-radius: 4px
}

.cpy {
border: none;
background-color: #e6e2e2;
border-bottom-right-radius: 4px;
border-top-right-radius: 4px;
cursor: pointer
}

button.focus,
button:focus {
outline: 0;
box-shadow: none !important
}

.ur.focus,
.ur:focus {
outline: 0;
box-shadow: none !important
}

.message {
font-size: 11px;
color: #ee5535
}
</style>
@endpush

@section('content')


<section class="job-details pt-5 pb-5">
    <div class="container">
      <div class="notif"></div>
        <div class="row">
            <div class="col-lg-8 ">
              <div class="row">
                <div class="col-lg-12">
                  <div class="job-details-text">
                      <div class="job-card mb-0">
                          <div class="row align-items-center">
                              <div class="col-md-2">
                                  <div class="company-logo">
                                      <img src="{{ asset('') }}danako/img/Expand_left.svg" alt="logo" /> 
                                  </div>
                              </div>
                              <div class="col-md-10">
                                  <div class="job-info">
                                    <h1 id="title">Loading... </h1>
                                    
                                    <div id="count-donasi">
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="border-bottom border-3 pt-2"></div>

                      <img id="image" src="{{ asset('assets/images/image-solid.svg') }}" class="img-fluid" alt="Responsive image" style="max-height: 500px">

                      {{-- <h6 class="pt-3">Pencairan dana Rp 1.500.000 ke rekening *****11321412 a.n. SITI</h6> --}}

                        
                      <div class="details-text pt-2">
                        <h3>Description</h3>
                        <div id="content">
                          <div class="text-center w-100">
                            <div class="spinner-border" role="status">
                              <span class="visually-hidden">Loading...</span>
                            </div>
                          </div>
                        </div>
                        
                        {{-- <button class="toggle-button readmore" onclick="toggleText()">Baca Selengkapnya</button> --}}
                      </div>
                  
                  </div>
                </div>
              </div>
              <div class="border-bottom border-3 pt-2"></div>

              <div class="kontak-campaign pt-3 pb-3">
                <div class="d-flex align-items-center">
                  <img id="image-campaigner" src="{{ asset('') }}danako/img/campaign/Circel.png" alt="LMI ZAKAT" style="width: 50px; height: 50px; border-radius: 50%;">
                  <h4 class="ms-3 m-0" id="name-campaigner">Loading...</h4>
                </div>
                <p style="margin-top: 5px;">Penggalang Dana <span class="color-primary">Lihat</span></p>
              </div>

              
              <div class="border-bottom border-3" ></div>
              <div class="container p-0 pt-3" id="list-hope">
                <div class="text-center w-100">
                  <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
              </div>

          
              {{-- <div class="pagination-wrapper">
                <ul class="pagination modal-3">
                  <li><a href="#" class="prev">&laquo</a></li>
                  <li><a href="#" class="active">1</a></li>
                  <li> <a href="#">2</a></li>
                  <li> <a href="#">3</a></li>
                  <li> <a href="#">4</a></li>
                  <li> <a href="#">5</a></li>
                  <li> <a href="#">6</a></li>
                  <li> <a href="#">7</a></li>
                  <li> <a href="#">8</a></li>
                  <li> <a href="#">9</a></li>
                  <li><a href="#" class="next">&raquo;</a></li>
                </ul>
              </div> --}}

            </div>

            <div class="col-lg-4">
                <div class="job-sidebar">
                    <h3>Total dana masuk: <span class="color-primary" id="total-dana-masuk">Rp 0</span></h3>
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="d-grid gap-2 pt-2 pb-3">
                      <a href="#" class="btn btn-primary" type="button" id="donasi">Donasi Sekarang</a>
                      {{-- <button class="btn btn-primary" id="bagikan" type="button">Bagikan campaign</button>
                      <a href="{{ url('donasi').'/'.$id }}" class="btn btn-primary" type="button">Donasi Sekarang</a> --}}
                      {{-- <button class="btn btn-primary" id="bagikan" type="button" onclick="openSharePopup()">Bagikan campaign</button> --}}
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Bagikan
                      </button>

                      
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bagikan Campaign Ke Social Media</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class='row'>
                             
               
                              <!-- Social Share buttons 1 -->
                              <div class="social-btn-sp">
                                    {!! $shareButtons1 !!}
                                    
                              </div> 
                         </div>
                       
                      
                      
                
                      
                      

                          </div>

                          <div class="modal-footer">
                            <div class="row"> <input class="col-md-10 ur" type="url" placeholder="{{ $currentUrl }}" readonly id="myInput" aria-describedby="inputGroup-sizing-default" style="height: 40px;"> <button class=" col-2 cpy" onclick="myFunction()"><i class="far fa-clone"></i></button></div> 
                      
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card" style="height: 500px; overflow-y: scroll;">
                        <div class="card-body p-0" id="list-donasi">

                          <div class="text-center w-100 pt-5">
                            <div class="spinner-border" role="status">
                              <span class="visually-hidden">Loading...</span>
                            </div>
                          </div>

                        </div>
                    </div>

                    {{-- <div class="d-grid gap-2 col-6 mx-auto pt-3">
                      <button type="button" class="btn btn-outline-success">Lihat semua</button>
                    </div> --}}
           
                </div>
            </div>

        </div>
    </div>
</section>

<div class="my-div information-container">
    <div class="container">
     <h1 class="title pt-5">Download Aplikasi DANAKO!</h1>
     <h6>LNikmati Kemudahan Beramal di manapun bersama Danako</h6>
     <div class="text-center">
       <img src="{{ asset('') }}danako/img/category/googleplay.png" style="padding-top: 24px; padding-bottom: 41px;" />
     </div>
   </div>
</div>

@endsection


@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.5/plugin/relativeTime.min.js"></script>



<script>

  dayjs.extend(window.dayjs_plugin_relativeTime);
  function toggleText() {
    var text = document.querySelector('.toggle-text');
    var button = document.querySelector('.toggle-button');
    if (text.classList.contains('hide')) {
      text.classList.remove('hide');
      button.innerHTML = 'Sembunyikan';
    } else {
      text.classList.add('hide');
      button.innerHTML = 'Baca Selengkapnya';
    }
  }

  $(document).ready(function() {
    let url = "{{ route('api.master.campaigns.show', $id) }}";
    $.ajax({
      url: url,
      type: 'GET',
      success: function(response) {
        let data = response.data;
        $('#title').text(data.title);
        if(data.img_path){
          $('#image').attr('src',  "{{ asset('uploads') }}" + data.img_path);
          $('#image').on('error', function(e){
            $(this).attr('src', "{{ asset('assets/images/image-solid.svg') }}");
          })
        }
        $('#content').html(data.description);

        $('#name-campaigner').text(data.user.name);
        if(data.user?.photo_profile?.path ?? null){
          $('#image-campaigner').attr('src', `{{ asset('uploads${data.user.photo_profile.path}')}}`);
        }

        $('#total-dana-masuk').html(`Rp ${new Intl.NumberFormat().format(data.real_time_amount)}`);
        $('.progress-bar').css({
          'width': `${data.real_time_amount / data.target_amount * 100}%`
        });
      }
    });

    $.ajax({
      url: "{{ route('api.master.donations.list') }}?campaign_id={{ $id }}&status=paid",
      type: 'GET',
      success: (response) => {
        const data = response.data;
        $('#list-donasi').html('');
        $('#list-hope').html('');
        if(data.length > 0){
          $('#count-donasi').html(`<b>${new Intl.NumberFormat().format(data.length)}</b> orang baik telah berdonasi untuk campaign ini`);
          
          $('#list-hope').append(`<h5 class="mb-4">Pesan dari orang baik (${data.length})</h5>`);
          data.forEach(item => {
            $('#list-donasi').append(`
              <div class="card-text border-bottom info-donatur pt-3 pb-3 rounded-2 px-2">                  
                <div class="row">
                  <div class="col-9">
                    <h6 class="text-start">${item.user.name}</h6>
                    <h6 class="text-start" >Rp ${new Intl.NumberFormat().format(item.amount_donations)} • <span class="text-end text-secondary fw-lighter" style="font-size: 0.7rem">${dayjs(new Date(item.created_at)).fromNow()}</span></h6>
                  </div>
                  <div class="col-3 pe-0">
                    <img src="${item.user.photo_profile ? "{{ asset('uploads') }} " + item.user.photo_profile.path : "{{ asset('') }}danako/img/campaign/icon_akun.png" }" class="img-thumbnail"> 
                  </div> 
                </div>
              </div>
            `);

            $('#list-hope').append(`
              <div class="row mb-4 ps-1">
                <div class="col-md-1">
                  <img src="${item.user.photo_profile ? "{{ asset('uploads') }} " + item.user.photo_profile.path : "{{ asset('') }}danako/img/campaign/icon_akun.png" }" alt="Testimoni" class="img-fluid rounded-circle">
                </div>
                <div class="col-md-11">
                  <h6>${item.user.name}</h6>
                  <p>${item.hope}</p>
                </div>
              </div>
            `);
          });
        }else{
          $('#list-donasi').html(`
            <div class="card-body">
              <p class="text-center">Belum ada donasi</p>
            </div>
          `);
        }
        
      },
      error: (response) => {
        const res = response.responseJSON;
        $('#list-donasi').html(`
          <div class="card-body">
            <p class="text-center">${res.message}</p>
          </div>
        `);
      },
    })

    $('#donasi').click((e) => {
      e.preventDefault();
      if(!localStorage.getItem('_token')){
        Swal.fire({
          icon: 'warning',
          title: 'Anda belum login',
          text: 'Apakah anda ingin login supaya data donasi tersimpan di aku anda',
          showCancelButton: false,
          confirmButtonText: 'Ya, login',
          showDenyButton: true,
          denyButtonText: 'Tidak, lanjutkan',
        }).then((result) => {
          if (result.isConfirmed) {
            sessionStorage.setItem('redirect', "{{ url('donasi').'/'.$id }}");
            window.location.href = "{{ route('login') }}";
          }
          else if(result.isDenied){
            window.location.href = "{{ url('donasi').'/'.$id }}";
          }
        })
      }else{
        window.location.href = "{{ url('donasi').'/'.$id }}";
      }
    })
  });
</script>
@endpush


