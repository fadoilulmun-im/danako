@extends('landing.layouts.app')

@section('title', 'Buat Campaign')

@push('after-style')
  <link href="{{asset('')}}assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
  {{-- <link href="{{asset('')}}assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" /> --}}
  <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
  <style>
    /* buat campaign */
    .dropify-wrapper .dropify-message span.file-icon p {
        font-size: 25px;
      }
      
    .f1-steps { 
      overflow: hidden; 
      position: relative; 
      margin-top: 20px; 
    }

    .f1-progress { 
      position: absolute; 
      top: 0; 
      width: 3px; 
      height: 80%; 
      left: 48%; 
      background: #ddd; 
    }

    .f1-progress-line { 
      position: absolute; 
      top: 0; 
      left: 50%; 
      width: 1px; 
      height: 0; 
      background: #338056; 
      transform: translateX(-50%);
    }

    .f1-step { 
      position: relative; 
      width: 100%; 
      margin-bottom: 30px;
    }

    .f1-step-icon {
      display: inline-block; 
      width: 40px; 
      height: 40px; 
      margin-right: 10px;
      background: #ddd;
      font-size: 16px; 
      color: #fff; 
      line-height: 40px;
      text-align: center;
      -moz-border-radius: 50%; 
      -webkit-border-radius: 50%; 
      border-radius: 50%;
    }

    .f1-step.activated .f1-step-icon {
      background: #fff; 
      border: 1px solid #338056; 
      color: #338056; 
      line-height: 38px;
    }

    .f1-step.active .f1-step-icon {
      background: #338056;
      color: #fff;
      width: 48px; 
      height: 48px; 
      font-size: 22px; 
      line-height: 48px;
    }

    .f1-step p { 
      color: #ccc; 
    }

    .f1-step.activated p { 
      color: #338056; 
    }

    .f1-step.active p { 
      color: #338056; 
    }

    .f1 fieldset { 
      display: none; 
      text-align: left; 
    }

    /* .f1-buttons { 
      text-align: right; 
    } */

    .f1 .input-error { 
      border-color: #f35b3f; 
    }

    @media only screen and (max-width: 767px) {
      .f1-steps { overflow: hidden; position: relative; margin-top: 20px; }

      .f1-progress { position: absolute; top: 24px; left: 0; width: 100%; height: 1px; background: #ddd; }
      .f1-progress-line { position: absolute; top: 0; left: 0; height: 1px; background: #338056; width: 100%; }

      .f1-step { position: relative; float: left; width: 25%; padding: 0 5px; }

      .f1-step-icon {
      display: inline-block; width: 40px; height: 40px; margin-top: 4px; background: #ddd;
      font-size: 16px; color: #fff; line-height: 40px;
      -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%;
      }
      .f1-step.activated .f1-step-icon {
      background: #fff; border: 1px solid #338056; color: #338056; line-height: 38px;
      }
      .f1-step.active .f1-step-icon {
      width: 48px; height: 48px; margin-top: 0; background: #338056; font-size: 22px; line-height: 48px;
      }

      .f1-step p { color: #ccc; }
      .f1-step.activated p { color: #338056; }
      .f1-step.active p { color: #338056; }

      .f1 fieldset { display: none; text-align: left; }

      /* .f1-buttons { text-align: right; } */

      .f1 .input-error { border-color: #f35b3f; }
    }

    .box-input{
      box-sizing: border-box;
      background: #FFFFFF;
      border: 1px solid rgba(0, 0, 0, 0.37);
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
      border-radius: 10px;
    }

    .files input {
      outline: 2px dashed #92b0b3;
      outline-offset: -10px;
      -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
      transition: outline-offset .15s ease-in-out, background-color .15s linear;
      padding: 120px 0px 85px 35%;
      text-align: center !important;
      margin: 0;
      width: 100% !important;
    }
    .files input:focus{
      outline: 2px dashed #92b0b3;  outline-offset: -10px;
      -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
      transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
    }
    .files{ position:relative}
    .files:after { 
      pointer-events: none;
      position: absolute;
      top: 60px;
      left: 0;
      width: 50px;
      right: 0;
      height: 56px;
      content: "";
      background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
      display: block;
      margin: 0 auto;
      background-size: 100%;
      background-repeat: no-repeat;
    }
    .color input{ background-color:#f1f1f1;}
    .files:before {
      position: absolute;
      bottom: 10px;
      left: 0;  pointer-events: none;
      width: 100%;
      right: 0;
      height: 57px;
      content: " or drag it here. ";
      display: block;
      margin: 0 auto;
      color: #2ea591;
      font-weight: 600;
      text-transform: capitalize;
      text-align: center;
    }

    .card-category.active{
      background-color: #B8D6A9;
    }

    .card:hover{
      background-color: #fff;
    }
  </style>
@endpush

@section('content')

<main class="text-center py-3">
  <div class="container mb-3">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-10">
        <div class="title text-center">
          <span class="fs-1">Buat Campaign</span>
          {{-- <span class="d-none d-md-inline">
            <i class="fa-solid fa-minus fs-2 my-auto"></i>
          </span> --}}
          <span class="fs-1">{{ $category->name }}</span>
        </div>
      </div>
    </div>
  </div>

  <div class="container"> 
    <form class="f1" id="form-campaign">
      <input type="hidden" name="category_id" id="category_id" value="{{$id}}">
      <div class="row">
        <div class="col-md-2 ">
          <div class="f1-steps">
            <div class="f1-progress">
              <div class="f1-progress-line" data-now-value="25" data-number-of-steps="4" style="width: 25%;"></div>
            </div>
            {{-- <div class="f1-step active">
              <div class="f1-step-icon"><i class="fa fa-user"></i></div>
              <p>Detail Pasien</p>
            </div> --}}
            <div class="f1-step active">
              <div class="f1-step-icon"><i class="fas fa-newspaper"></i></div>
              <p>Detail Campaign</p>
            </div>
            <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-user"></i></div>
              <p>Detail Target</p>
            </div>
            <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-file"></i></div>
              <p>Dokumen Pendukung</p>
            </div>
            {{-- <div class="f1-step">
              <div class="f1-step-icon"><i class="fas fa-align-justify"></i></div>
              <p>Rangkuman</p>
            </div> --}}
          </div>
        </div>
        <div class="col-md-10 box-input p-3">
          {{-- <!-- step 1 -->
          <fieldset id="step-1" >
            <input type="hidden" name="category_id" id="category_id">
            <h1 class="text-center pb-3">Pilih Kategori</h1>
            <div class="card" style="min-height: 300px">
              <div class="card-body" id="list-category">

                <div class="d-flex justify-content-center align-items-center" style="min-height: 300px">
                  <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
            
              </div>
            </div>
            <div class="f1-buttons pt-3 pb-3 d-flex justify-content-end">
              <button type="button" class="btn btn-danako btn-next disabled" id="category-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
            </div>
          </fieldset> --}}

          {{-- step 1 --}}
          {{-- <fieldset id="step-1">
            <div class="container py-5">
              <div class="contact form-area">
                <div class="group form-group">      
                  <select class="form-control" id="tujuan" name="tujuan" required>
                    <option disabled selected>Pilih Salah Satu</option>
                    <option value="Saya sendiri">Saya sendiri</option>
                    <option value="Keluarga yang satu KK dengan saya">Keluarga yang satu KK dengan saya</option>
                    <option value="Keluarga inti (ayah/ibu/kakak/adik/anak) yang sudah pisah KK dengan saya">Keluarga inti (ayah/ibu/kakak/adik/anak) yang sudah pisah KK dengan saya</option>
                    <option value="Selain pilihan di atas">Selain pilihan di atas</option>
                  </select>
                  <label>Siapa yang sakit ?</label>
                </div>

                <div class="non-self d-none">
                  <div class="group form-group">      
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Pastikan nomor telepon aktif" required>
                    <label>Masukkan no. ponsel pasien/keluarga pasien</label>
                  </div>
                </div>

                <div class="group form-group">      
                  <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama pasien sesuai KK & dokumen medis" required>
                  <label>Nama Pasien</label>
                </div>

                <div class="group form-group">      
                  <input type="text" class="form-control" id="penyakit" name="penyakit" placeholder="Nama penyakit sesuai dokumen medis" required>
                  <label>Penyakit atau kondisi yang diderita</label>
                </div>
              </div>

              <div class="f1-buttons">
                <button type="button" class="btn btn-danako btn-next step-1 disabled">Selanjutnya <i class="fa fa-arrow-right"></i></button>
              </div>
            </div>
          </fieldset> --}}

          <!-- step 1 -->
          <fieldset id="step-1" >
            <h1 class="text-center pb-3">Cerita Campaign</h1>
              
            <div class="container pt-3">
              <div class="contact pt-3">
                <div class="col-md-12 col-md-offset-3">
                  <div class="form-area">
                    <div class="group form-group">      
                      <input type="text" class="form-control" id="title" name="title" placeholder="Contoh: Sedekah Untk Anak Yatim">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Beri judul campaign</label>
                    </div>
                    
                    {{-- <div class="group form-group">      
                      <input type="text" class="form-control" id="slug" name="slug" placeholder="Contoh: sedekah-untuk-anak-yatim">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Tentukan tautan untuk campaign</label>
                    </div> --}}

                    <h6>Tambahkan foto campaign</h6>
                    <div class="form-group">
                      <input type="file" class="form-control dropify" name="img">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                    </div>

                    <h6>Ceritakan mengapa anda membuat campaign ini</h6>
                    <div class="form-group group">
                      <div class="text-group mt-0">
                        <textarea class="form-control" rows="6" name="description"></textarea>
                        {{-- <label for="textarea" class="input-label">Ceritakan mengapa anda membuat campaign ini</label> --}}
                        <i class="bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="f1-buttons d-flex justify-content-end">
                {{-- <button type="button" class="btn btn-outline-danako btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button> --}}
                <button type="button" class="btn btn-danako btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
            </div>
          </fieldset>

          <!-- step 2 -->
          <fieldset id="step-2">
            <h1 class="text-center pb-3">Detail Penerima</h1>
            <div class="container pt-3">
              <div class="contact pt-3">
                <div class="col-md-12 col-md-offset-3">
                  <div class="form-area">
                    <div class="group form-group">      
                      <input type="text" class="form-control" id="receiver" name="receiver">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Nama Penerima Campaign</label>
                    </div>

                    <div class="form-group group">
                      <div class="text-group">
                        <textarea class="form-control" rows="6" name="purpose"></textarea>
                        <label for="textarea" class="input-label">Tujuan Campaign Bagi Penerima</label>
                        <i class="bar"></i>
                      </div>
                    </div>

                    <div class="form-group group">
                      <div class="text-group">
                        <textarea class="form-control" rows="6" name="address_receiver"></textarea>
                        <label for="textarea" class="input-label">Lokasi Lengkap Penerima Campaign</label><i class="bar"></i>
                      </div>
                    </div>

                    <div class="group form-group">      
                      <input type="number" class="form-control" id="target_amount" name="target_amount">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Target Biaya Terkumpul</label>
                    </div>

                    <h6>Tentukan Tanggal Penayangan Campaign</h6>
                    <div class="group form-group">      
                      <input type="text" class="form-control" id="range_date" name="range_date">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                    </div>

                    <div class="form-group group">
                      <div class="text-group">
                        <textarea class="form-control" rows="6" name="detail_usage_of_funds"></textarea>
                        <label for="textarea" class="input-label">Isi Rincian Penggunaan Dana</label><i class="bar"></i>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="f1-buttons d-flex justify-content-between">
              <button type="button" class="btn btn-outline-danako btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
              <button type="button" class="btn btn-danako btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
            </div>
          </fieldset>

          <!-- step 3 -->
          <fieldset id="step-3">
            <h1 class="text-center pb-3">Dokumen Pendukung</h1>
            <div class="container">
              <h6>Tambahkan Dokumen Pendukung</h6>
              <div class="form-group files">
                <input type="file" class="form-control" multiple name="documents[]">
                <span class="highlight"></span>
                <span class="bar"></span>
              </div>
            </div>

            <div class="f1-buttons d-flex justify-content-between pt-3">
              <button type="button" class="btn btn-outline-danako btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
              <button type="submit" class="btn btn-danako" id="btn-submit">Ajukan</button>
            </div>
          </fieldset>
        </div>
      </div>                     
    </form>
  </div>
</main>

@endsection


@push('after-script')
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
  <script src="{{ asset('') }}assets/libs/flatpickr/flatpickr.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
  <script src="{{asset('')}}assets/libs/dropify/js/dropify.min.js"></script>
  {{-- <script src="{{asset('')}}assets/libs/dropzone/min/dropzone.min.js"></script> --}}
  <script >
    const user = JSON.parse(localStorage.getItem('user'));
    $(document).ready(function() {
      $('.dropify').dropify();
      CKEDITOR.plugins.addExternal( 'videoembed', "{{ asset('js/ckeditor/videoembed/plugin.js') }}", '' );
      CKEDITOR.replace( 'description', {
        extraPlugins: 'videoembed'
      } );
      CKEDITOR.replace( 'purpose' );
      CKEDITOR.replace( 'detail_usage_of_funds' );

      CKEDITOR.on('instanceReady', function(){
        $.each( CKEDITOR.instances, function(instance) {
          CKEDITOR.instances[instance].on("change", function(e) {
              for ( instance in CKEDITOR.instances )
              CKEDITOR.instances[instance].updateElement();
          });
        });
      });

      $('#tujuan').change(() => {
        if($('#tujuan').val() == 'Selain pilihan di atas' ){
          $('.non-self').removeClass('d-none');
          $('#no_hp').val('');
        }else{
          $('.non-self').addClass('d-none');
          $('#no_hp').val(user.phone_number);
        }

        if($('#tujuan').val() == 'Saya sendiri'){
          $('#nama_pasien').val(user.name).attr('disabled', true);
        }else{
          $('#nama_pasien').val('').attr('disabled', false);
        }
      })

      $('.f1-step').click(function() {
        // menghilangkan kelas active dari langkah sebelumnya
        $('.f1-step.active').removeClass('active');
        // menambahkan kelas active pada langkah yang dipilih
        $(this).addClass('active');
        // menentukan nomor langkah saat ini
        var currentStep = $(this).index() + 0;
        // mengubah lebar progress line sesuai dengan nomor langkah saat ini
        $('.f1-progress-line').css('width', (currentStep * 25) + '%');
        // menyembunyikan semua langkah
        $('fieldset').hide();
        // menampilkan langkah yang sedang dipilih
        $('#step-' + currentStep).show();
      });
    });

    
    function scroll_to_class(element_class, removed_height) {
      var scroll_to = $(element_class).offset().top - removed_height;
      if($(window).scrollTop() != scroll_to) {
        $('html, body').stop().animate({scrollTop: scroll_to}, 0);
      }
    }

    function bar_progress(progress_line_object, direction) {
      var number_of_steps = progress_line_object.data('number-of-steps');
      var now_value = progress_line_object.data('now-value');
      var new_value = 0;
      if(direction == 'right') {
        new_value = now_value + ( 100 / number_of_steps );
      }
      else if(direction == 'left') {
        new_value = now_value - ( 100 / number_of_steps );
      }
      progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
    }

    $(document).ready(function() {
      $('#range_date').flatpickr({mode:"range"});
      
      // Form
      $('.f1 fieldset:first').fadeIn('slow');

      // for (let index = 1; index <= 4; index++) {
      //   $(`#step-${index} input, #step-${index} select`).on('keyup change', () => {
      //     let empty = false;
      //     $(`#step-${index} input, #step-${index} select`).each(function() {
      //       if($(this).val() == '' && $(this).attr('required')) {
      //         empty = true;
      //       }
      //     })

      //     if(empty) {
      //       $(`.btn-next.step-${index}`).addClass('disabled')
      //     }else{
      //       $(`.btn-next.step-${index}`).removeClass('disabled')
      //     }
      //   })
      // }
      
      $('.f1 input, .f1 textarea').on('focus', function() {
        $(this).removeClass('input-error');
      });
      
      // step selanjutnya (ketika klik tombol selanjutnya)
      $('.f1 .btn-next').on('click', function() {
        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.f1').find('.f1-step.active');
        var progress_line = $(this).parents('.f1').find('.f1-progress-line');

        
        // validasi form
        parent_fieldset.find('input, textarea').each(function() {
          if( $(this).val() == "" ) {
            $(this).addClass('input-error');
            next_step = false;
          }
          else {
            $(this).removeClass('input-error');
          }
        });


        
        if( next_step ) {
          parent_fieldset.fadeOut(400, function() {
            // change icons
            current_active_step.removeClass('active').addClass('activated').next().addClass('active');
            // progress bar
            bar_progress(progress_line, 'right');
            // show next step
            $(this).next().fadeIn();
            // scroll window to beginning of the form
            scroll_to_class( $('.f1'), 20 );
          });
        }
      });
      
      // step sbelumnya (ketika klik tombol sebelumnya)
      $('.f1 .btn-previous').on('click', function() {
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.f1').find('.f1-step.active');
        var progress_line = $(this).parents('.f1').find('.f1-progress-line');
        
        $(this).parents('fieldset').fadeOut(400, function() {
          // change icons
          current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
          // progress bar
          bar_progress(progress_line, 'left');
          // show previous step
          $(this).prev().fadeIn();
          // scroll window to beginning of the form
        scroll_to_class( $('.f1'), 20 );
        });
      });
      
      // submit (ketika klik tombol submit diakhir wizard)
      // $('.f1').on('submit', function(e) {
      //   // validasi form
      //   $(this).find('input[type="text"], input[type="password"], textarea').each(function() {
      //     if( $(this).val() == "" ) {
      //       e.preventDefault();
      //       $(this).addClass('input-error');
      //     }
      //     else {
      //       $(this).removeClass('input-error');
      //     }
      //   });
      // });

      $.ajax({
        url: "{{ route('api.master.categories.list') }}",
        success: (response) => {
          const data = response.data;
          $('#list-category').html('');
          data.forEach(item => {
            $('#list-category').append(`
              <div class="card-text border-bottom info-donatur rounded-3 mt-2 card-category" onclick="selectCategory(this, ${item.id})">                  
                <div class="row py-2 px-2">
                  <div class="col-md-6 order-md-2">
                    <img src="${item.logo_link ?? "{{ asset('') }}danako/img/campaign/icon_akun.png"}" class="img-thumbnail float-md-end" alt="Lingkungan" style="height: 35px">
                  </div>
                  <div class="col-md-6">
                    <h3>${item.name}</h3>
                  </div>
                </div>
              </div>
            `)
          });
        }
      });

      $('#form-campaign').submit((e)=>{
        e.preventDefault();
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Authorization': 'Bearer '+ localStorage.getItem('_token'),
          },
          url: "{{ route('api.campaigns.storeUser') }}",
          method: "POST",
          data: new FormData(e.target),
          processData: false,
          contentType: false,
          beforeSend: () => {
            $('#btn-submit').attr('disabled', true);
            $('#btn-submit').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
          },
          success: (response) => {
            location.href = "{{ route('campaign-pending') }}";
          },
          error: (response) => {
            const res = response.responseJSON;
            console.log(res);
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: res.meta.message,
            });
            $('#btn-submit').attr('disabled', false);
            $('#btn-submit').html('Ajukan');
          }
        })
      })
    });

    const selectCategory = (e, id) => {
      $('#category_id').val(id);
      $('.card-category').removeClass('active');
      $(e).addClass('active');
      $('#category-next').removeClass('disabled');
    }
  </script>
@endpush


