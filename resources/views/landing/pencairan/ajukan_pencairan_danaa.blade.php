@extends('landing.layouts.app')

@section('title', 'Ajukan Pencairan Dana')

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
          <span class="fs-1">Ajukan Pencairan Dana</span>
        </div>
      </div>
    </div>
  </div>

  <div class="container mb-2"> 
    <form class="f1" id="form-pencairan">
      <input type="hidden" name="campaign_id" id="campaign_id" value="{{ $campaign->campaign_id }}">
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
                <div class="f1-step-icon"><i class="fa fa-money"></i></div>
                <p>Nominal Pencairan</p>
              </div>
            <div class="f1-step">
              <div class="f1-step-icon"><i class="fas fa-newspaper"></i></div>
              <p>Penggunaan Dana</p>
            </div>
            <div class="f1-step">
                <div class="f1-step-icon"><i class="fa fa-credit-card"></i></div>
                <p>Rekening Pencairan</p>
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
        <div class="col-md-9 box-input p-3">
          <!-- step 1 -->
          <fieldset id="step-1" >
            <h3 class="text-center color-primary pt-3">Rp {{ $totalDana }}</h3>
            <h6 class="text-center pb-2">Total Donasi Terkumpul</h6>
              
            <div class="container pt-3">
              <div class="contact pt-3">
                <div class="col-md-12 col-md-offset-3">
                  <div class="form-area">
                    <div class="group form-group">  
                        <h6>Tuliskan nominal pencairan dana</h6>    
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Maksimal pencairan Rp{{ $dapatDicairkan }}">
                        <i class="bar"></i>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                    </div>
                    <div class="group form-group">  
                        <h6>Detail Dana</h6>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Donasi terkumpul</p>
                                    <p>Sudah Di Cairkan<p>
                                    <p></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text text-left">Rp {{ $sudahDicairkan }}</p>
                                    <p class="card-text text-left">Rp {{ $belumDicairkan }}</p>
                                </div>
                                {{-- <div class="col-md-12 py-1 bg-light text-dark rounded-3">
                                    Data Di Perbarui setiap 15 menit harap Terakir 23 - Maret - 2022
                                </div> --}}
                            </div>
                        </div>
                        <h6>Detail Potongan</h6>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Biaya operasional Danako 5%</p>
                                    <p>Biaya transaksi bank<p>
                                    <p></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text text-left">Rp {{ $totalBiayaPlatform }}</p>
                                    <p class="card-text text-left">Rp {{ $totalBiayaTransaksi }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Dana Dapat Dicairkan</h6>
                            </div>
                            <div class="col-md-6">
                                <h6>Rp {{ $dapatDicairkan }}</h6>
                            </div>
                        </div>
                        {{-- <textarea class="form-control" rows="6" name="detail_usage_of_funds"></textarea>
                        <i class="bar"></i>
                        <span class="highlight"></span>
                        <span class="bar"></span> --}}
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
            <h4 class="text-center color-primary pb-3 pt-3">Rincian Penggunaan Dana</h4>
            <div class="container">
              <div class="contact pt-3">
                <div class="col-md-12 col-md-offset-3">
                  <div class="form-area">
                    <h6>Tuliskan rincian penggunaan dana</h6> 
                    <div class="group form-group">      
                      <textarea type="text" class="form-control" rows="8" id="description" name="description"
                        placeholder="Contoh: Biaya pengobatan: Rp 500.000, menebus obat: Rp 1000"></textarea>
                      <span class="highlight"></span>
                      <span class="bar"></span>
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
            <h4 class="text-center color-primary pb-3 pt-3">Rekening Pencairan Dana</h4>
            <div class="container">
                <h6>Bank pencairan</h6>
                <div class="form-group group">      
                  <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $campaign->user->detail->bank_name }}" readonly="readonly" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                </div>
                <h6>Nama Pemilik Rekening</h6>
                <div class="form-group group">      
                  <input type="text" class="form-control" id="rek_name" name="rek_name" value="{{ $campaign->user->detail->rek_name }}" readonly="readonly" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                </div>
                <h6>No Rekening</h6>
                <div class="form-group group">      
                  <input type="text" class="form-control" id="rek_number" name="rek_number" value="{{ $campaign->user->detail->rek_number }}" readonly="readonly" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                </div>
            </div>
            <div class="f1-buttons d-flex justify-content-between pt-3">
              <button type="button" class="btn btn-outline-danako btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
              <button type="button" class="btn btn-danako btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
            </div>
          </fieldset>

          <!-- step 4 -->
          <fieldset id="step-4">
            <h4 class="text-center color-primary pb-3 pt-3">Dokumen Pendukung</h4>
            <div class="container">
              <h6>Tambahkan Dokumen Pendukung</h6>
              <div class="form-group files">
                <input type="file" class="form-control" multiple name="documents[]">
                <span class="highlight"></span>
                <span class="bar"></span>
              </div>
            </div>
            {{-- <div class="alert alert-warning fade show mt-3" role="alert">
                <div class="col-md-11">
                <span>Dana dapat dicairkan dan dikelola oleh penggalang dana</span>
                </div>
            </div> --}}
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
      $('#checkSudah').click(function(e){
        $('#checkSudah').val('checked');
        $('#checkBelum').val('');
        $('.checkBox').html(``);
        $('.uploadBukti').html(`
          <span style="padding-bottom: 80px;">Silahkan upload bukti pembayaran/ dokumen pendukung (Jpg, Png, Jpeg)</span>
          <input type="file" class="form-control" multiple name="documents[]" required>
          <span class="highlight"></span>
          <span class="bar"></span>
        `);
      });

      $('#checkBelum').click(function(e){
        $('#checkBelum').val('checked');
        $('#checkSudah').val('');
        $('.uploadBukti').html(``);
        $('.checkBox').html(`
          <div class="card">
            <div class="card-body">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="checkBoxBelum" required>
                Dengan ini saya bersedia melakukan upload bukti pembayaran setelah pencairan dana berhasil
              </div>
            </div>
          </div>
        `);
      });
      
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


      $('#form-pencairan').submit((e)=>{
        e.preventDefault();
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Authorization': 'Bearer ' + localStorage.getItem('_token'),
          },
          url: "{{ route('api.withdrawal.store2') }}",
          method: "POST",
          data: new FormData(e.target),
          processData: false,
          contentType: false,
          beforeSend: () => {
            $('#btn-submit').attr('disabled', true);
            $('#btn-submit').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
          },
          success: (response) => {
            location.href = "{{ route('verifikasi-pencairan') }}";
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
  </script>
@endpush


