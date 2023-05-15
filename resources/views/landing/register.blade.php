<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  <link href="{{ asset('danako/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Source+Sans+Pro&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/e6b617e336.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    #content {
      background: #EEF4E6;
    }

    .card-title h5 {
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size: 16px;
      color: #000000;
      margin: 0;
    }

    .card-title p {
      font-family: 'source sans pro', sans-serif;
      font-weight: 400;
      font-size: 16px;
    }

    .card {
      border-radius: 8px;
    }

    .card-title i {
      font-size: 40px;
      overflow: hidden;
      /* border-radius: 50%; */
    }

    .card-title text {
      font-family: 'Poppins', sans-serif;
    }

    .card.type {
      cursor: pointer;
    }

    @media (min-width: 992px){
      #content {
        width: 80%;
      }
    }

    @media (min-width: 1200px){
      #content {
        width: 60%;
      }
    }

    @media (min-width: 1400px){
      #content {
        width: 50%;
      }
    }

    .card.type.active {
      border: #99CC33 solid 2px;
    }

    .card-title .icon{
      width: 50px;
    }

    .card-title .text .fa-circle-check {
      color: #99CC33;
    }

    .card.type .fa-circle-check {
      display: none;
    }

    .card.type.active .fa-circle-check {
      display: block;
    }

    .card-footer button {
      color: #ffffff;
      background: #99CC33;
      border-radius: 8px;
      border: none;
      padding: 10px 60px;
      font-weight: 600;
      font-size: 14px;
    }

    .card-footer button:hover {
      background: #84b12a;
      color: #ffffff;
    }

    #type .card-body p {
      font-size: 16px;
      font-weight: 400;
      font-family: 'Source Sans Pro', sans-serif;
    }
  </style>
</head>
<body style="background-image: url({{ asset('danako/img/bgcover.png') }})">
  
  <div class="container-fluid vh-100 vw-100 d-flex justify-content-center align-items-center">
    <div class="card p-5-md px-2 py-4" id="content">
      <div id="type">
        <div class="card-title text-center">
          <h5>Pilih jenis akun yang akan dibuat</h5>
          <p>Tentukan pilihan jenis akun yang ingin dibuat</p>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="card p-2 type" data-type="personal">
                <div class="card-title d-flex">
                  <div class="icon me-2 d-flex justify-content-center">
                    <i class="fa-solid fa-person"></i>
                  </div>
                  <div class="text w-100">
                    <div class="top d-flex justify-content-between">
                      <h5>Akun Personal</h5>
                      <i class="fa-regular fa-circle-check fs-5"></i>
                    </div>
                    <p>Buat akun untuk jadi pelopor kebaikan.</p>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <p class="m-0">
                    Akun yang dibuat oleh individu untuk menggalang dana atau menyumbang dana untuk kegiatan sosial yang ada di sekitar kita.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="card p-2 type" data-type="kelompok">
                <div class="card-title d-flex">
                  <div class="icon me-2 d-flex justify-content-center">
                    <i class="fa-solid fa-people-group"></i>
                  </div>
                  <div class="text w-100">
                    <div class="top d-flex justify-content-between">
                      <h5>Akun Kelompok</h5>
                      <i class="fa-regular fa-circle-check fs-5"></i>
                    </div>
                    <p>Buat akun untuk jadi pelopor kebaikan.</p>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <p class="m-0">
                    Akun yang dibuat oleh kelompok untuk menggalang dana atau menyumbang dana untuk kegiatan sosial yang ada di sekitar kita.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center border-0 bg-transparent">
          <button class="btn border-0 disabled" id="btn-type">Selanjutnya</button>
        </div>
      </div>

      <div id="group" style="display: none">
        <div class="card-title text-center">
          <h5>Pilih tipe kelompok yang akan dibuat</h5>
          <p>Tentukan pilihan tipe kelompok yang ingin dibuat</p>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="card p-2 type" data-group="komunitas">
                <div class="card-title d-flex">
                  <div class="icon me-2 d-flex justify-content-center">
                    <i class="fa-solid fa-people-roof"></i>
                  </div>
                  <div class="text w-100">
                    <div class="top d-flex justify-content-between">
                      <h5>Komunitas</h5>
                      <i class="fa-regular fa-circle-check fs-5"></i>
                    </div>
                    <p class="m-0">Buat akun untuk jadi pelopor kebaikan.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="card p-2 type" data-group="perusahaan">
                <div class="card-title d-flex">
                  <div class="icon me-2 d-flex justify-content-center">
                    <i class="fa-solid fa-building"></i>
                  </div>
                  <div class="text w-100">
                    <div class="top d-flex justify-content-between">
                      <h5>Perusahaan</h5>
                      <i class="fa-regular fa-circle-check fs-5"></i>
                    </div>
                    <p class="m-0">Buat akun untuk jadi pelopor kebaikan.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="card p-2 type" data-group="organisasi">
                <div class="card-title d-flex">
                  <div class="icon me-2 d-flex justify-content-center">
                    <i class="fa-solid fa-user-group"></i>
                  </div>
                  <div class="text w-100">
                    <div class="top d-flex justify-content-between">
                      <h5>Organisasi</h5>
                      <i class="fa-regular fa-circle-check fs-5"></i>
                    </div>
                    <p class="m-0">Buat akun untuk jadi pelopor kebaikan.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="card p-2 type" data-group="lembaga">
                <div class="card-title d-flex">
                  <div class="icon me-2 d-flex justify-content-center">
                    <i class="fa-solid fa-building-columns"></i>
                  </div>
                  <div class="text w-100">
                    <div class="top d-flex justify-content-between">
                      <h5>Lembaga</h5>
                      <i class="fa-regular fa-circle-check fs-5"></i>
                    </div>
                    <p class="m-0">Buat akun untuk jadi pelopor kebaikan.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center border-0 bg-transparent">
          <button class="btn border-0 disabled" id="btn-group">Selanjutnya</button>
        </div>
      </div>

      <div id="form" style="display: none">
        <div class="card-title text-center">
          <h5>ISI FORM</h5>
          <p>Silahkan lengkapi form</p>
        </div>
        <form action="">
          <input type="hidden" name="type" name="type">
          <input type="hidden" name="group" name="group">
          <div class="card-body">
            <div class="input-group flex-nowrap mb-3">
              <span class="input-group-text bg-white pe-0"><i class="fa-solid fa-user"></i></span>
              <input type="text" class="form-control border-start-0" placeholder="Nama" name="nama">
            </div>
            <div class="input-group flex-nowrap mb-3">
              <span class="input-group-text bg-white pe-0"><i class="fa-solid fa-envelope"></i></span>
              <input type="text" class="form-control border-start-0" placeholder="email" name="email">
            </div>
            <div class="input-group flex-nowrap mb-3">
              <span class="input-group-text bg-white pe-0"><i class="fa-solid fa-at"></i></span>
              <input type="text" class="form-control border-start-0" placeholder="Username" name="username">
            </div>
            <div class="input-group flex-nowrap mb-3">
              <span class="input-group-text bg-white pe-0"><i class="fa-solid fa-phone"></i></span>
              <input type="number" class="form-control border-start-0" placeholder="Nomor Telepon" name="nomor_telepon">
            </div>
            <div class="input-group flex-nowrap mb-3">
              <span class="input-group-text bg-white pe-0"><i class="fa-solid fa-lock"></i></span>
              <input type="password" class="form-control border-start-0 border-end-0" placeholder="Password" name="password">
              <span class="input-group-text bg-white ps-0" style="cursor: pointer"><i class="far fa-eye" id="togglePassword"></i></span>
            </div>
          </div>
          <div class="card-footer text-center border-0 bg-transparent">
            <button type="submit" class="btn border-0 disabled" id="submit">Daftar</button>
            <div class="mt-3 d-none" id="btn-oauth">
              <p class="m-0">atau lanjutkan dengan</p>
              <div class="circle-buttons mt-3">
                <a href="{{route('google.login') }}" class="google text-secondary"><i class="fab fa-google fs-3"></i></a>
                <a href="#" class="facebook text-secondary"><i class="fa-brands fa-facebook fs-3"></i></a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<script src="{{ asset('danako/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
  $(document).ready(() => {
    $('#type .card.type').click(function() {
      $('input[name="type"]').val($(this).data('type'))
      $('#type .card.type').removeClass('active')
      $(this).addClass('active')
      $('#btn-type').removeClass('disabled')

      if('personal' == $(this).data('type')) {
        $('#btn-oauth').removeClass('d-none')
      }else{
        $('#btn-oauth').addClass('d-none')
      }
    })

    $('#group .card.type').click(function() {
      $('input[name="group"]').val($(this).data('group'))
      $('#group .card.type').removeClass('active')
      $(this).addClass('active')
      $('#btn-group').removeClass('disabled')
    })

    $('#btn-type').click(function() {
      if($('input[name="type"]').val() == 'personal') {
        $('#type').hide();
        $('#form').fadeIn('slow');
      }else{
        $('#type').hide();
        $('#group').fadeIn('slow');
      }
    })

    $('#btn-group').click(function() {
      $('#group').hide();
      $('#form').fadeIn('slow');
    })

    $('#togglePassword').click(function(e){
      const input = $('input[name="password"]');
      $(this).toggleClass('fa-eye fa-eye-slash');
      if(input.attr('type') == 'password'){
        input.attr('type', 'text');
      }else{
        input.attr('type', 'password');
      }
    })

    $('.card-body input').on('keyup change', function() {
      let empty = false;
      $('.card-body input').each(function() {
        if($(this).val() == '') {
          empty = true;
        }
      })

      if(empty) {
        $('#submit').addClass('disabled')
      }else{
        $('#submit').removeClass('disabled')
      }
    })

    $('#form form').submit((e) => {
      e.preventDefault();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        url: "{{ route('api.user.register') }}",
        type: 'POST',
        data: new FormData(e.target),
        processData: false,
        contentType: false,
        beforeSend: () => {
          $('#submit').addClass('disabled')
          $('#submit').html(`
            <div class="text-center">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          `)
        },
        success: (response) => {
          window.location.href = "{{ route('konfirmasi-email') }}";
        },
        error: (response) => {
          const res = response.responseJSON
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: res.meta.message,
          })
        },
        complete: () => {
          $('#submit').removeClass('disabled')
          $('#submit').html('Daftar')
        }
      })
    })
  })
</script>
</body>
</html>